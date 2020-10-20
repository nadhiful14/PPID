<?php
function ajax_return_json($namaFunction = null, $url = null, $tagHasil = null) {
    $ci = get_instance();
    $data = array('namaFunction' => $namaFunction, 'url' => $url, 'tagHasil' => $tagHasil);
    return $ci->load->view('button/ajax_return_json', $data, true);
}
function ajax_return_json_function($namaFunction = null, $url = null, $tagHasil = null,$namaMethod=null) {
    $ci = get_instance();
    $data = array('namaFunction' => $namaFunction, 'url' => $url, 'tagHasil' => $tagHasil,'namaMethod'=>$namaMethod);
    return $ci->load->view('button/ajax_return_json_function', $data, true);
}

function sweetalert_yes_no($namaFunction = null,$tanya =null,$reload=null){
    $ci = get_instance();
    $data = array('namaFunction' => $namaFunction, 'tanya'=>$tanya,'reload'=>$reload);
    return $ci->load->view('button/alert', $data, true);
}
function ajax_return_html_one_id($namaFunction = null, $url = null, $tagHasil = null,$namaMethod=null) {
    $ci = get_instance();
    $data = array('namaFunction' => $namaFunction, 'url' => $url, 'tagHasil' => $tagHasil,'namaMethod'=>$namaMethod);
    return $ci->load->view('button/ajax_return_html_one_id', $data, true);
}
function ajax_return_html_one_id_prepend($namaFunction = null, $url = null, $tagHasil = null,$namaMethod=null) {
    $ci = get_instance();
    $data = array('namaFunction' => $namaFunction, 'url' => $url, 'tagHasil' => $tagHasil,'namaMethod'=>$namaMethod);
    return $ci->load->view('button/ajax_return_html_one_id_prepend', $data, true);
}
?>
