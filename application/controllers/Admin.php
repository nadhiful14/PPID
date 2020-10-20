<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
        $this->load->model('Master_model', 'master', true);
        $this->load->model('Transaksi_model', 'tr', true);
        $this->load->model('Laporan_model', 'lp', true);
    }

    function index()
    {
        // $output=$this->lp->berandaAdmin();
        // $data = array('judul' => 'ini adalah judul');
        $data['total_artikel'] = $this->db->count_all_results('berita');
        $data['total_permohonan_informasi'] = $this->db->count_all_results('formulir_permohonan_informasi');
        $data['total_pengajuan_keberatan'] = $this->db->count_all_results('formulir_pengajuan_keberatan');
        $data['total_anggota_dprd'] = $this->db->count_all_results('anggota_dprd');
        $data['last_article'] = $this->master->last_article();
        $data['komentar'] = $this->master->total_komentar();
        // var_dump($data['komentar']);
        // die();

        $temp = $this->load->view('beranda', $data, true);
        $output = array('berandaActive' => 'active', 'output' => $temp);
        $this->template->templateAdmin($output);
    }
    function user()
    {
        $output = $this->master->user();
        $this->template->templateAdmin($output);
    }

    function setDiterima($id)
    {
        $this->db->set('status', 'Diterima')->where('id', $id)->update('formulir_permohonan_informasi');
        echo json_encode(array('success' => true));
    }
    function setDitolak($id)
    {
        $this->db->set('status', 'Ditolak')->where('id', $id)->update('formulir_permohonan_informasi');
        echo json_encode(array('success' => true));
    }


    function setTanggal($id)
    {
        echo $this->load->view('date', array('id' => $id), true);
    }
    function handleTanggal()
    {
        $id = $this->input->post('id');
        $tanggal = $this->input->post("tanggal_pengambilan");
        $this->db->set('tanggal_pengambilan', $tanggal)->where('id', $id)->update('formulir_permohonan_informasi');
    }

    function setDiterimaPengajuan($id)
    {
        $this->db->set('status', 'Diterima')->where('id', $id)->update('formulir_pengajuan_keberatan');
        echo json_encode(array('success' => true));
    }
    function publishArticle($id)
    {
        $this->db->set('publish', 'Publish')->where('id', $id)->update('berita');
        echo json_encode(array('success' => true));
    }
    function tidakPublish($id)
    {
        $this->db->set('publish', 'Tidak')->where('id', $id)->update('berita');
        echo json_encode(array('success' => true));
    }
    function setDitolakPengajuan($id)
    {
        $this->db->set('status', 'Ditolak')->where('id', $id)->update('formulir_pengajuan_keberatan');
        echo json_encode(array('success' => true));
    }


    function setTanggalPengajuan($id)
    {
        echo $this->load->view('date_pengajuan', array('id' => $id), true);
    }
    function handleTanggalPengajuan()
    {
        $id = $this->input->post('id');
        $tanggal = $this->input->post("tanggal_pengambilan");
        $this->db->set('tanggal_pengambilan', $tanggal)->where('id', $id)->update('formulir_pengajuan_keberatan');
    }

    function setDiterimaKepuasan($id)
    {
        $this->db->set('status', 'Diterima')->where('id', $id)->update('formulir_kepuasan_masyarakat');
        echo json_encode(array('success' => true));
    }
    function setDitolakKepuasan($id)
    {
        $this->db->set('status', 'Ditolak')->where('id', $id)->update('formulir_kepuasan_masyarakat');
        echo json_encode(array('success' => true));
    }



    // function action_more()
    // {
    //     echo "<div style='font-size:16px;font-family:Arial'>";
    //     echo "Just a test function for more button and id: <b>" . (int)$id . "</b><br/>";
    //     echo "<a href='" . site_url('Master_model/form_permohonan') . "'>Go back to example</a>";
    //     echo "</div>";
    //     die();
    // }




    function master_jabatan()
    {
        $output = $this->master->master_jabatan();
        $this->template->templateAdmin($output);
    }
    function master_fraksi()
    {
        $output = $this->master->master_fraksi();
        $this->template->templateAdmin($output);
    }
    function master_kategori()
    {
        $output = $this->master->master_kategori();
        $this->template->templateAdmin($output);
    }
    function master_tag()
    {
        $output = $this->master->master_tag();
        $this->template->templateAdmin($output);
    }
    function master_image_slider()
    {
        $output = $this->master->master_image_slider();
        $this->template->templateAdmin($output);
    }
    function master_footer()
    {
        $output = $this->master->master_footer();
        $this->template->templateAdmin($output);
    }
    function berita()
    {
        $output = $this->master->berita();
        $this->template->templateAdmin($output);
    }
    function anggota_dprd()
    {
        $output = $this->master->anggota_dprd();
        $this->template->templateAdmin($output);
    }
    function struktur_organisasi()
    {
        $output = $this->master->struktur_organisasi();
        $this->template->templateAdmin($output);
    }
    function twitter()
    {
        $output = $this->master->twitter();
        $this->template->templateAdmin($output);
    }
    function tugas_dan_fungsi()
    {
        $output = $this->master->tugas_dan_fungsi();
        $this->template->templateAdmin($output);
    }
    function profil_pejabat_struktural()
    {
        $output = $this->master->profil_pejabat_struktural();
        $this->template->templateAdmin($output);
    }
    function pimpinan_dprd()
    {
        $output = $this->master->pimpinan_dprd();
        $this->template->templateAdmin($output);
    }
    function komisi_komisi()
    {
        $output = $this->master->komisi_komisi();
        $this->template->templateAdmin($output);
    }
    function badan_anggaran()
    {
        $output = $this->master->badan_anggaran();
        $this->template->templateAdmin($output);
    }
    function badan_musyawarah()
    {
        $output = $this->master->badan_musyawarah();
        $this->template->templateAdmin($output);
    }
    function badan_pembentuk_perda()
    {
        $output = $this->master->badan_pembentuk_perda();
        $this->template->templateAdmin($output);
    }
    function badan_kehormatan()
    {
        $output = $this->master->badan_kehormatan();
        $this->template->templateAdmin($output);
    }
    function tatatertib_dprd()
    {
        $output = $this->master->tatatertib_dprd();
        $this->template->templateAdmin($output);
    }
    function agenda_kerja()
    {
        $output = $this->master->agenda_kerja();
        $this->template->templateAdmin($output);
    }
    function rencana_ppid()
    {
        $output = $this->master->rencana_ppid();
        $this->template->templateAdmin($output);
    }
    function laporan_tahunan_dprd()
    {
        $output = $this->master->laporan_tahunan();
        $this->template->templateAdmin($output);
    }
    function profil_dprd()
    {
        $output = $this->master->profil_dprd();
        $this->template->templateAdmin($output);
    }
    function pedoman_ppid()
    {
        $output = $this->master->pedoman_ppid();
        $this->template->templateAdmin($output);
    }
    function sop_layanan_ppid()
    {
        $output = $this->master->sop_layanan_ppid();
        $this->template->templateAdmin($output);
    }
    function peraturan_keterbukaan_informasi()
    {
        $output = $this->master->peraturan_keterbukaan_informasi();
        $this->template->templateAdmin($output);
    }
    function peraturan_dprd()
    {
        $output = $this->master->peraturan_dprd();
        $this->template->templateAdmin($output);
    }
    function peraturan_daerah()
    {
        $output = $this->master->peraturan_daerah();
        $this->template->templateAdmin($output);
    }
    function peraturan_bupati()
    {
        $output = $this->master->peraturan_bupati();
        $this->template->templateAdmin($output);
    }
    function kontak()
    {
        $output = $this->master->kontak();
        $this->template->templateAdmin($output);
    }
    function alamat()
    {
        $output = $this->master->alamat();
        $this->template->templateAdmin($output);
    }
    function tentang()
    {
        $output = $this->master->tentang();
        $this->template->templateAdmin($output);
    }
    function email()
    {
        $output = $this->master->email();
        $this->template->templateAdmin($output);
    }
    function website()
    {
        $output = $this->master->website();
        $this->template->templateAdmin($output);
    }
    function alat_kelengkapan_dewan()
    {
        $output = $this->master->alat_kelengkapan_dewan();
        $this->template->templateAdmin($output);
    }
    function profil_badan_publik()
    {
        $output = $this->master->profil_badan_publik();
        $this->template->templateAdmin($output);
    }
    function profil_ppid_pembantu()
    {
        $output = $this->master->profil_ppid_pembantu();
        $this->template->templateAdmin($output);
    }
    function sk_ppid()
    {
        $output = $this->master->sk_ppid();
        $this->template->templateAdmin($output);
    }
    function struktur_ppid_pembantu()
    {
        $output = $this->master->struktur_ppid_pembantu();
        $this->template->templateAdmin($output);
    }
    function rencana_kerja_ppid()
    {
        $output = $this->master->rencana_kerja_ppid();
        $this->template->templateAdmin($output);
    }
    function form_permohonan()
    {
        $output = $this->master->form_permohonan();
        $this->template->templateAdmin($output);
    }
    function form_pengajuan_keberatan()
    {
        $output = $this->master->form_pengajuan();
        $this->template->templateAdmin($output);
    }
    function form_survey_pelayanan()
    {
        $output = $this->master->form_survey_pelayanan();
        $this->template->templateAdmin($output);
    }
    function detail_survey($id)
    {
        $output = $this->master->detail_survey($id);
        $this->template->templateDetail($output);
    }
    function form_kepuasan_masyarakat()
    {
        $output = $this->master->form_kepuasan();
        $this->template->templateAdmin($output);
    }
    function daftar_informasi_publik()
    {
        $output = $this->master->daftar_informasi_publik();
        $this->template->templateAdmin($output);
    }
    function informasi_berkala()
    {
        $output = $this->master->informasi_berkala();
        $this->template->templateAdmin($output);
    }
    function informasi_serta_merta()
    {
        $output = $this->master->informasi_serta_merta();
        $this->template->templateAdmin($output);
    }
    function informasi_setiap_saat()
    {
        $output = $this->master->informasi_setiap_saat();
        $this->template->templateAdmin($output);
    }
    function formulirOffline()
    {
        $output = $this->master->data_formulir_offline();
        $this->template->templateAdmin($output);
    }
    function laporan_keuangan()
    {
        $output = $this->master->laporan_keuangan();
        $this->template->templateAdmin($output);
    }
    function informasi_dikecualikan()
    {
        $output = $this->master->informasi_dikecualikan();
        $this->template->templateAdmin($output);
    }
    function foto_informasi_dikecualikan()
    {
        $output = $this->master->foto_informasi_dikecualikan();
        $this->template->templateAdmin($output);
    }
    function master_bentuk_produk_hukum()
    {
        $output = $this->master->master_bentuk_produk_hukum();
        $this->template->templateAdmin($output);
    }
    function master_pertanyaan_survey_pelayanan()
    {
        $output = $this->master->master_pertanyaan_survey_pelayanan();
        $this->template->templateAdmin($output);
    }












    // function testing(){
    //     $output = $this->master->testing();
    //     $this->template->templateAdmin($output);
    // }
    //  function testing_prodi(){
    //     $output = $this->master->testing_prodi();
    //     $this->template->templateAdmin($output);
    // }
    /*
    function index(){
        // $output=$this->lp->berandaAdmin();
        $time = new DateTime('now');
        $newtime = $time->modify('-1 year')->format('Y');

        $jumlahMhsAktif = $this->db->where(array('STSMHS'=>'AKTIF'))->count_all_results('mhs');
        $dataHariIni = $this->db->where(array('date(tgl_isi)'=>date('Y-m-d')))->count_all_results('skpi_trans');
        $dataBulanIni = $this->db->where(array('date_format(tgl_isi,"%Y-%m")'=>date('Y-m')))->count_all_results('skpi_trans');
        $dataTahunIni = $this->db->where(array('year(tgl_isi)'=>date('Y')))->count_all_results('skpi_trans');
        $dataTahunLalu = $this->db->where(array('year(tgl_isi)'=>$newtime))->count_all_results('skpi_trans');
        $getPerJenis = $this->db->query("select jenis_id,count(*) as jumlah from skpi_trans group by jenis_id")->result();
        $getGrafikGaris = $this->db->query("select a.jenis_id,count(*)as jumlah,date_format(tgl_isi,'%m') as bulan_isi from skpi_trans a where status_verifikasi = 'Terverifikasi' and year(tgl_isi)=year(now()) group by a.jenis_id,date_format(tgl_isi,'%m') order by date_format(tgl_isi,'%m')")->result();
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
        $data = array('dataGrafik'=>$dataGrafik,'hariIni'=>$dataHariIni,'bulanIni'=>$dataBulanIni,'tahunIni'=>$dataTahunIni,'tahunLalu'=>$dataTahunLalu,'dataTiapJenis'=>$jenis,'jumlahMhsAktif'=>$jumlahMhsAktif);
        $output=array('output'=>$this->load->view('beranda_admin',$data,true),'js_tambahan'=>$this->load->view('pluggins/chart_grafik','',true));
        $this->template->templateAdmin($output);
    }
    function getNotifBaru(){
        echo $this->tr->getNotifBaru();
    }
    function getNotifPengembalian(){
        echo $this->tr->getNotifPengembalian();
    }

    function notif_skpi($id=null){
        $output = $this->tr->notif_skpi($id);
        $this->template->templateDetail($output);
    }
    function formPengembalian($id=null){
        $isi=$this->db->get_where('skpi_trans',array('id'=>$id))->row();
        $this->load->view('transaksi/form_pengembalian',array('id'=>$id,'isi'=>$isi));
    }
    function simpanPengembalian(){
        $this->tr->simpanPengembalian();
    }
    function level(){
        $output = $this->master->level();
        $this->template->templateAdmin($output);
    }
    
    function task(){
        $output = $this->master->task();
        $this->template->templateAdmin($output);
    }
    function skpi(){
        $output = $this->master->skpi();
        $this->template->templateAdmin($output);
    }
    function tr_skpi(){
        $output = $this->tr->tr_skpi();
        $this->template->templateAdmin($output);
    }
    function skpi_verified(){
        $output = $this->tr->skpi_verified();
        $this->template->templateAdmin($output);
    }
    function skpi_pengembalian(){
        $output = $this->tr->skpi_pengembalian();
        $this->template->templateAdmin($output);
    }
    function prestasi(){
        $output = $this->tr->prestasi();
        $this->template->templateAdmin($output);
    }
    function organisasi(){
        $output = $this->tr->organisasi();
        $this->template->templateAdmin($output);
    }
    function sertifikat(){
        $output = $this->tr->sertifikat();
        $this->template->templateAdmin($output);
    }
    function magang(){
        $output = $this->tr->magang();
        $this->template->templateAdmin($output);
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
    function verifikasi($id=null){
        $output=$this->tr->verifikasi($id);
        echo json_encode($output);
    }
    function verifikasiBulk(){
        $output=$this->tr->verifikasiBulk();
        echo json_encode($output);
    }
   */
}
