<link rel="stylesheet" href="<?php echo base_url('assets/pluggins/datepicker/css/datepicker.css') ?>">
<!--<script src="<?php echo base_url('assets/pluggins/datepicker/moment.min.js') ?>" type="text/javascript"></script>-->
<script src="<?php echo base_url('assets/pluggins/datepicker/js/bootstrap-datepicker.js') ?>" type="text/javascript"></script>
<script>
    $(function () {
        $('.datepicker').datepicker(
                {
                    format: 'yyyy-mm-dd',
                    todayBtn: 'linked',
                    autoclose: true
                }
        );


        $('.datepickerMonth').datepicker(
                {
                    format: 'yyyy-mm-dd',
                    todayBtn: 'linked',
                    autoclose: true,
                    minViewMode: 1,
                    maxViewMode: 1
                }
        );
       
    });
</script>