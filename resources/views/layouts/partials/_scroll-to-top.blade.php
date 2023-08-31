
 <script>
    $(document).ready(function() {
        // Scroll to top functionality
        $(".scroll-to-top").click(function() {
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        });
    });
    </script>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>