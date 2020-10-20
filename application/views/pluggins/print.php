<script src="<?php echo base_url() ?>assets/pluggins/print/jquery.printelement.js"></script>
<script>
    $(document).on('click', '#simplePrint', function () {
        $('#toPrint').printElement();
    });
</script>