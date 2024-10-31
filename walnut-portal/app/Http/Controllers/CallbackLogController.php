<?php
namespace App\Http\Controllers;

use App\Models\CallbackLog;

class CallbackLogController extends Controller {
    public function index() {
        $logs = CallbackLog::paginate(10);
        return view('callback-logs.index', compact('logs'));
    }

    public function show(CallbackLog $callbackLog) {
        return view('callback-logs.show', compact('callbackLog'));
    }
}
