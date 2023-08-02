@include('layouts.partials._header')
    
    <div id="app">

        <div id="wrapper">
            @include('layouts.partials._side-bar')
            <main id="content-area">
                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">

                    <!-- Main Content -->
                    <div id="content" class="pb-2">

                        @include('layouts.partials._top-bar')

                        <!-- Begin Page Content -->
                        <div class="container-fluid pb-2 mb-2">

                            @yield('content')

                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->

                    @include('layouts.partials._footer-block')

                </div>
                <!-- End of Content Wrapper -->
            </main>
        </div>
    </div>

    @include('layouts.partials._scroll-to-top')

    @include('layouts.partials._logout-modal')

    @include('layouts.partials._footer')