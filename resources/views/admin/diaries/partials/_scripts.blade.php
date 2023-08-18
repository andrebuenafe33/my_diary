{{-- <script>
    $(document).ready(function () {
        $.ajax({
            url: "{{ route('diaries.get') }}",
            method: "GET",
            dataType: "json",
            success: function (data) {
                var tableBody = $("#diaries-table tbody");
                tableBody.empty();

                $.each(data, function (index, diary) {
                    var row = `<tr>
                        <td>${index + 1}</td>
                        <td>
                            <a href="${diary.edit_route}">Edit</a> |
                            <a href="${diary.delete_route}" class="delete-diary">Delete</a>
                        </td>
                        <td>${diary.title}</td>
                        <td>${diary.status}</td>
                    </tr>`;
                    tableBody.append(row);
                });
            }
        });
    });
</script> --}}

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