<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title', 'Dashboard') - {{ config('app.sitesettings')::first()?->site_title ?? 'Admin Panel' }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/homepage/logo-himpunan.png') }}" type="image/png" />

    <!-- Google Font: Source Sans Pro & Space Grotesk (Untuk konsistensi dengan Frontend) -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Source+Sans+Pro:300,400,400i,700&display=swap" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/fontawesome-free/css/all.min.css') }}" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('assets/dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" />
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" />
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/jqvmap/jqvmap.min.css') }}" />
    <!-- Theme Style (AdminLTE) -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/dist/css/adminlte.min.css') }}" />
    <!-- OverlayScrollbars -->
    <link rel="stylesheet"
        href="{{ asset('assets/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}" />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/daterangepicker/daterangepicker.css') }}" />
    <!-- Summernote -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/summernote/summernote-bs4.min.css') }}" />

    <!-- CUSTOM DASHBOARD STYLES (Theme HMTI) -->
    <style>
        :root {
            /* Mendefinisikan variabel warna agar konsisten dengan Frontend Tailwind */
            --color-primary: #7c3aed;
            --color-primary-dark: #6d28d9;
            --color-primary-light: #f5f3ff;
            --color-accent: #06b6d4;
            --color-dark: #0f0d1a;
            --font-heading: 'Space Grotesk', sans-serif;
            --font-body: 'Source Sans Pro', sans-serif;
        }

        /* Mengganti Font default AdminLTE */
        body {
            font-family: var(--font-body);
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .brand-text,
        .nav-sidebar .nav-link p {
            font-family: var(--font-heading);
        }

        /* SIDEBAR STYLING */
        /* Mengubah warna background sidebar menjadi gelap (mengikuti tema frontend) */
        .main-sidebar {
            background-color: #111827 !important;
            /* Warna gelap tailwind gray-900 */
            /* Jika ingin ungu gelap, gunakan: background: linear-gradient(180deg, var(--color-dark) 0%, #1e1b4b 100%); */
        }

        /* Brand Link (Logo Area) */
        .main-sidebar .brand-link {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 15px 10px;
        }

        .main-sidebar .brand-text {
            color: #fff;
            font-weight: 700;
        }

        /* User Panel */
        .user-panel .info a {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 600;
        }

        .user-panel .info a:hover {
            color: var(--color-primary);
        }

        /* Nav Links */
        .nav-sidebar .nav-link {
            color: rgba(255, 255, 255, 0.7);
            transition: all 0.3s ease;
        }

        .nav-sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.05);
            color: #fff;
        }

        /* Active State */
        .nav-sidebar .nav-link.active {
            background-color: var(--color-primary) !important;
            color: #fff;
            box-shadow: 0 4px 15px rgba(124, 58, 237, 0.3);
        }

        /* Menu Header */
        .nav-header {
            color: rgba(255, 255, 255, 0.4) !important;
            font-size: 0.75rem;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* NAVBAR STYLING */
        .main-header {
            background-color: #fff !important;
            border-bottom: 1px solid #f3f4f6;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .main-header .nav-link {
            color: #4b5563;
            /* Gray-600 */
        }

        .main-header .nav-link:hover {
            color: var(--color-primary);
        }

        /* CONTENT STYLING */
        .content-wrapper {
            background-color: #f9fafb;
            /* Gray-50 */
        }

        .content-header h1 {
            color: var(--color-dark);
            font-weight: 700;
        }

        /* CARDS STYLING */
        .card {
            border: none;
            border-radius: 0.75rem;
            /* Rounded-xl */
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            background-color: transparent;
            border-bottom: 1px solid #f3f4f6;
            font-family: var(--font-heading);
            font-weight: 600;
        }

        /* BUTTONS STYLING */
        .btn-primary {
            background-color: var(--color-primary);
            border-color: var(--color-primary);
        }

        .btn-primary:hover {
            background-color: var(--color-primary-dark);
            border-color: var(--color-primary-dark);
        }

        .btn-outline-primary {
            color: var(--color-primary);
            border-color: var(--color-primary);
        }

        .btn-outline-primary:hover {
            background-color: var(--color-primary);
            border-color: var(--color-primary);
        }

        /* SMALL BOX / INFO BOX (Dashboard Stats) */
        .small-box,
        .info-box {
            border-radius: 0.75rem;
            overflow: hidden;
        }

        .bg-info {
            background-color: var(--color-accent) !important;
        }

        .bg-primary {
            background-color: var(--color-primary) !important;
        }

        .bg-success {
            background-color: #10b981 !important;
        }

        /* Emerald */
        .bg-warning {
            background-color: #f59e0b !important;
        }

        /* Amber */
        .bg-danger {
            background-color: #ef4444 !important;
        }

        /* Red */

        /* PRELOADER STYLING */
        .preloader {
            background: linear-gradient(135deg, var(--color-dark) 0%, #1e1b4b 100%) !important;
        }

        .preloader img {
            filter: drop-shadow(0 0 10px rgba(124, 58, 237, 0.5));
        }

        .preloader span {
            color: #fff !important;
        }

        /* CUSTOM SCROLLBAR */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #c4b5fd;
            /* Primary-300 */
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--color-primary);
        }
    </style>

    @stack('styles') {{-- Menggunakan stack untuk CSS tambahan --}}
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img src="{{ asset('assets/homepage/logo-himpunan.png') }}" alt="Logo"
                class="animate__animated animate__fadeIn" style="width: 60px; margin-bottom: 10px;">
            <span class="fa-2x brand-text font-weight-bold text-light px-2">
                {{ config('app.sitesettings')::first()?->site_title ?? 'Loading...' }}
            </span>
        </div>

        <!-- Navbar -->
        @include('dashboard.inc.navbar')

        <!-- Main Sidebar Container -->
        @include('dashboard.inc.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        @include('dashboard.inc.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('assets/dashboard/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/dashboard/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('assets/dashboard/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('assets/dashboard/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('assets/dashboard/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('assets/dashboard/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- Moment.js -->
    <script src="{{ asset('assets/dashboard/plugins/moment/moment.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('assets/dashboard/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- Date Range Picker -->
    <script src="{{ asset('assets/dashboard/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('assets/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('assets/dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- OverlayScrollbars -->
    <script src="{{ asset('assets/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dashboard/dist/js/adminlte.js') }}"></script>

    <!-- Custom Scripts -->
    <script>
        // Hide preloader when window is fully loaded
        $(window).on('load', function() {
            $('.preloader').fadeOut('slow');
        });
    </script>

    @stack('scripts') {{-- Menggunakan stack untuk JS tambahan --}}
</body>

</html>
