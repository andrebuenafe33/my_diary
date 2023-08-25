<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/x-icon" href="{{ asset('images/books.ico') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/andre.css') }}">
    <!-- This is from CSS Dropfiy -->
    <link rel="stylesheet" href="{{ asset('css/dropify.css') }}">

        <!-- this is Jquery -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- this is from JS Dropfiy -->
    <script src="{{ asset('js/dropify.js') }}"></script>
    <!-- This is from Lightbox -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet">

    {{-- SB Admin Assets --}}
    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin.min.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0371f381a6.js" crossorigin="anonymous"></script>

    <!-- This is CDN of Sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- This is from TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/u0ebksljpkfdocbxvgho44w8fhi8tww0bw78lg90ba5p8r2i/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    
    <!-- This is from DataTables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
</head>
<body id="page-top">
    @php
    use Illuminate\Support\Str;
    @endphp