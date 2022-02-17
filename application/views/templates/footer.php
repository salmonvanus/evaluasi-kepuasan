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

<!--form validation init-->
<script src="<?= base_url('assets/'); ?>plugins/summernote/summernote-bs4.min.js"></script>

<!-- Modal-Effect -->
<script src="<?= base_url('assets/'); ?>plugins/custombox/custombox.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/custombox/custombox.legacy.min.js"></script>

<!-- App js -->
<script src="<?= base_url('assets/'); ?>js/app.js"></script>

<script src="<?= base_url('assets/') ?>plugins/parsleyjs/parsley.min.js"></script>
<script src="<?= base_url('assets/') ?>pages/jquery.validation.init.js"></script>
<script src="<?= base_url('assets/') ?>js/jquery.core.js"></script>


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
    jQuery(document).ready(function() {

        $('.summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['style']],
                ['style', ['fontname', 'bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ],
            height: 320, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote

        });

    });
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

<!-- <script type="text/javascript">
    $('#sampleTable').DataTable();
</script> -->

<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable({
            "language": {
                "decimal": "",
                "emptyTable": "Tidak ada data yang tersedia",
                "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
                "infoEmpty": "Data yang dicari tidak ditemukan",
                "infoFiltered": "(difilter dari _MAX_ total data)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Tampilkan _MENU_ data",
                "loadingRecords": "Memuat...",
                "processing": "Sedang Memproses...",
                "search": "Pencarian:",
                "zeroRecords": "Tidak ada data yang ditamplkan",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Berikutnya",
                    "previous": "Sebelumnya"
                },
                "aria": {
                    "sortAscending": ": Aktifkan untuk urutkan kolom secara ascending",
                    "sortDescending": ": Aktifkan untuk urutkan kolom secara descending"
                }
            }
        });
        $('#datatable-keytable').DataTable({
            keys: true
        });
        $('#datatable-responsive').DataTable();
        $('#datatable-colvid').DataTable({
            "dom": 'C<"clear">lfrtip',
            "colVis": {
                "buttonText": "Change columns"
            }
        });
        $('#datatable-scroller').DataTable({
            ajax: "<?php echo base_url(); ?>assets/plugins/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });
        var table = $('#datatable-fixed-header').DataTable({
            fixedHeader: true
        });
        var table = $('#datatable-fixed-col').DataTable({
            scrollY: "300px",
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            fixedColumns: {
                leftColumns: 1,
                rightColumns: 1
            }
        });
    });
    TableManageButtons.init();
</script> -->
</body>

</html>