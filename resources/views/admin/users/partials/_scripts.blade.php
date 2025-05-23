

  <script>
        function confirmDelete(id){
            let userId = id;
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-danger mr-2',
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
                        url: `/users/${userId}`,
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
                                    $('#myDataTable').DataTable().ajax.reload();
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
        $('#myDataTable').DataTable({
            initComplete: function(){
                $('.dataTables_filter ').append('<a href="{{ route("users.create") }}" class="btn btn-sm btn-primary ml-3">New User</a>');
            },
            processing: true,
            serverSide: true,
            ajax: '{{ route('users.index') }}',
            columns: [
                {data: 'DT_RowIndex',name: 'index'},
                {data: 'action',name: 'action',orderable: false},
                {data: 'name',name: 'name'},
                {data: 'email',name: 'email'},
                {data: 'role',name: 'role'},
            ],
            "order": [[ 3, 'asc']]
    
        });
    } );
    </script>
 
 <script>
        document.addEventListener('DOMContentLoaded', function () {
            const alert = document.getElementById('success-alert');
            if (alert) {
                setTimeout(() => {
                    alert.style.transition = "opacity 0.5s ease";
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                }, 2000);
            }
        });
</script>
