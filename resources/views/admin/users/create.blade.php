@extends('admin.admin')

@section('content')
    <div class="card">
        <div class="card-row p-2 mb-4">
        <div class="card-header">
            New User
        </div>
        <form action="{{route('users.store')}}" id="users-save" method="POST">
            @csrf
            <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="inputEmail4">Name</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Name" name="name" required value="{{ old('name')}}">
                        </div>                        
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="" selected disabled>Select a Role</option>
                                <option value="1">Administrator</option>
                                <option value="2">Supervisor</option>
                                <option value="3">Trainee</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" required value="{{ old('email')}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Temporary Password</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="Temporary Password" name="temp-password" required value="{{ old('temp-password')}}">
                        </div>
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
                  {{-- <input type="submit" value="Save" id="save_btn" class="btn btn-outline-success btn-sm"> --}}
                <button type="submit" id="save_btn"class="btn btn-success btn-sm">Save</button>
                <a href="{{route('users.index')}}" class="btn btn-secondary btn-sm">Cancel</a>
            </div>
        </form>
    </div>
    </div>

@endsection