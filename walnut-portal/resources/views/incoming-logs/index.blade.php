@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Incoming Logs</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('incoming-logs.index') }}" method="GET" class="mb-4">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="date_from" class="form-label">Date From</label>
                        <input type="date" class="form-control" id="date_from" name="date_from" value="{{ request('date_from') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="date_to" class="form-label">Date To</label>
                        <input type="date" class="form-control" id="date_to" name="date_to" value="{{ request('date_to') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ request('title') }}">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                </div>
            </form>

            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Source</th>
                    <th>Title</th>
                    <th>Word Count</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($logs as $log)
                    <tr>
                        <td>{{ $log->id }}</td>
                        <td>{{ $log->source }}</td>
                        <td>{{ $log->title }}</td>
                        <td>{{ $log->word_count }}</td>
                        <td>{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>
                            <a href="{{ route('incoming-logs.show', $log) }}" class="btn btn-sm btn-info">Details</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $logs->links() }}
        </div>
    </div>
@endsection
