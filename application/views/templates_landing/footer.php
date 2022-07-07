<div id="offcanvas" data-uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar">
        <a class="uk-logo" href="<?= base_url('Landing'); ?>">PAKAR SINUS</a>
        <button class="uk-offcanvas-close" type="button" data-uk-close></button>
        <ul class="uk-nav uk-nav-primary uk-nav-offcanvas uk-margin-top uk-text-center uk-text-500">
            <li class="uk-active"><a href="<?= base_url('Landing'); ?>">Beranda</a></li>
            <li><a href="<?= base_url('Login'); ?>">Login</a></li>
            <li>
                <div class="uk-navbar-item"><a class="uk-button uk-button-primary" href="<?= base_url('Konsultasi'); ?>">Konsultasi</a></div>
            </li>
        </ul>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="<?= base_url('assets_user/'); ?>js/awesomplete2.js"></script>
<script src="<?= base_url('assets_user/'); ?>js/custom.js"></script>

<script>
    $(document).on('click', 'ul li a', function() {
        $(this).addClass('uk-active')
    })
</script>

<script>
    var baseurl = "<?php echo site_url(); ?>";
</script>


<script>
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>

</body>

</html>