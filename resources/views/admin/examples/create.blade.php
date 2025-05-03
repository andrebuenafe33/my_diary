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

    <div class="card">
        <div class="card-row p-2 mb-4">
        <div class="card-header">
            New Example
        </div>
        <form action="{{route('examples.store')}}" id="examples-save-form" method="POST">
            @csrf
            <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="inputEmail4">First Name</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="First Name" name="firstName" required value="{{ old('first_name')}}">
                        </div>     
                        <div class="form-group col-md-8">
                            <label for="inputEmail4">Middle Name</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Middle Name" name="middleName" required value="{{ old('middle_name')}}">
                        </div>     
                        <div class="form-group col-md-8">
                            <label for="inputEmail4">Last Name</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Last Name" name="lastName" required value="{{ old('last_name')}}">
                        </div>     
                        <div class="form-group col-md-8">
                            <label for="inputEmail4">Contact Number</label>
                            <input type="tel" pattern="\d{11}" maxlength="11" class="form-control" id="inputEmail4" placeholder="Contact Number" name="contactNumber" required value="{{ old('contact_number') }}">
                        </div>                      
                        <div class="form-group col-md-8">
                            <label for="inputEmail4">Course</label>
                            <select name="Course" id="Course" class="form-control">
                                <option value="" selected disabled>Select a Course</option>
                                <option value="BSIT">BSIT</option>
                                <option value="BEED">BEED</option>
                                <option value="BSEED">BSEED</option>
                                <option value="BSEED-Math">BSEED-Math</option>
                            </select>
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
                <button type="submit" id="save_btn"class="btn btn-success btn-sm">Save</button>
                <a href="{{route('examples.index')}}" class="btn btn-secondary btn-sm">Cancel</a>
            </div>
        </form>
    </div>
    </div>
    
@endsection