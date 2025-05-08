@include('layouts.login-partials._header')

<div class="container min-vh-100 d-flex align-items-center justify-content-center position-relative z-1">

    <!-- Outer Row -->
    <div class="row w-100 justify-content-center">
        
        @yield('content')

    </div>

</div>

@include('layouts.login-partials._footer')