<script src="<?= base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
<script>
    $('.my-btn-dropdown').click(function() {
        $('#global-background-dark').addClass('active')
        $(this).siblings('.my-dropdown').addClass('d-block')
    })
    $(document).click('click', function(e) {
        const target = e.target
        var param = target.closest(".my-dropdown") || target.closest(".my-btn-dropdown")
        if (!param) {
            $('#global-background-dark').removeClass('active')
            $('.my-dropdown').removeClass('d-block')
        }
    })
</script>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright © 2022 <a href="#">Topup</a>
                    Designed by <a title="HTML CSS Templates" rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
            </div>
        </div>
    </div>
</footer>


<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="<?= base_url() ?>assets/js/isotope.min.js"></script>
<script src="<?= base_url() ?>assets/js/owl-carousel.js"></script>
<script src="<?= base_url() ?>assets/js/wow.js"></script>
<script src="<?= base_url() ?>assets/js/tabs.js"></script>
<script src="<?= base_url() ?>assets/js/popup.js"></script>
<script src="<?= base_url() ?>assets/js/custom.js"></script>

</body>

</html>