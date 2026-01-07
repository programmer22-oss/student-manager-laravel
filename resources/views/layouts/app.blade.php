<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Manager</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container d-flex justify-content-between">
        <a class="navbar-brand" href="/students">Student Manager</a>

        <div>
            @auth
                <form method="POST" action="/logout" class="d-inline">
                    @csrf
                    <button class="btn btn-danger btn-sm">Logout</button>
                </form>
            @endauth

            @guest
                <a href="/login" class="btn btn-outline-light btn-sm">Login</a>
                <a href="/register" class="btn btn-outline-light btn-sm">Register</a>
            @endguest
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
