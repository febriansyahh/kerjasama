<script src="<?php echo base_url('vendors/@popperjs/popper.min.js') ?>"></script>
<script src="<?php echo base_url('vendors/bootstrap/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('vendors/is/is.min.js') ?>"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="<?php echo base_url('vendors/fontawesome/all.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/theme.js') ?>"></script>

<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script>
<script type="text/javascript">
    $('body').on('click', '.btn-close', function() {
        $(this).closest('.toast').toast('hide')
    })

    $('#data_table').DataTable({
        order: [
            [4, "asc"]
        ],
    });
</script>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap" rel="stylesheet">