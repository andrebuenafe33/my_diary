@extends('admin.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 col-12">
                    <i class="fas fa-solid fa-users"></i>
                    Users
                </div>
                <div class="col-md-6 col-12 text-right">
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Add New User</a>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-sm table-hover mb-0">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Role</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th> 
                  </tr>
                </thead>
                <tbody>
                  
                  @if(isset($users) && $users->count() > 0)
                    @foreach ($users as $index => $user)
                    <tr>
                      <th scope="row">{{ $index + 1}}</th>
                      <td>
                        @if($user->role == 1)
                        <span class="badge badge-danger">Administrator</span>
                      @elseif($user->role == 2)
                        <span class="badge badge-warning">Supervisor</span>
                      @else
                        <span class="badge badge-secondary">Trainee</span>
                      @endif
                      </td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>
                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                          <button onclick="confirmDelete({{ $user->id }})" class="btn btn-sm btn-danger">Delete</button>
                      </td>
                    </tr>
                    @endforeach
                  @else
                    <div class="alert alert-danger">No Users found</div>
                  @endif()
                </tbody>
              </table>
              @if(isset($user_name))
                <div class="alert alert-success mb-0">
                  <strong>Success!</strong> {{ $user_name }}'s information has been successfully updated.
                </div>
              @endif
        </div>
    </div>

    
@endsection