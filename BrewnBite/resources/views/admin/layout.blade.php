@php
    if (!function_exists('formatRupiah')) {
        function formatRupiah($number)
        {
            return 'Rp' . number_format($number, 2, ',', '.');
        }
    }
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/Adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/Adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/Adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/Adminlte/dist/css/adminlte.min.css') }}">
    @yield('css')
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg bg-body-white">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.sales') }}">Sales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.bestsellers') }}">Best Sellers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.topspenders') }}">Top Spenders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.ratings') }}">Ratings</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Add
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('admin.master.addons.add') }}">Add Add-ons</a>
                          <a class="dropdown-item" href="{{ route('admin.master.categories.add') }}">Add Categories</a>
                          <a class="dropdown-item" href="{{ route('admin.master.ingredients.add') }}">Add Ingredients</a>
                          <a class="dropdown-item" href="{{ route('admin.master.products.add') }}">Add Products</a>
                          <a class="dropdown-item" href="{{ route('admin.master.promos.add') }}">Add Promos</a>
                          <a class="dropdown-item" href="{{ route('admin.master.subcategories.add') }}">Add Sub-categories</a>
                          <a class="dropdown-item" href="{{ route('admin.master.users.add') }}">Add Employee</a>
                          {{-- <div class="dropdown-divider"></div> --}}
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Master
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('admin.master.addons.addons') }}">Add-ons</a>
                          <a class="dropdown-item" href="{{ route('admin.master.categories.categories') }}">Categories</a>
                          <a class="dropdown-item" href="{{ route('admin.master.ingredients.ingredients') }}">Ingredients</a>
                          <a class="dropdown-item" href="{{ route('admin.master.products.products') }}">Products</a>
                          <a class="dropdown-item" href="{{ route('admin.master.promos.promos') }}">Promos</a>
                          <a class="dropdown-item" href="{{ route('admin.master.subcategories.subcategories') }}">Sub-categories</a>
                          <a class="dropdown-item" href="{{ route('admin.master.users.users') }}">Users</a>
                          {{-- <div class="dropdown-divider"></div> --}}
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('/Adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/Adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/Adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/Adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/Adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/Adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/Adminlte/dist/js/adminlte.min.js') }}"></script>
    @yield('js')
</body>
</html>