@extends('admin.admin')

@section('content')
    <div class="card">
        <div class="card-header" data-aos="zoom-in-left" data-aos-delay="100" data-aos-duration="500" data-aos-anchor-placement="bottom-bottom">
            <div class="row">
                <div class="col-md-6 col-12">
                    <i class="fas fa-solid fa-users"></i>
                    Users
                </div>
                {{-- <div class="col-md-6 col-12 text-right">
                    
                </div> --}}
            </div>
        </div>
        <div class="card-body ">
            @if (session('success'))
                <div class="alert alert-success mx-2" id="success-alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-sm table-hover table-striped mb-0" id="myDataTable">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Action</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin.users.partials._scripts')
@endsection