@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Incoming Log Data</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Payload</th>
                    <th>Inserted</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($logData as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>
                            {{ json_encode($data->payload) }}
                        </td>
                        <td>
                            {{ json_encode($data->inserted) }}
                        </td>
                        <td>{{ $data->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>
                            <a href="{{ route('incoming-log-data.show', $data) }}" class="btn btn-sm btn-info">Details</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $logData->links() }}
        </div>
    </div>
@endsection
