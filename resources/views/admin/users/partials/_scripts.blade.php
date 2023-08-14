

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

    
 