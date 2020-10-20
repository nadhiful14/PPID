<?php 
function btn_proses($function=null){
     return "<button type='button' onclick='".$function."()' class='btn btn-success  btn-flat' ><i class='fa fa-search'></i> Proses</button>";   
}
function btn_reset(){
    $ci = get_instance();
    $hasil =$ci->load->view('pluggins/reset', '', true);
    return $hasil.="<button id='reset' type='button' class='btn btn-success  btn-flat' ><i class='fa fa-times'></i> Reset</button>";   
}
function btn_print(){
    $ci = get_instance();
    $hasil =$ci->load->view('pluggins/print', '', true);
    return $hasil.="<button id='simplePrint' type='button' class='btn btn-success  btn-flat' ><i class='fa fa-print'></i> Cetak</button>";   
}
function btn_excel($namaFile=null){
    $ci = get_instance();
    $hasil =$ci->load->view('pluggins/excel', array('namaFile'=>$namaFile), true);
    return $hasil.="<button id='excel' type='button' class='btn btn-success  btn-flat' ><i class='fa fa-file-excel-o '></i> Excel</button>";   
}




?>