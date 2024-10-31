@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Callback Log Details</h5>
            <a href="{{ route('callback-logs.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th>ID:</th>
                            <td>{{ $callbackLog->id }}</td>
                        </tr>
                        <tr>
                            <th>Incoming Log ID:</th>
                            <td>
                                <a href="{{ route('incoming-logs.show', $callbackLog->incoming_log_id) }}">
                                    {{ $callbackLog->incoming_log_id }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td>
                                <span class="badge bg-{{ $callbackLog->status === 'confirmed' ? 'success' : 'warning' }}">
                                    {{ $callbackLog->status }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Created At:</th>
                            <td>{{ $callbackLog->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h6>Result</h6>
                    <div class="card">
                        <div class="card-body">
                            <pre>{{ $callbackLog->result }}</pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
