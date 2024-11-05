<?php
// app/Http/Controllers/IncomingLogDataController.php

namespace App\Http\Controllers;

use App\Models\IncomingLogData;
use Illuminate\Http\Request;

class IncomingLogDataController extends Controller
{

    public function index()
    {
        $logData = IncomingLogData::paginate(10);
        return view('incoming-log-data.index', compact('logData'));
    }

    public function show($incomingLogDataId)
    {
        $incomingLogData = IncomingLogData::findOrFail($incomingLogDataId);
        return view('incoming-log-data.show', compact('incomingLogData'));
    }

}
