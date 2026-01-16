<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #f4f6f9;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #343a40;
            color: #fff;
            padding-top: 60px;
        }
        .sidebar a {
            color: #ddd;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #495057;
            color: #fff;
        }
        .content {
            margin-left: 250px;
            padding: 30px;
        }
        .navbar {
            position: fixed;
            width: 100%;
            z-index: 10;
        }
    </style>
</head>

<body>

<!-- Top Navbar -->
<nav class="navbar navbar-dark bg-dark px-3">
    <span class="navbar-brand mb-0 h1">Admin Panel</span>
</nav>

<!-- Sidebar -->
<div class="sidebar">
    <a href="{{ route('admin.redemptions') }}">
        <i class="fa-solid fa-gift"></i> Redemption Requests
    </a>

    <a href="{{ route('rewards') }}">
        <i class="fa-solid fa-box"></i> Manage Rewards
    </a>
</div>

<!-- Page Content -->
<div class="content">
    @yield('content')
</div>

</body>
</html>
