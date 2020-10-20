<?php echo $this->load->view('pluggins/chosen_css', '', true) ?>
<select name="tag[]" class="chosen-select" width="1000px" multiple="">
    <?php
    echo cmb_tag($value)

    ?>
</select>