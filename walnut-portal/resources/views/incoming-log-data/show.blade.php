@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Incoming Log Data Details</h5>
            <a href="{{ route('incoming-log-data.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6>Payload</h6>
                    <div class="card">
                        <div class="card-body">
                            <pre>{{ json_encode($incomingLogData->payload, JSON_PRETTY_PRINT) }}</pre>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6>Inserted Data</h6>
                    <div class="card">
                        <div class="card-body">
                            <pre>{{ json_encode($incomingLogData->inserted, JSON_PRETTY_PRINT) }}</pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
