@extends('admin.admin')

@section('content')
    <div class="card">
        <div class="card-header" data-aos="zoom-in-left" data-aos-delay="100" data-aos-duration="500" data-aos-anchor-placement="bottom-bottom">
            <div class="row">
                <div class="col-md-6 col-12">
                    <i class="fas fa-solid fa-book-open"></i>
                    Diaries
                </div>
            </div>
        </div>
        <div class="card-body ">

        @if (session('success'))
            <div class="alert alert-success mx-2" id="success-alert">
                {{ session('success') }}
            </div>
        @endif
            <table class="table table-sm table-hover table-striped" id="diary_myTable">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Action</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                </table>
        </div>
    </div>
   
@include('admin.diaries.partials._scripts')
@endsection



