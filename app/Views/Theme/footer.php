<!-- Mainly scripts -->
<script src="<?= base_url(); ?>/public/assets/js/jquery-3.1.1.min.js"></script>
<script src="<?= base_url(); ?>/public/assets/js/popper.min.js"></script>
<script src="<?= base_url(); ?>/public/assets/js/bootstrap.js"></script>
<script src="<?= base_url(); ?>/public/assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?= base_url(); ?>/public/assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<!-- Chosen -->
<script src="<?= base_url(); ?>/public/assets/js/plugins/chosen/chosen.jquery.js"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>/public/assets/js/plugins/select2/select2.full.min.js"></script>
<!-- Custom and plugin javascript -->
<script src="<?= base_url(); ?>/public/assets/js/inspinia.js"></script>
<script src="<?= base_url(); ?>/public/assets/js/plugins/pace/pace.min.js"></script>
<!-- jQuery UI -->
<script src="<?= base_url(); ?>/public/assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- dataTables  -->
<script src="<?= base_url(); ?>/public/assets/js/plugins/dataTables/datatables.min.js"></script>
<script src="<?= base_url(); ?>/public/assets/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
<!-- Data picker -->
<script src="<?= base_url(); ?>/public/assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<!-- SUMMERNOTE -->
<script src="<?= base_url(); ?>/public/assets/js/plugins/summernote/summernote-bs4.js"></script>

<script type="text/javascript">
    $('.chosen-select').chosen({
        width: "100%"
    });

    $(".select2_demo_3").select2({
        placeholder: "-- Pilih --",
        allowClear: true
    });

    $(document).ready(function() {
        $('.summernote').summernote();

        var mem = $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });
    });
</script>