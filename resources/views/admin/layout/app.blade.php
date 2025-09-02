<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('panel/logo/logo.svg') }}" type="image/x-icon" /> -->
    <!-- <link rel="icon" href="{{ asset('website/assets/icons/favicon/icon-01-150x150.webp')}}" sizes="32x32" />
    <link rel="icon" href="{{ asset('website/assets/icons/favicon/icon-01.webp')}}" sizes="192x192" />
    <link rel="apple-touch-icon" href="{{ asset('website/assets/icons/favicon/icon-01.webp')}}" /> -->

     <!-- Favicon setup -->
     <link rel="icon" href="{{ asset('website/assets/icons/favicon/favicon.ico') }}" type="image/x-icon" />
    <link rel="icon" href="{{ asset('website/assets/icons/favicon/Monogram.png') }}" sizes="32x32" />
    <link rel="icon" href="{{ asset('website/assets/icons/favicon/Monogram.png') }}" sizes="192x192" />
    <link rel="apple-touch-icon" href="{{ asset('website/assets/icons/favicon/Monogram.png') }}" />


    <!-- Google Font: Source Sans Pro -->
    {{--
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    --}}
    <!-- Theme style -->

    <!-- <link rel="stylesheet" href="{{ asset('panel/css/adminlte.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('panel/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/css/sidenav.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/css/panelnav.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/css/about.css') }}" />
    <link rel="stylesheet" href="{{ asset('panel/css/applynow.css') }}" />
    <link rel="stylesheet" href="{{ asset('panel/css/enquirypopup.css') }}" />
    <link rel="stylesheet" href="{{ asset('panel/css/courses.css') }}" />
    <link rel="stylesheet" href="{{ asset('panel/css/testimonials.css') }}" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!-- ============================== -->
    <script src="https://kit.fontawesome.com/6e7aa91011.js" crossorigin="anonymous"></script>
    <!-- Bootstrap -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />


    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">



    <!-- summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{ asset('panel/css/custom.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('panel/css/institute.css') }}"> -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script>
        var baseUrl = "{{ url('') }}";
    </script>
</head>

<body class="hold-transition white-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('panel/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
                height="60" width="60">
        </div> -->

        @include('admin.layout.header')

        @include('admin.layout.sidebar')

        @yield('content')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        @include('admin.layout.footer')

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <!-- Include Popper.js -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script> -->

    <!-- Bootstrap -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script> -->

    <!-- AdminLTE App -->
    <!-- <script src="{{ asset('panel/js/adminlte.js') }}"></script> -->


    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <!-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> -->
    <!-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->


    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous"></script>
    <!-- <script src="{{ asset('panel/js/upload-image.js') }}"></script>
    <script src="{{ asset('panel/js/function.js') }}"></script>
    <script src="{{ asset('panel/js/custom.js') }}"></script> -->
    <!-- Summernote -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    {{--
    <script src="{{ asset('panel/js/demo.js') }}"></script> --}}
    <script src="{{ asset('panel/js/admin.js') }}"></script>
    <!-- <script src="{{ asset('panel/dist/js/admin.js') }}"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- date-range-picker -->
    <script>
        if ($('#long_description').length) {
            $('#long_description').summernote();
        }

        $("#menu-btn").click(() => {
            $("#sidenav").css("display", "block");
        });
        $("#menu-back").click(() => {
            $("#sidenav").css("display", "none");
        });
        $(window).on('resize', () => {
            const screenWidth = $(window).width();
            if (screenWidth > 990) {
                $("#sidenav").css("display", "block");
            }
        });
    </script>


</body>

</html>