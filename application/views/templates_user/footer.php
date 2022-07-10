<!-- jQuery  -->
<script src="<?= base_url('assets/'); ?>js/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/metisMenu.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/waves.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery.slimscroll.min.js"></script>

<!-- Required datatable js -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Buttons examples -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/jszip.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/pdfmake.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/vfs_fonts.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/buttons.print.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>pages/jquery.datatable.init.js"></script>

<!--Wysiwig js-->
<script src="<?= base_url('assets/'); ?>plugins/tinymce/tinymce.min.js"></script>
<script src="<?= base_url('assets/'); ?>pages/jquery.form-editor.init.js"></script>


<!--form validation init-->
<script src="<?= base_url('assets/'); ?>plugins/summernote/summernote-bs4.min.js"></script>

<!-- Modal-Effect -->
<script src="<?= base_url('assets/'); ?>plugins/custombox/custombox.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/custombox/custombox.legacy.min.js"></script>

<script src="<?= base_url('assets/') ?>plugins/parsleyjs/parsley.min.js"></script>
<script src="<?= base_url('assets/') ?>pages/jquery.validation.init.js"></script>
<script src="<?= base_url('assets/') ?>js/jquery.core.js"></script>

<!-- Plugins js -->
<script src="<?= base_url('assets/') ?>plugins/moment/moment.js"></script>
<script src="<?= base_url('assets/') ?>plugins/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/dropify/js/dropify.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/ticker/jquery.jConveyorTicker.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/peity-chart/jquery.peity.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/chartjs/chart.min.js"></script>
<script src="<?= base_url('assets/') ?>pages/jquery.profile.init.js"></script>
<script src="<?= base_url('assets/') ?>pages/jquery.form-upload.init.js"></script>

<script src="<?= base_url('assets/') ?>plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url('assets/') ?>plugins/timepicker/tempusdominus-bootstrap-4.js"></script>
<script src="<?= base_url('assets/') ?>plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
<script src="<?= base_url('assets/') ?>plugins/clockpicker/jquery-clockpicker.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/colorpicker/jquery-asColor.js"></script>
<script src="<?= base_url('assets/') ?>plugins/colorpicker/jquery-asGradient.js"></script>
<script src="<?= base_url('assets/') ?>plugins/colorpicker/jquery-asColorPicker.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/select2/select2.min.js"></script>

<script src="<?= base_url('assets/') ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>

<script src="<?= base_url('assets/') ?>pages/jquery.clock-img.init.js"></script>
<script src="<?= base_url('assets/') ?>pages/jquery.forms-advanced.js"></script>

<!--Wysiwig js-->
<script src="<?= base_url('assets/') ?>plugins/tinymce/tinymce.min.js"></script>
<script src="<?= base_url('assets/') ?>pages/jquery.form-editor.init.js"></script>

<!--Button tooltip-->
<script src="<?= base_url('assets/') ?>plugins/tippy/tippy.all.min.js"></script>
<script src="<?= base_url('assets/') ?>pages/jquery.tooltipster.js"></script>

<!-- Sweet-Alert  -->
<script src="<?= base_url(); ?>assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="<?= base_url(); ?>assets/pages/jquery.sweet-alert.init.js"></script>


<!-- App js -->
<script src="<?= base_url('assets/'); ?>js/app.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>

<script>
    $(document).ready(function() {
        $('#submit').click(function() {
            var pass = $('#pass').val();
            var pass2 = $('#pass2').val();
            if (pass != pass2) {
                alert("password tidak sama!");
            }
        });
    });
</script>

<script>
    $('[data-plugin="custommodal"]').on('click', function(e) {
        var modal = new Custombox.modal({
            content: {
                target: $(this).attr("href"),
                effect: $(this).attr("data-animation")
            }
        });
        modal.open();
    });
</script>

<script>
    var resizefunc = [];
</script>

<?php
if ($this->session->flashdata('error_empty')) { ?>
    <script>
        swal({
            title: 'Maaf!',
            text: 'Gagal Diproses, Minimal Jawab 3 Pertanyaan!',
            type: 'warning'
        })
    </script>
<?php } ?>

</body>

</html>