<?php
namespace App\Services;

use App\Models\IncomingLog;
use App\Models\IncomingLogData;
use App\Models\CallbackLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CallbackService
{
    public function processCallback(array $data)
    {
        return DB::transaction(function () use ($data) {
            $logData = IncomingLogData::create([
                'payload' => $data,
                'inserted' => $this->filterNewEntries($data)
            ]);

            $insertedCount = 0;
            foreach ($logData->inserted as $entry) {
                $incomingLog = IncomingLog::create([
                    'source' => 'api',
                    'title' => $entry['title'],
                    'word_count' => $entry['word_count'],
                    'incoming_log_data_id' => $logData->id
                ]);

                $response = $this->sendToTestReceiver($entry);

                CallbackLog::create([
                    'incoming_log_id' => $incomingLog->id,
                    'status' => $response['ok'] ? 'confirmed' : 'pending',
                    'result' => json_encode($response)
                ]);

                $insertedCount++;
            }

            return [
                'inserted_count' => $insertedCount,
                'log_id' => $logData->id
            ];
        });
    }

    protected function filterNewEntries(array $data)
    {
        $existingTitles = IncomingLog::pluck('title')->toArray();
        return array_filter($data, function($entry) use ($existingTitles) {
            return !in_array($entry['title'], $existingTitles);
        });
    }

    protected function sendToTestReceiver(array $entry)
    {
        $response = Http::post(config('app.url') . '/api/test-receiver', $entry);
        return $response->json();
    }
}
