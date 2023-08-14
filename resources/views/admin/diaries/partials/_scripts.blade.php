<script>
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