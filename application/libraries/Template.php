<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Template
{

	function __construct()
	{
		$this->CI = &get_instance();
	}

	function templateAdmin($output = null)
	{
		$this->CI->load->view('template', (array) $output);
	}
	function templateKepala($output = null)
	{
		$this->CI->load->view('template_kepala', (array) $output);
	}
	function templateMhs($output = null)
	{
		$this->CI->load->view('template_mahasiswa', (array) $output);
	}
	function templateDetail($output = null)
	{
		$this->CI->load->view('template_detail', (array) $output);
	}



	function templateHome($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('template_front', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function listBerita($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/list', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function detailBerita($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/detail_berita', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function formulir_permohonan_online($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/formulir_permohonan_informasi', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function formulir_pengajuan_keberatan($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/formulir_pengajuan_keberatan', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function formulir_kepuasan_masyarakat($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/formulir_kepuasan_masyarakat', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function formulir_survey_pelayanan($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/formulir_survey_pelayanan', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function anggota_dprd($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/anggota_dprd', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function informasi_berkala($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/informasi_berkala', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function badan_anggaran($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/badan_anggaran', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function badan_musyawarah($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/badan_musyawarah', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function badan_pembentuk_perda($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/badan_pembentuk_perda', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function badan_kehormatan($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/badan_kehormatan', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function struktur_organisasi($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/struktur_organisasi', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function tugas_dan_fungsi($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/tugas_dan_fungsi', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function profil_pejabat_struktural($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/profil_pejabat_struktural', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function komisi_komisi($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/komisi_komisi', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function pimpinan_dprd($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/pimpinan_dprd', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function agenda_kerja($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/agenda_kerja', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function rencana_ppid($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/rencana_ppid', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function profil_dprd($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/profil_dprd', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function profil_ppid_pembantu($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/profil_ppid_pembantu', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function list_laporan_keuangan($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/list_laporan_keuangan', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function tampil_laporan_keuangan($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/laporan_keuangan', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function tampil_peraturan_keterbukaan_informasi($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/peraturan_keterbukaan_informasi', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function tampil_struktur_ppid($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/struktur_ppid', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function tampil_kontak($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/kontak', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function sop_ppid($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/sop_layanan_ppid', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function profil_badan_publik($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/profil_badan_publik', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function informasi_dikecualikan($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/informasi_dikecualikan', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function informasi_dikecualikan_tahun($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/informasi_dikecualikan_tahun', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function list_kategori($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/list_kategori', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function daftar_informasi_publik($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/daftar_informasi_publik', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function peraturan_daerah($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/peraturan_daerah', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function detail_peraturan_daerah($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/detail_peraturan_daerah', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function tahun_peraturan($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/tahun_peraturan', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function pedoman_ppid($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/pedoman_ppid_pembantu', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function tata_tertib_dprd($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/tata_tertib', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}
	function laporan_tahunan_dprd($output = null)
	{
		$this->CI->load->view('template/header', (array) $output);
		$this->CI->load->view('front/laporan_tahunan_dprd', (array) $output);
		$this->CI->load->view('template/footer', (array) $output);
	}




	//==================================================================== 			
}
