
    <script>
        function approveDiary(diary){
            event.preventDefault();
            const id = diary;
            const url = "{{ route('approval-requests.approve', '') }}" + '/' + id; // Build the URL with the ID
            // Perform the PUT request using AJAX
    
            Swal.fire({
                title: 'Are you sure you want to approve this diary?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $('.btn-'+id).addClass('d-none');
                    
                    $.ajax({
                        url: url,
                        type: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Success!',
                                text: response.successMessage,
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Okay'
                            }).then((result) => {
                                if (result.isConfirmed) {
    
                                    let currentRoute = "{{ Route::currentRouteName() }}";
    
                                    if (currentRoute === "{{ route('approval-requests.index') }}") {
                                        $('#approval-requests-DataTable').DataTable().ajax.reload();
                                    } else {
                                        window.location.href = "{{ route('approval-requests.index') }}";
                                    }
                                }
                            })
                        },
                        error: function(error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ooops!',
                                text: 'Sorry, we encountered an error: ' + error,
                            })
                        }
                    });
                }
            })
        }
 
  
    
        function rejectDiary(diary){
            event.preventDefault();
            let id = diary;
            const url = "{{ route('approval-requests.reject', '') }}" + '/' + id; // Build the URL with the ID
            // Perform the PUT request using AJAX
    
            Swal.fire({
                title: 'Are you sure you want to reject this diary?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, reject it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Success!',
                                text: response.rejectMessage,
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Okay'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $('#approval-requests-DataTable').DataTable().ajax.reload();
                                }
                            })
                        },
                        error: function(error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ooops!',
                                text: 'Sorry, we encountered an error: ' + error,
                            })
                        }
                    });
                }
            })
        }
    </script>