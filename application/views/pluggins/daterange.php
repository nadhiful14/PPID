<link rel="stylesheet" href="<?php echo base_url('assets/pluggins/daterangepicker/daterangepicker.css') ?>">
<script src="<?php echo base_url('assets/pluggins/daterangepicker/moment.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/pluggins/daterangepicker/daterangepicker.js') ?>" type="text/javascript"></script>
<script>
    $(function () {
        $('.daterange').daterangepicker(
                {
                    locale: {
                        format: 'YYYY-MM-DD'
                    },
                    rangeSplitter: ' to ',
                    datepickerOptions: {
                        changeMonth: true,
                        changeYear: true
                    }
                }
        );
        
    });
</script>