
{{-- SB-Admin Scripts --}}
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

   
    <script>
        function confirmDelete(userId) {
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
                    axios.delete(`/users/${userId}`)
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
    </script>
</body>
</html>