<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CallbackLog extends Model {
    use SoftDeletes;

    protected $fillable = ['incoming_log_id', 'status', 'result'];

    public function incomingLog() {
        return $this->belongsTo(IncomingLog::class);
    }
}
