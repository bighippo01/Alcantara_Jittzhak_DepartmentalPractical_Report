
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Plant Nursery Inventory</title>

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background-color: #f4f7f4;
        }

        .navbar {
            background-color: #198754;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .main-container {
            margin-top: 30px;
        }

        .card {
            border: none;
            border-radius: 10px;
        }

        .btn-success {
            background-color: #198754;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">

        <a class="navbar-brand" href="{{ route('plants.index') }}">
             Plant Nursery
        </a>

        @auth
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('plants.index') }}">
                        Plants
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('reports.index') }}">
                        Reports
                    </a>
                </li>

            </ul>

            <span class="navbar-text text-white me-3">
                {{ Auth::user()->name }}
            </span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="btn btn-light btn-sm">
                    Logout
                </button>
            </form>

        </div>
        @endauth

    </div>
</nav>

<div class="container main-container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>
