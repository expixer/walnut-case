@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Callback Logs</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Incoming Log ID</th>
                    <th>Status</th>
                    <th>Result</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($logs as $log)
                    <tr>
                        <td>{{ $log->id }}</td>
                        <td>{{ $log->incoming_log_id }}</td>
                        <td>
                                <span class="badge bg-{{ $log->status === 'confirmed' ? 'success' : 'warning' }}">
                                    {{ $log->status }}
                                </span>
                        </td>
                        <td>{{ Str::limit($log->result, 50) }}</td>
                        <td>{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>
                            <a href="{{ route('callback-logs.show', $log) }}" class="btn btn-sm btn-info">Details</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $logs->links() }}
        </div>
    </div>
@endsection
