@extends('admin.admin')

@section('content')
    <div class="card">
        <div class="card-header" data-aos="zoom-in-left" data-aos-delay="100" data-aos-duration="500" data-aos-anchor-placement="bottom-bottom">
            <div class="row">
                <div class="col-md-6 col-12">
                    <i class="fas fa-solid fa-book-open"></i>
                    Approval Requests
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-hover" id="approval-requests-DataTable">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                            <th scope="col">Action</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            @if(isset($diaryApproved))
                <div class="alert alert-success">
                    {{ $diaryApproved }}
                </div>
            @elseif(isset($diaryRejected))
                <div class="alert alert-danger">
                    {{ $diaryRejected }}
                </div>
            @endif
        </div>
    </div>
    @include('admin.approval-requests.partials._approval-datatables-script')
    @include('admin.approval-requests.partials._approval-scripts')


@endsection