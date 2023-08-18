@extends('admin.admin')

@section('content')


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


    {{-- <div class="card">
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
            <table class="table table-sm table-hover table-striped mb-0" id="myDataTable">
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
                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-sm btn-warning fas fa-edit"></a>
                          <button onclick="confirmDelete({{ $user->id }})" class="btn btn-sm btn-danger fas fa-trash"></button>
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
    --}}
    @section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 col-12">
                    <i class="fas fa-solid fa-users"></i>
                    Users
                </div>
                {{-- <div class="col-md-6 col-12 text-right">
                    
                </div> --}}
            </div>
        </div>
        <div class="card-body p-1">
            <table class="table table-sm table-hover mb-0" id="myDataTable">
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

    @include('admin.users.partials._scripts')
@endsection