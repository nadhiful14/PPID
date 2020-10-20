<script>
     $(document).on('click', '#reset', function () {
            $('.chosen-select').val('').trigger('chosen:updated');
        $('input:text').val('');
        $(".daterange").val('');
        $("#radio-default").prop("checked", true);
        });
</script>