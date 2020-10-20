<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa extends Mhs_Controller {
var $id;
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
        $this->load->library('grocery_CRUD');
        $this->load->model('Master_model','master',true);
        $this->load->model('General_model','general',true);
        $this->load->model('Transaksi_model','tr',true);
        $this->load->model('Laporan_model','lp',true);
        $this->id = $this->session->userdata('sipot_pegawai_id');
    }
    function user(){
        $output = $this->master->user_mhs();
        $this->template->templateMhs($output);
    }
    function getNotifPengembalian(){
        echo $this->tr->getNotifPengembalianMhs();
    }
    function notif_skpi_mhs($id=null){
        $output = $this->tr->notif_skpi_mhs($id);
        $this->template->templateDetail($output);
    }
    function index(){
        $user_id = $this->session->userdata('skpi_nim');
         // $output=$this->lp->berandaAdmin();
         $time = new DateTime('now');
         $newtime = $time->modify('-1 year')->format('Y');
        $getPointTerkumpul = $this->db->query("select sum(b.point) as jumlah_point from skpi_trans a
        inner join skpi_task b on a.task_id = b.id
        where a.status_verifikasi = 'Terverifikasi' and nim = '$user_id'")->row();
        //getLevel
	//$this->general->testpre($getPointTerkumpul);die();
        (empty($getPointTerkumpul->jumlah_point))?$point=0:$point=$getPointTerkumpul->jumlah_point;
        $getLevel = $this->db->query("select * from skpi_level where point >= $point limit 1")->row();
        //------
         $jumlahMhsAktif = $this->db->where(array('STSMHS'=>'AKTIF'))->count_all_results('mhs');
         $dataHariIni = $this->db->where(array('date(tgl_isi)'=>date('Y-m-d'),'nim'=>$user_id))->count_all_results('skpi_trans');
         $dataBulanIni = $this->db->where(array('date_format(tgl_isi,"%Y-%m")'=>date('Y-m'),'nim'=>$user_id))->count_all_results('skpi_trans');
         $dataTahunIni = $this->db->where(array('year(tgl_isi)'=>date('Y'),'nim'=>$user_id))->count_all_results('skpi_trans');
         $dataTahunLalu = $this->db->where(array('year(tgl_isi)'=>$newtime,'nim'=>$user_id))->count_all_results('skpi_trans');
         $getPerJenis = $this->db->query("select jenis_id,count(*) as jumlah from skpi_trans where nim = '$user_id' group by jenis_id")->result();
         $getGrafikGaris = $this->db->query("select a.jenis_id,count(*)as jumlah,date_format(tgl_isi,'%m') as bulan_isi from skpi_trans a where nim = '$user_id' and status_verifikasi = 'Terverifikasi' and year(tgl_isi)=year(now()) group by a.jenis_id,date_format(tgl_isi,'%m') order by date_format(tgl_isi,'%m')")->result();
         // $this->general->testPre($getGrafikGaris);
         $dataGrafik = array();
         foreach($getGrafikGaris as $gg){
             $dataGrafik[$gg->bulan_isi][$gg->jenis_id]=$gg->jumlah;
         }
         // $this->general->testPre($dataGrafik);
         $jenis = array();
         foreach($getPerJenis as $gp){
             $jenis[$gp->jenis_id] =$gp->jumlah;
         }
         $data = array('point'=>$point,'level'=>$getLevel,'dataGrafik'=>$dataGrafik,'hariIni'=>$dataHariIni,'bulanIni'=>$dataBulanIni,'tahunIni'=>$dataTahunIni,'tahunLalu'=>$dataTahunLalu,'dataTiapJenis'=>$jenis,'jumlahMhsAktif'=>$jumlahMhsAktif);
         $output=array('output'=>$this->load->view('beranda_mhs',$data,true),'js_tambahan'=>$this->load->view('pluggins/chart_grafik','',true));
         $this->template->templateMhs($output);
        // $this->template->templateMhs(array('output'=>$beranda,'title'=>'Beranda User'));
    }
    function prestasi_mhs(){
        $output = $this->tr->prestasi_mhs();
        $this->template->templateMhs($output);
    }
    function organisasi_mhs(){
        $output = $this->tr->organisasi_mhs();
        $this->template->templateMhs($output);
    }
    function sertifikat_mhs(){
        $output = $this->tr->sertifikat_mhs();
        $this->template->templateMhs($output);
    }
    function magang_mhs(){
        $output = $this->tr->magang_mhs();
        $this->template->templateMhs($output);
    }
    function taskMhs(){
        $output = $this->master->taskMhs();
        $this->template->templateMhs($output);
    }
    function level(){
        $output = $this->master->levelMhs();
        $this->template->templateMhs($output);
    }
    function tr_skpi_mhs(){
        $output = $this->tr->tr_skpi_mhs();
        $this->template->templateMhs($output);
    }
    function skpi_pengembalian_mhs(){
        $output = $this->tr->skpi_pengembalian_mhs();
        $this->template->templateMhs($output);
    }
    function cek_task_tersedia(){
        $nim = $this->input->post('nim');
        $jenis_id = $this->input->post('jenis_id');
        $task_id = $this->input->post('task_id');
        $tgl_isi = $this->input->post('tgl_isi');
       return $this->tr->cek_task_tersedia($task_id,$tgl_isi,$nim,$jenis_id);
    }
    function cek_jumlah_input(){
        $nim = $this->input->post('nim');
        $jenis_id = $this->input->post('jenis_id');
        $task_id = $this->input->post('task_id');
        $tgl_isi = $this->input->post('tgl_isi');
       return $this->tr->cek_jumlah_input($task_id,$tgl_isi,$nim,$jenis_id);
    }
    /*
    function editProfile(){
        $dataProfile= $this->lp->getDataProfile($this->id);
        $beranda=$this->load->view('staff/edit_profile',compact('dataProfile'),true);
        $this->template->templateStaff(array('output'=>$beranda,'title'=>'Edit Profile'));
    }
    function updateProfile(){
        $this->master->updateProfile();
        redirect('staff/editProfile','refresh');
    }
    function harian(){
        $beranda=$this->load->view('staff/harian','',true);
        $this->template->templateStaff(array('output'=>$beranda,'title'=>'Rekap Harian'));
    }
    function prosesHarian(){
        $output=$this->lp->prosesHarian($this->id);
        echo json_encode($output);
    }
    function departemen(){
        $isi=$this->load->view('staff/log_departemen','',true);
        $this->template->templateStaff(array('output'=>$isi,'title'=>'Log Departemen'));
    }
    function getLogDepartemen(){
        $departemen_id = $this->input->post('departemen_id',true);
        $output=$this->lp->getLogDepartemen($departemen_id);
        echo json_encode($output);
    }
    */
}
