<?php
function cmb_tag($value = null)
{
   $isi = explode(",", $value); //array(0=> 'satu',1=> dua);
   $ci = get_instance(); //karena di luar controller, biar bisa manggil $this dan di ganti $ci

   $radios = $ci->db->get('master_tag')->result();
   $cmb = "<option value=''></option>";
   $selected = '';
   foreach ($radios as $gt) { //isi=> satu
      (in_array($gt->nama, $isi)) ? $selected = "selected" : $selected = "";
      $cmb .= "<option $selected value='" . $gt->nama . "'>$gt->nama</option>";
   }
   return $cmb;
}




//=======================================================================
function cmb_jadwal()
{
   $ci = get_instance();
   $radios = $ci->db->get('sipot_jadwal')->result();
   $cmb = "<option value=''></option>";
   $selected = '';
   foreach ($radios as $gt) {
      $cmb .= "<option value='" . $gt->id . "'>$gt->nama</option>";
   }
   return $cmb;
}
function cmb_shift()
{
   $ci = get_instance();
   $radios = $ci->db->get('sipot_shift')->result();
   $cmb = "<option value=''></option>";
   $selected = '';
   foreach ($radios as $gt) {
      $cmb .= "<option value='" . $gt->id . "'>$gt->nama</option>";
   }
   return $cmb;
}
function cmb_pegawai($idSelected = null)
{
   $ci = get_instance();
   $radios = $ci->db->get('sipot_pegawai')->result();
   $cmb = "<option value=''></option>";
   $selected = "";
   foreach ($radios as $gt) {
      ($gt->id == $idSelected) ? $selected = "selected" : $selected = "";
      $cmb .= "<option $selected value='" . $gt->id . "'>$gt->nama</option>";
   }
   return $cmb;
}

function cmb_departemen($idSelected = null)
{
   $ci = get_instance();
   $radios = $ci->db->get('sipot_departemen')->result();
   $cmb = "<option value=''></option>";
   $selected = "";
   foreach ($radios as $gt) {
      ($gt->id == $idSelected) ? $selected = "selected" : $selected = "";
      $cmb .= "<option $selected value='" . $gt->id . "'>$gt->nama</option>";
   }
   return $cmb;
}
function cmb_sub_departemen($idSelected = null)
{
   $ci = get_instance();
   $radios = $ci->db->get('sipot_sub_departemen')->result();
   $cmb = "<option value=''></option>";
   $selected = "";
   foreach ($radios as $gt) {
      ($gt->id == $idSelected) ? $selected = "selected" : $selected = "";
      $cmb .= "<option $selected value='" . $gt->id . "'>$gt->nama</option>";
   }
   return $cmb;
}
function cmb_tipe_pegawai($idSelected = null)
{
   $ci = get_instance();
   $radios = $ci->db->get('sipot_tipe_pegawai')->result();
   $cmb = "<option value=''></option>";
   $selected = "";
   foreach ($radios as $gt) {
      ($gt->id == $idSelected) ? $selected = "selected" : $selected = "";
      $cmb .= "<option $selected value='" . $gt->id . "'>$gt->nama</option>";
   }
   return $cmb;
}
function cmb_jenis_pegawai($idSelected = null)
{
   $ci = get_instance();
   $radios = $ci->db->get('sipot_jenis_pegawai')->result();
   $cmb = "<option value=''></option>";
   $selected = "";
   foreach ($radios as $gt) {
      ($gt->id == $idSelected) ? $selected = "selected" : $selected = "";
      $cmb .= "<option $selected value='" . $gt->id . "'>$gt->nama</option>";
   }
   return $cmb;
}
function cmb_jenis_presensi($idSelected = null)
{
   $ci = get_instance();
   $radios = $ci->db->get('sipot_jenis_presensi')->result();
   $cmb = "<option value=''></option>";
   $selected = "";
   foreach ($radios as $gt) {
      ($gt->id == $idSelected) ? $selected = "selected" : $selected = "";
      $cmb .= "<option $selected value='" . $gt->id . "'>$gt->nama</option>";
   }
   return $cmb;
}
