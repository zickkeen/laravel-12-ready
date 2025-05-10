<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'InfraSys') }}</title>

    <!-- Bootstrap & Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    {{-- Toast --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Custom Style -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }
    
        /* Styles untuk desktop (default) */
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: #fff;
            position: fixed;
            width: 250px;
            padding-top: 1rem;
        }
    
        .sidebar a {
            color: #ccc;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
        }
    
        .sidebar a:hover {
            background-color: #495057;
            color: #fff;
        }
    
        .sidebar .nav-header {
            padding: 0.5rem 1rem;
            font-weight: bold;
            color: #aaa;
            text-transform: uppercase;
            font-size: 0.75rem;
        }
    
        .content {
            padding: 2rem;
        }
    
        .topbar {
            height: 60px;
            background-color: #fff;
            border-bottom: 1px solid #dee2e6;
            position: fixed;
            left: 250px;
            right: 0;
            top: 0;
            padding: 0 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 1000;
        }
    
        .topbar .username {
            font-weight: 500;
        }
    
        .content-body {
            margin-top: 80px;
            margin-left: 250px;
        }
    
        /* Styles untuk mobile/tablet */
        @media (max-width: 800.98px) {
            .sidebar {
                position: fixed;
                width: 250px;
                height: 100vh;
                background-color: #343a40;
                color: #fff;
                z-index: 1050;
            }
    
            /* Menggunakan offcanvas */
            .offcanvas-lg {
                position: fixed;
                top: 0;
                left: 0;
                z-index: 1040;
                width: 250px;
                height: 100vh;
            }
    
            .topbar {
                left: 56px;
                margin-left: 0;
            }
    
            .content-body {
                margin-left: 0;
            }
    
            .content {
                padding: 2rem;
            }
        }
    </style>


    @yield('styles')
</head>

<body>

    {{-- @include('layouts.sidebar') --}}

    @include('layouts.navbar')

    <!-- Burger button untuk mobile -->
    <button class="btn btn-dark d-lg-none position-fixed top-0 start-0 m-3 z-1030" data-bs-toggle="offcanvas"
        data-bs-target="#sidebarOffcanvas">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <div class="offcanvas-lg offcanvas-start sidebar" tabindex="-1" id="sidebarOffcanvas">
        @include('layouts.sidebar')
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="content-body">
            @yield('content')
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
    </script>
    @stack('scripts')
</body>

</html>
