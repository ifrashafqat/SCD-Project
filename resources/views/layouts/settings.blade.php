<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        nav {
            background: #333;
            color: #fff;
            padding: 10px;
        }
        nav a {
            color: #fff;
            margin-right: 10px;
            text-decoration: none;
        }
        .container {
            padding: 20px;
        }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('admin.destinationWeddings.index') }}">Manage Weddings</a>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
