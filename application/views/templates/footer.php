<script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
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

<footer class="main-footer">
    <div class="d-flex justify-content-between container">
        <strong>Copyright © 2022 Topup</strong>
    </div>
</footer>
</div>
</body>

</html>