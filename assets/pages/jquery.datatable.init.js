/**
 * Theme: Frogetor - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * Datatables Js
 */


$(document).ready(function() {
    $('#datatable').DataTable({
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

    $(document).ready(function() {
        $('#datatable2').DataTable();
    });

    //Buttons examples
    var table = $('#datatable-buttons').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
});