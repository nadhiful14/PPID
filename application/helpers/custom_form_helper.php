<?php
function formPost($namaForm = null) {
    $ci = get_instance();
    return $ci->load->view('helper/formPost', compact('namaForm'), true);
}