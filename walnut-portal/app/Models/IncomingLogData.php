<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IncomingLogData extends Model {
    use SoftDeletes;

    protected $fillable = ['payload', 'inserted'];
    protected $casts = [
        'payload' => 'array',
        'inserted' => 'array'
    ];

    public function incomingLog() {
        return $this->hasOne(IncomingLog::class);
    }
}
