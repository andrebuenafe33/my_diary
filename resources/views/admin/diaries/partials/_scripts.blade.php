<script>
    function confirmDeleteDiary(id){
        let userId = id;
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn mr-2 btn-danger',
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
                            text: "Diary has been deleted.",
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

  
    
    
    
    
    
    