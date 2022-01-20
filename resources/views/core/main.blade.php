<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
<!--===============================================================================================-->
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/bootstrap.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" href="{{ asset('/vendors/chartjs/Chart.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" href="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('/assets/admin/images/favicon.svg') }}" type="image/x-icon">
<!--===============================================================================================-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<!--===============================================================================================-->

    @yield('css')
</head>
<body>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    @yield('sidebar-header')
                </div>
                <div class="sidebar-menu">
                    @yield('sidebar-menu')
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            
            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>@yield('page-title')</h3>
                    <p class="text-subtitle text-muted">@yield('page-subtitle')</p>
                </div>
                <section class="section">
                    @yield('konten')
                </section>
            </div>

            <footer>
                @yield('footer')
            </footer>
        </div>
    </div>
<!--===============================================================================================-->
    <script src="{{ asset('/assets/admin/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/app.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('/vendors/apexcharts/apexcharts.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('/assets/admin/js/main.js') }}"></script>
<!--===============================================================================================-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!--===============================================================================================-->
    @yield('js_asset')
    @yield('js_script')
</body>
</html>
