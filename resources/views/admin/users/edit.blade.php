@extends('admin.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit User
        </div>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="inputEmail4">Name</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Name" name="name" required value="{{ $user->name }}">
                        </div>                        
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="" disabled>Select a Role</option>
                                <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Administrator</option>
                                <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Supervisor</option>
                                <option value="3" {{ $user->role == 3 ? 'selected' : '' }}>Trainee</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" required value="{{ $user->email }}">
                        </div>
                        @method('PUT')
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="p-0 m-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-sm">Update</button>
                <a href="{{route('users.index')}}" class="btn btn-secondary btn-sm">Cancel</a>
            </div>
        </form>
    </div>
@endsection