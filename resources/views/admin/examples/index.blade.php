@extends('admin.admin')

@section('content')
    <div class="card">
        <div class="card-header" data-aos="zoom-in-left" data-aos-delay="100" data-aos-duration="500" data-aos-anchor-placement="bottom-bottom">
            <div class="row">
                <div class="col-md-6 col-12">
                    <i class="fas fa-solid fa-users"></i>
                    Examples
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
                <table class="table table-sm table-hover table-striped mb-0" id="exampleDataTable">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Course</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
  

    @include('admin.examples.partials._scripts')

    <div class="card mt-2" id="editForm" style="display:none;">
        <div class="card-header">
            Edit Example
        </div>
        <form action="" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputFirstName">First Name</label>
                        <input type="text" class="form-control" id="inputFirstName" placeholder="First Name" name="firstName" required value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputMiddleName">Middle Name</label>
                        <input type="text" class="form-control" id="inputMiddleName" placeholder="Middle Name" name="middleName" required value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputLastName">Last Name</label>
                        <input type="text" class="form-control" id="inputLastName" placeholder="Last Name" name="lastName" required value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputContactNumber">Contact Number</label>
                        <input type="text" class="form-control" id="inputContactNumber" placeholder="Contact Number" name="contactNumber" required value="">
                    </div>
                    <div class="form-group col-md-6">
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
                <button type="submit" class="btn btn-success btn-sm">Update</button>
                <a href="javascript:void(0)" id="cancelEdit" class="btn btn-secondary btn-sm">Cancel</a>
            </div>
        </form>

    </div>

    <script>
           $(document).ready(function() {
                // When clicking on the edit button
                $(document).on('click', '.editExample', function() {
                    var id = $(this).data('id');
                    
                    // Send an AJAX request to get the example data
                    $.ajax({
                        url: '/examples/' + id + '/edit',  // Send request to the edit method
                        method: 'GET',
                        success: function(response) {
                            // On success, populate the form fields with the data
                            $('#inputFirstName').val(response.first_name);
                            $('#inputMiddleName').val(response.middle_name);
                            $('#inputLastName').val(response.last_name);
                            $('#inputContactNumber').val(response.contact_number);
                            $('#Course').val(response.course);
                            
                            // Set the form action to update the example
                            $('form').attr('action', '/examples/' + id); // Set the form action dynamically
                            $('form').attr('method', 'POST'); // Set the method to POST
                            
                            // Append the method field for PUT request
                            $('form').append('<input type="hidden" name="_method" value="PUT">');
                            
                            // Show the form
                            $('#editForm').fadeIn(); // Show the form with fade-in effect
                        },
                        error: function(xhr) {
                            console.log("Error: " + xhr.status + " " + xhr.statusText);
                        }
                    });
                });

                // When clicking on the cancel button
                $(document).on('click', '#cancelEdit', function() {
                    $('#editForm').fadeOut(); // Hide the form when cancel is clicked
                });
            });

    </script>



@endsection