<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CallbackService;
use Illuminate\Http\Request;

class CallbackController extends Controller
{
    protected $callbackService;

    public function __construct(CallbackService $callbackService)
    {
        $this->callbackService = $callbackService;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            '*' => 'required|array',
            '*.title' => 'required|string',
            '*.word_count' => 'required|integer'
        ]);

        try {
            $result = $this->callbackService->processCallback($validated);

            return response()->json([
                'success' => true,
                'message' => 'Data processed successfully',
                'data' => [
                    'inserted_count' => $result['inserted_count'],
                    'log_id' => $result['log_id']
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function testReceiver(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'word_count' => 'required|integer'
        ]);

        return response()->json([
            'ok' => true,
            'title' => $request->title
        ]);
    }
}
