@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Incoming Log Details</h5>
            <a href="{{ route('incoming-logs.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6>Basic Information</h6>
                    <table class="table">
                        <tr>
                            <th>ID:</th>
                            <td>{{ $incomingLog->id }}</td>
                        </tr>
                        <tr>
                            <th>Source:</th>
                            <td>{{ $incomingLog->source }}</td>
                        </tr>
                        <tr>
                            <th>Title:</th>
                            <td>{{ $incomingLog->title }}</td>
                        </tr>
                        <tr>
                            <th>Word Count:</th>
                            <td>{{ $incomingLog->word_count }}</td>
                        </tr>
                        <tr>
                            <th>Created At:</th>
                            <td>{{ $incomingLog->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h6>Log Data</h6>
                    <div class="card">
                        <div class="card-body">
                            <h6>Payload</h6>
                            <pre>{{ json_encode($incomingLog->logData->payload, JSON_PRETTY_PRINT) }}</pre>

                            <h6>Inserted Data</h6>
                            <pre>{{ json_encode($incomingLog->logData->inserted, JSON_PRETTY_PRINT) }}</pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
