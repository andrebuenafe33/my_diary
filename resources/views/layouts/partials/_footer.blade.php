
{{-- SB-Admin Scripts --}}
    <!-- Bootstrap core JavaScript-->
    {{-- <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script> --}}
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <!-- This is CDN scripts from lightbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
    
    <!-- DataTables -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
   <script> let table = new DataTable('#myDataTable'); </script>
   
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

    {{-- TinyMCE Script --}}
    <script>
        tinymce.init({
          selector: 'textarea',
          plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
          toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
      </script>
      
     <script>
        $(document).ready(function() {
            // Scroll to top functionality
            $(".scroll-to-top").click(function() {
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });
        });
        </script>

    
       

</body>
</html>