{{-- 
<script>
    function confirmDeleteDiary(userId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            showCancelButton: true,
            imageUrl: "{{ asset("images/bin.png") }}",
            imageHeight: 200,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#005',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send an AJAX request to delete the user
                axios.delete(`/diaries/${userId}`)
                    .then(response => {
                        // Handle the success response from the server
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        // Optionally, you can update the UI or reload the page after successful deletion
                        setTimeout(function(){
                            location.reload();
                        }, 2000);
                         
                    }) 
                    .catch(error => {
                        // Handle the error response from the server
                        Swal.fire(
                            'Error!',
                            'An error occurred while deleting the user.',
                            'error'
                        );
                    });
            }
        });
    }
</script> --}}
<script>
    function confirmDeleteDiary(id){
        let userId = id;
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-secondary'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            imageUrl: "{{ asset("images/bin.png") }}",
            imageHeight: 200,
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel.',
            reverseButtons: false
        }).then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    url: `/diaries/${userId}`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Deleted!',
                            text: "User has been deleted.",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Okay'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                $('#diary_myTable').DataTable().ajax.reload();
                            }
                        })

                    },
                    error: function(error) {
                        // Handle error response
                        console.error('DELETE request failed:', error);
                    }
                });
            } else {
                result.dismiss == Swal.DismissReason.cancel;
                swalWithBootstrapButtons.fire(
                    'Oops...',
                    'Something went wrong!',
                    'error'
                );
            }
        })
    }
</script>

 {{-- This is from animation for cards --}}
        {{-- Add an event listener to trigger animation on scroll --}}
        <script> 
            document.addEventListener('DOMContentLoaded', function() {
                const animatedCards = document.querySelectorAll('.animated-card');
            
                function animateOnScroll() {
                    animatedCards.forEach(card => {
                        const rect = card.getBoundingClientRect();
                        if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                            card.classList.add('animate');
                        }
                    });
                }
            
                window.addEventListener('scroll', animateOnScroll);
                animateOnScroll(); // Initial animation check
            });
        </script>

<script>
      $(document).ready( function () {
        $('#diary_myTable').DataTable({
            initComplete: function(){
                $('.dataTables_filter ').append('<a href="{{ route("diaries.create") }}" class="btn btn-sm btn-primary ml-3">New Diary</a>');
            },
            processing: true,
            serverSide: true,
            ajax: '{{ route('diaries.index') }}',
            columns: [
                {data: 'DT_RowIndex',name: 'index'},
                {data: 'action',name: 'action',orderable: false},
                {data: 'title',name: 'title'},
                {data: 'status',name: 'status'},
            ],
            "order": [[ 3, 'asc']]
    
        });
    } );
</script>


  
    
    
    
    
    
    