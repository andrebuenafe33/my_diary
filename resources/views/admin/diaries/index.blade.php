@extends('admin.admin')

@section('content')
{{-- <div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6 col-12">
                <i class="fas fa-solid fa-book-open"></i>
                Diaries
            </div>
            <div class="col-md-6 col-12 text-right">
                <a href="{{ route('diaries.create') }}" class="btn btn-sm btn-primary">Add New User</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-sm table-hover" id="diaries-table">
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
</div> --}}

<style>
    /* Define the initial state of the button */
    .btn {
      padding: 5px 10px;
      color: #fff;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }
    
    /* Define the hover state */
    .btn:hover {
      transform: scale(1.10);
    }
    </style>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 col-12">
                    <i class="fas fa-solid fa-book-open"></i>
                    Diaries
                </div>
                <div class="col-md-6 col-12 text-right">
                    <a href="{{ route('diaries.create') }}" class="btn btn-sm btn-primary">New Diary</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-sm table-striped" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Action</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diaries as $diary)
                        <tr>
                            <td>{{ $diary->id }}</td>
                            <td>
                                <!-- Add any action buttons or links here -->
                                <a href="{{ route('diaries.show', $diary->id) }}" class="btn btn-sm btn-primary fas fa-eye"></a>
                                <a href="{{ route('diaries.edit', $diary->id) }}" class="btn btn-sm btn-warning fas fa-edit"></a>
                                <button onclick="confirmDelete({{ $diary->id }})" class="btn btn-sm btn-danger fas fa-trash"></button>
                            </td>
                            <td> 
                                @if ($diary->author)
                                EOD REPORT for {{ $diary->created_at->format('F d, Y') }} by {{ $diary->author->name }}
                                @else
                                EOD REPORT for {{ $diary->created_at->format('F d, Y') }} by Unknown Author
                                @endif
                            </td>
                            <td>
                                @if ($diary->status == 1)
                                    <span class="badge badge-warning">Pending</span>
                                @else
                                    <span class="badge badge-success">Approve</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@include('admin.diaries.partials._scripts')
@endsection



