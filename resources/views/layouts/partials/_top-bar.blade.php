<!-- Topbar -->
<nav class="TopBar navbar navbar-expand navbar-secondary bg-dark topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-dark  rounded-circle mr-3">
        <i class="fas fa-bars"></i>
    </button>



    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

       


        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-white-900 small text-white">{{ Session::get('USERNAME') }}</span>
                @if ( Session::get('USERIMG') == Null )
                <img src="{{ asset('/images/user-placeholder.png') }}" alt="Profile Image Placeholder" class="img-profile rounded-circle">
            @else 
                <img class="img-profile rounded-circle" src="{{ asset('storage/'.Session::get('USERIMG')) }}">
            @endif     
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->