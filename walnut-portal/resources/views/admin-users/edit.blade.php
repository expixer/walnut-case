@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Edit Admin User</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin-users.update', $adminUser) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $adminUser->email) }}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password (leave empty to keep current)</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update User</button>
                <a href="{{ route('admin-users.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
