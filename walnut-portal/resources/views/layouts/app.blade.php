<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin-users.index') }}">Admin Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('incoming-logs.index') }}">Incoming Logs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('incoming-log-data.index') }}">Incoming Log Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('callback-logs.index') }}">Callback Log</a>
                    </li>
                </ul>
                <form method="POST" action="{{ route('logout') }}" class="d-flex">
@csrf
<button class="btn btn-outline-light" type="submit">Logout</button>
</form>
</div>
</div>
</nav>

<main class="container mt-4">
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
