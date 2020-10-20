<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
		function is_satpam($jadwal_berlaku=null){
		$satpams = array(2,3);
		return in_array($jadwal_berlaku,$satpams);
	}
	function getJumlahHariLiburPerbulan($tahunIni,$hariIni){
		return $hasil = $this->db->query("select  DATE_FORMAT(tanggal, '%Y-%m') AS bulan,count(*) as jumlah_libur from sipot_hari_libur where tanggal between '$tahunIni' and '$hariIni' and DAYOFWEEK(tanggal) NOT IN (1,7) GROUP BY DATE_FORMAT(tanggal, '%Y-%m')")->result_array();//exclude hari libur yang kebetulan hari sabtu minggu
	}
	function getJumlahHariLibur($tahunIni,$hariIni){
		return $hasil = $this->db->query("select count(*) as jumlah_libur from sipot_hari_libur where tanggal between '$tahunIni' and '$hariIni' and DAYOFWEEK(tanggal) NOT IN (1,7)")->result_array();//exclude hari libur yang kebetulan hari sabtu minggu
	}
	function getHariMasuk($tahunIni=null,$hariIni=null,$is_satpam=null){
		$getHariLibur = $this->getJumlahHariLibur($tahunIni,$hariIni);
		if($is_satpam){
			//jika satpam maka hari libur tidak mempengaruhi
			$get_hari_masuk = array_sum(array_column($this->db->query("call get_count_day_masuk_satpam('$tahunIni','$hariIni')")->result_array(),'jumlah_hari'));
		}else{
			$hari_masuk = array_sum(array_column($this->db->query("call get_count_day_masuk_one_month('$tahunIni','$hariIni')")->result_array(),'jumlah_hari'));
			$jumlah_libur = array_sum(array_column($getHariLibur,'jumlah_libur'));
		
			$get_hari_masuk = $hari_masuk - $jumlah_libur;
		}
		return $get_hari_masuk;
	}
	    function berandaAdmin()
    {
		$getTlPsw=  $this->db->query("select predikat_telat,count(*) as jumlah from v_log_telat_pulang_cepat where tanggal between date(now()) and date(now()) and predikat_telat not in ('PSW4') group by predikat_telat union
		select predikat_pulang_cepat,count(*) as jumlah from v_log_telat_pulang_cepat where tanggal between date(now()) and date(now()) and predikat_pulang_cepat not in ('PSW4') group by predikat_pulang_cepat;
		")->result();
		$getJumlahPresensi = $this->db->query("select a.id,a.nama,count(b.jenis_presensi_id) as jumlah from sipot_jenis_presensi a
		left join (select jenis_presensi_id from sipot_log_presensi where tanggal between date(now()) and date(now())) as b
		on a.id = b.jenis_presensi_id where a.id != 5
		group by a.id")->result();
		$getGrafikTelat = $this->db->query("select tanggal,count(menit_terlambat) as jumlah_telat from v_log_telat_pulang_cepat where menit_terlambat is not null and year(tanggal)=year(now()) and month(tanggal) = month(now()) group by tanggal")->result();
        $getGrafikPsw = $this->db->query("select tanggal,count(menit_pulang_cepat) as jumlah_pulang_cepat from v_log_telat_pulang_cepat where menit_pulang_cepat is not null and year(tanggal)=year(now()) and month(tanggal) = month(now()) group by tanggal")->result();
			$getCountPegawai = $this->db->query("select count(*) as jumlah_pegawai from sipot_pegawai where status = 'Aktif'" )->row();
		$tglMulai = date('Y-m-01');
		$tglSelesai = date('Y-m-d');
		// $this->general->testPre($getGrafikPsw);
		// $this->general->testPre($getGrafikTelat);
		$getTanggal = $this->db->query("call get_all_date('$tglMulai','$tglSelesai')")->result();
		$data =array();
		foreach($getGrafikTelat as $kTelat=>$valTelat){
			$data[$valTelat->tanggal]['tl']=$valTelat->jumlah_telat;
		}
		foreach($getGrafikPsw as $kPulang=>$valPulang){
			$data[$valPulang->tanggal]['psw']=$valPulang->jumlah_pulang_cepat;
		}
		
		$content = $this->load->view('beranda', array('tanggal'=>$getTanggal,'grafik'=>$data,'tlPsw' => $getTlPsw,'jumlahPresensi'=>$getJumlahPresensi,'jumlahPegawai'=>$getCountPegawai), true);
        $temp = $this->load->view("pluggins/panel_bootstrap", array('headerPanel' => 'Beranda Admin', 'contentPanel' => $content), true);
        $output = array('berandaActive' => 'active', 'output' => $temp);
        return $output;
    }

    function getLogPresensi()
    {
        $date = date('Y-m-d');
        //$dataLaporan = $this->getLog($date,$date,'kosong','kosong','1','kosong','kosong','kosong','kosong','Aktif');
		$dataLaporan = $this->db->query("select a.userid,a.masuk,b.nama,c.nama as nama_departemen from (select userid,time(checktime) as masuk from checkinout where date(checktime) = date(now()) order by time(checktime) desc) as a inner join sipot_pegawai as b on a.userid = b.id inner join sipot_departemen c on b.departemen_id = c.id")->result();
        return array('success' => true, 'msg' => 'berhasil', 'result' => $this->load->view('login/log_public', compact('dataLaporan'), true));
    }
    function getLogDepartemen($id = null)
    {
        $date = date('Y-m-d');
        $dataLaporan = $this->getLog($date,$date,'kosong','kosong','1',$id,'kosong','kosong','kosong','Aktif');
        return array('success' => true, 'msg' => 'berhasil', 'result' => $this->load->view('staff/detail_log_departemen', compact('dataLaporan'), true));
    }
	function isPersonSatpam($id){
		$getJadwal = $this->db->limit(1)->order_by('tgl_mulai_berlaku','desc')->get_where('sipot_tr_jadwal',array('pegawai_id'=>$id))->row();
		return (empty($getJadwal)) ? false : $this->is_satpam($getJadwal->jadwal_id);
	}
    function prosesHarian($id = null)
    {
		$isSatpam = $this->isPersonSatpam($id);
        $dataProfile = $this->getDataProfile($id);
        $dataLaporan = $this->getDetailHarianStaff($id,$isSatpam);
		//$this->general->testPre($dataLaporan);die();
		$tglAwal =  date('Y').'-01-01';
		$tglAkhir = date('Y-m-d');
		mysqli_next_result($this->db->conn_id);
		$hariLibur = $this->getHariLibur($tglAwal,$tglAkhir);
        return array('success' => true, 'msg' => 'berhasil', 'result' => $this->load->view('staff/detail_harian', compact('hariLibur','dataProfile', 'dataLaporan','isSatpam'), true));
    }
	function getHariLibur($tgl_awal=null,$tgl_akhir=null){
		$hari=$this->db->query("select * from sipot_hari_libur where tanggal between '$tgl_awal' and '$tgl_akhir'")->result();
		$data = array();
		foreach($hari as $h){
			$data[$h->tanggal]=$h->keterangan;
		}
		return $data;
	}
    function getRekapHarianStaff($id = null)
    {
        $tgl = date('Y-m-d');
        $year = date('Y');
		
        $laporan = $this->getLog($tgl,$tgl,$id,'kosong','kosong','kosong','kosong','kosong','kosong','Aktif');
		
			// mysqli_next_result($this->db->conn_id);
        $getSisaCuti = $this->db->query("select pegawai_id,sum(sisa) as sisa from sipot_sisa_cuti where pegawai_id = '$id' and year(tahun) between (year(now()) - 1) and year(now())  group by pegawai_id")->row();
        // $getSisaCuti = $this->db->where("pegawai_id = '$id' and year(tahun)='$year'")->get_where('sipot_sisa_cuti')->row();
		$getInfoPresensi = $this->db->query("select b.id,b.nama,a.pegawai_id,a.jumlah from (select pegawai_id,jenis_presensi_id,count(jenis_presensi_id) as jumlah from sipot_log_presensi where year(tanggal) = year(now()) and pegawai_id = '$id' group by pegawai_id,jenis_presensi_id) as a right join (select id,nama from sipot_jenis_presensi where id !=5) as b on a.jenis_presensi_id = b.id")->result();
        return array('laporan' => $laporan, 'sisa_cuti' => $getSisaCuti,'infoPresensi'=>$getInfoPresensi);
    }
    function getDetailHarianStaff($id = null,$isSatpam)
    {
        $tanggal = $this->getInputTanggal('tanggal');
        $tgl = date('Y-m-d');
        if ($tanggal['tgl_mulai'] == $tgl and $tanggal['tgl_selesai'] == $tgl) { //diload dari awal tgl belum diisi
            $tglAwal = date("Y-m-01");
        } else {
            $tgl = $tanggal['tgl_selesai'];
            $tglAwal = $tanggal['tgl_mulai'];
        }
		if($isSatpam){
			        $dataLaporan = $this->getLogSatpam($tglAwal,$tgl,$id,'kosong','kosong','kosong','kosong','kosong','kosong','Aktif');
		}else{
        $dataLaporan = $this->getLog($tglAwal,$tgl,$id,'kosong','kosong','kosong','kosong','kosong','kosong','Aktif');
		}
        // mysqli_next_result($this->db->conn_id);
        $tanggal = $this->generateTanggal(array('tgl_mulai' => $tglAwal, 'tgl_selesai' => $tgl));
        $laporan = array();
        //$this->general->testPre($dataLaporan);die();
        foreach ($dataLaporan as $lp) {
			$laporan[$lp->tanggal]['nama_shift'] = $lp->nama_shift;
            $laporan[$lp->tanggal]['masuk'] = $lp->masuk;
            $laporan[$lp->tanggal]['keluar'] = $lp->keluar;
            $laporan[$lp->tanggal]['terlambat'] = $lp->terlambat;
            $laporan[$lp->tanggal]['pulang_cepat'] = $lp->pulang_cepat;
            $laporan[$lp->tanggal]['jenis_presensi_id'] = $lp->jenis_presensi_id;
            $laporan[$lp->tanggal]['is_libur_sabtu_minggu'] = $lp->is_libur_sabtu_minggu;
			$laporan[$lp->tanggal]['status_presensi'] = $lp->status_presensi;
        }
        return array('dataLaporan' => $laporan, 'tanggal' => $tanggal);
    }
    function getDataProfile($id = null)
    {
        return $this->db->get_where('sipot_pegawai', array('id' => $id))->row();
    }
    function getInputTanggal($namaInput = null)
    {
        $tanggal = $this->input->post($namaInput);
        $tanggal_mulai = substr($tanggal, 0, 10);
        $tanggal_selesai = substr($tanggal, -10);
        return array('tgl_mulai' => $tanggal_mulai, 'tgl_selesai' => $tanggal_selesai);
    }

    function generateTanggal($tanggal = null)
    {
        $sql = "call get_all_date('" . $tanggal['tgl_mulai'] . "','" . $tanggal['tgl_selesai'] . "')";
        return $getTanggal = $this->db->query($sql)->result();
    }
    function generateTanggalNonWeekend($tanggal = null)
    {
        $sql = "call get_all_date_except_weekend('" . $tanggal['tgl_mulai'] . "','" . $tanggal['tgl_selesai'] . "')";
        return $getTanggal = $this->db->query($sql)->result();
    }
    function getSumTanggalNonWeekendOneMonth($tanggal=null){
        $sql = "call get_count_day_masuk_one_month('" . $tanggal['tgl_mulai'] . "','" . $tanggal['tgl_selesai'] . "')";
        return $getTanggal = $this->db->query($sql)->result();
    }
    function getPostData()
    {
        $pegawai_id = $this->input->post('pegawai_id', true);
        $departemen_id = $this->input->post('departemen_id', true);
        $sub_departemen_id = $this->input->post('sub_departemen_id', true);
        $tipe_pegawai_id = $this->input->post('tipe_pegawai_id', true);
        $jenis_pegawai_id = $this->input->post('jenis_pegawai_id', true);
        $status_pegawai_id = $this->input->post('status_pegawai_id', true);
        (is_array($pegawai_id)) ? $pegawai_id = implode(",", $pegawai_id) : '';
        (is_array($departemen_id)) ? $departemen_id = implode(",", $departemen_id) : '';
        (is_array($sub_departemen_id)) ? $sub_departemen_id = implode(",", $sub_departemen_id) : '';
        (is_array($tipe_pegawai_id)) ? $tipe_pegawai_id = implode(",", $tipe_pegawai_id) : '';
        (is_array($jenis_pegawai_id)) ? $jenis_pegawai_id = implode(",", $jenis_pegawai_id) : '';
        (is_array($status_pegawai_id)) ? $status_pegawai_id = implode(",", $status_pegawai_id) : '';
        $data = array(
            'tanggal' => $this->getInputTanggal('tanggal'),
            'pegawai_id' => $pegawai_id,
            'departemen_id' => $departemen_id,
            'sub_departemen_id' => $sub_departemen_id,
            'tipe_pegawai_id' => $tipe_pegawai_id,
            'jenis_pegawai_id' => $jenis_pegawai_id,
            'status_pegawai_id' => $status_pegawai_id
        );
        return $data;
    }
    function kehadiranPns()
    {
        $content = $this->load->view('laporan/kehadiran/header', array('urlProses' => 'admin/prosesKehadiranPns','namaFile'=>'Kehadiran Pns'), true);
        $temp = $this->load->view("pluggins/panel_bootstrap", array('headerPanel' => 'Laporan Kehadiran PNS', 'contentPanel' => $content), true);
        $output = array('laporanActive' => 'active', 'output' => $temp);
        return $output;
    }
	

    function prosesKehadiranPns()
    {
        $postData = $this->getPostData();
        $postFix = array_filter($postData);
        $generateTanggal = $this->generateTanggal($postData['tanggal']);
        mysqli_next_result($this->db->conn_id);
        $getLaporan = $this->getLaporanUangMakan($postFix);
		//$this->general->testPre($postData['tanggal']);die();
		$getHariLibur=$this->getHariLibur($postData['tanggal']['tgl_mulai'],$postData['tanggal']['tgl_selesai']);
        $data = array('hariLibur'=>$getHariLibur,'dataLaporan' => $getLaporan, 'postFix' => $postFix, 'generateTanggal' => $generateTanggal, 'dataPegawai' => $this->getPegawaiBaseOnPost($postFix));
        return array('success' => true, 'msg' => 'berhasil', 'result' => $this->load->view('laporan/kehadiran/uang_makan', $data, true));
    }
    function rekapTahunan()
    {
        $content = $this->load->view('laporan/kehadiran/header', array('urlProses' => 'admin/prosesRekapTahunan','namaFile'=>'Rekap Tahunan'), true);
        $temp = $this->load->view("pluggins/panel_bootstrap", array('headerPanel' => 'Rekap Tahunan', 'contentPanel' => $content), true);
        $output = array('laporanActive' => 'active', 'output' => $temp);
        return $output;
    }

    function prosesRekapTahunan()
    {
        $postData = $this->getPostData();
        $postFix = array_filter($postData);
        $generateTanggal = $this->generateTanggal($postData['tanggal']);
        mysqli_next_result($this->db->conn_id);
        $getLaporan = $this->getRekapTahunan($postFix);
        $data = array('dataLaporan' => $getLaporan, 'postFix' => $postFix, 'generateTanggal' => $generateTanggal, 'dataPegawai' => $this->getPegawaiBaseOnPost($postFix));
        return array('success' => true, 'msg' => 'berhasil', 'result' => $this->load->view('laporan/kehadiran/rekap_tahunan', $data, true));
    }
    function getRekapTahunan($postFix=null){
         // $this->general->testPre($postFix);
         if (isset($postFix['tanggal'])) {
            $tgl_awal = substr($postFix['tanggal']['tgl_mulai'],0,7);
            $tgl_akhir =  substr($postFix['tanggal']['tgl_selesai'],0,7);
            $whereTanggal = "DATE_FORMAT(tanggal,'%Y-%m') between '$tgl_awal' and '$tgl_akhir'";
        } else {
            $tgl_awal = substr(date('Y-m-d'),0,7);
            $whereTanggal = "DATE_FORMAT(tanggal,'%Y-%m') between '$tgl_awal' and '$tgl_awal'";
        }
        (isset($postFix['pegawai_id'])) ? $wherePegawai = "id in ($postFix[pegawai_id])" : $wherePegawai = "0=0";
        (isset($postFix['pegawai_id'])) ? $wherePegawai2 = "pegawai_id in ($postFix[pegawai_id])" : $wherePegawai2 = "0=0";
        (isset($postFix['departemen_id'])) ? $whereDepartement = "departemen_id in ($postFix[departemen_id])" : $whereDepartement = "0=0";
        (isset($postFix['sub_departemen_id'])) ? $whereSubDepartemen = "sub_departemen_id in ($postFix[sub_departemen_id])" : $whereSubDepartemen = "0=0";
        (isset($postFix['tipe_pegawai_id'])) ? $whereTipePegawai = "tipe_pegawai_id in ($postFix[tipe_pegawai_id])" : $whereTipePegawai = "0=0";
        (isset($postFix['jenis_pegawai_id'])) ? $whereJenisPegawai = "jenis_pegawai_id in ($postFix[jenis_pegawai_id])" : $whereJenisPegawai = "0=0";
        (isset($postFix['status_pegawai_id'])) ? $whereStatusPegawai = "status = '$postFix[status_pegawai_id]'" : $whereStatusPegawai = "0=0";

        $sql = "SELECT
        a.bulan,
        a.pegawai_id,
        a.jenis_presensi_id,
        a.jumlah
      FROM (SELECT
          MONTH(tanggal) AS bulan,
          pegawai_id,
          jenis_presensi_id,
          COUNT(*) AS jumlah
        FROM sipot_log_presensi
        where $whereTanggal and $wherePegawai2 and dayofweek(tanggal) not in(1,7) and tanggal not in (select tanggal from sipot_hari_libur)
        GROUP BY MONTH(tanggal),
                 pegawai_id,
                 jenis_presensi_id
        ORDER BY pegawai_id) AS a
        INNER JOIN (SELECT
            id,
            nip,
            nama,
            departemen_id,
            sub_departemen_id,
            tipe_pegawai_id,
            jenis_pegawai_id,
            status,
            pin
          FROM sipot_pegawai
          where $wherePegawai and $whereDepartement and $whereSubDepartemen and $whereTipePegawai and $whereJenisPegawai and $whereStatusPegawai) AS b
          ON a.pegawai_id = b.id";
          $laporan = $this->db->query($sql)->result();
          $dataLaporan = array();
          foreach($laporan as $key=>$lp){
              (strlen($lp->bulan)==1)?$bulan='0'.$lp->bulan:$bulan=$lp->bulan;
            $dataLaporan[$lp->pegawai_id][$bulan][$lp->jenis_presensi_id]=$lp->jumlah;
          }
          return $dataLaporan;
    }
    function getLaporanUangMakan($postFix = null)
    {
        // $this->general->testPre($postFix);
        if (isset($postFix['tanggal'])) {
            $tgl_awal = $postFix['tanggal']['tgl_mulai'];
            $tgl_akhir = $postFix['tanggal']['tgl_selesai'];
            $whereTanggal = "tanggal between '$tgl_awal' and '$tgl_akhir'";
        } else {
            $whereTanggal = "0=0";
        }
        (isset($postFix['pegawai_id'])) ? $wherePegawai = "id in ($postFix[pegawai_id])" : $wherePegawai = "0=0";
        (isset($postFix['departemen_id'])) ? $whereDepartement = "departemen_id in ($postFix[departemen_id])" : $whereDepartement = "0=0";
        (isset($postFix['sub_departemen_id'])) ? $whereSubDepartemen = "sub_departemen_id in ($postFix[sub_departemen_id])" : $whereSubDepartemen = "0=0";
        (isset($postFix['tipe_pegawai_id'])) ? $whereTipePegawai = "tipe_pegawai_id in ($postFix[tipe_pegawai_id])" : $whereTipePegawai = "0=0";
        (isset($postFix['jenis_pegawai_id'])) ? $whereJenisPegawai = "jenis_pegawai_id in ($postFix[jenis_pegawai_id])" : $whereJenisPegawai = "0=0";
        (isset($postFix['status_pegawai_id'])) ? $whereStatusPegawai = "status = '$postFix[status_pegawai_id]'" : $whereStatusPegawai = "0=0";
        $laporan = $this->db->query("SELECT
        a.id,
        a.nip,
        a.nama,
        a.departemen_id,
        a.sub_departemen_id,
        a.tipe_pegawai_id,
        a.pin,
        b.tanggal,
        b.pegawai_id,
        b.jenis_presensi_id,
        c.inisial
      FROM (SELECT
          id,
          nip,
          nama,
          departemen_id,
          sub_departemen_id,
          tipe_pegawai_id,
          pin
        FROM sipot_pegawai where $wherePegawai and $whereStatusPegawai and $whereDepartement and $whereSubDepartemen and $whereTipePegawai and $whereJenisPegawai) AS a
        INNER JOIN (SELECT
            tanggal,
            pegawai_id,
            jenis_presensi_id
          FROM sipot_log_presensi where $whereTanggal and tanggal not in (select tanggal from sipot_hari_libur)) AS b
          ON a.id = b.pegawai_id
        INNER JOIN sipot_jenis_presensi c
          ON b.jenis_presensi_id = c.id")->result();
        $dataLaporan = array();
        foreach ($laporan as $k => $l) {
            $dataLaporan[$l->id][$l->tanggal] = $l->inisial;
        }
        return $dataLaporan;
    }

    function isWeekend($date = null)
    {
        return (date('N', strtotime($date)) >= 6);
    }
    function kehadiranBlu()
    {
        $content = $this->load->view('laporan/kehadiran/header', array('urlProses' => 'admin/prosesKehadiranBlu','namaFile'=>'Kehadiran BLU'), true);
        $temp = $this->load->view("pluggins/panel_bootstrap", array('headerPanel' => 'Laporan Kehadiran BLU', 'contentPanel' => $content), true);
        $output = array('laporanActive' => 'active', 'output' => $temp);
        return $output;
    }
	 function kehadiranSatpam()
    {
        $content = $this->load->view('laporan/kehadiran/header', array('urlProses' => 'admin/prosesKehadiranSatpam','namaFile'=>'Kehadiran Security'), true);
        $temp = $this->load->view("pluggins/panel_bootstrap", array('headerPanel' => 'Laporan Kehadiran Security', 'contentPanel' => $content), true);
        $output = array('laporanActive' => 'active', 'output' => $temp);
        return $output;
    }
    function tukin()
    {
        $content = $this->load->view('laporan/kehadiran/header', array('urlProses' => 'admin/prosesTukin','namaFile'=>'Tukin'), true);
        $temp = $this->load->view("pluggins/panel_bootstrap", array('headerPanel' => 'Laporan Tunjangan Kinerja', 'contentPanel' => $content), true);
        $output = array('laporanActive' => 'active', 'output' => $temp);
        return $output;
    }
    function prosesTukin()
    {
        $postData = $this->getPostData();
        $postFix = array_filter($postData);
        $generateTanggal = $this->generateTanggal($postData['tanggal']);
        mysqli_next_result($this->db->conn_id);
        $dataLaporan = $this->getLaporanKehadiranBlu();
		$getHariLibur=$this->getHariLibur($postData['tanggal']['tgl_mulai'],$postData['tanggal']['tgl_selesai']);
        // mysqli_next_result($this->db->conn_id);
        $data = array('hariLibur'=>$getHariLibur,'dataLaporan' => $dataLaporan, 'postFix' => $postFix, 'generateTanggal' => $generateTanggal, 'dataPegawai' => $this->getPegawaiBaseOnPost($postFix));
        return array('success' => true, 'msg' => 'berhasil', 'result' => $this->load->view('laporan/kehadiran/potongan_tukin', $data, true));
    }
    function getPegawaiBaseOnPost($params = null)
    {
        unset($params['tanggal']);
        if (isset($params['pegawai_id'])) {
            $this->db->where_in('a.id', explode(",",$params['pegawai_id']));
        }
        if (isset($params['status_pegawai_id'])) {
            $this->db->where('a.status', $params['status_pegawai_id']);
        }
        // 'pegawai_id' =>$pegawai_id,
        //     'departemen_id' => $departemen_id,
        //     'sub_departemen_id' => $sub_departemen_id,
        //     'tipe_pegawai_id' => $tipe_pegawai_id,
        //     'jenis_pegawai_id' => $jenis_pegawai_id,
        //     'status_pegawai_id' => $status_pegawai_id

        if (isset($params['departemen_id'])) {
            $this->db->where_in('a.departemen_id', explode(",",$params['departemen_id']));
        }
        if (isset($params['sub_departemen_id'])) {
            $this->db->where_in('a.sub_departemen_id', explode(",",$params['sub_departemen_id']));
        }
        if (isset($params['tipe_pegawai_id'])) {
            $this->db->where_in('a.tipe_pegawai_id', explode(",",$params['tipe_pegawai_id']));
        }
        if (isset($params['jenis_pegawai_id'])) {
            $this->db->where_in('a.jenis_pegawai_id', $params['jenis_pegawai_id']);
        }
        return $this->db->select("a.*,b.nama as nama_fakultas")->join("sipot_departemen b", "a.departemen_id = b.id")->order_by('a.departemen_id')->order_by('nip', 'asc')->get('sipot_pegawai a')->result();
    }
    function getTukinApi()
    {
        $nip = $this->input->get('nip');
        $departemen_id = $this->input->get('departemen_id');
        $sub_departemen_id = $this->input->get('sub_departemen_id');
        $tipe_pegawai = $this->input->get('tipe_pegawai');
        $jenis_pegawai_id = $this->input->get('jenis_pegawai_id');
        $tgl_awal = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');
        (empty($nip)) ? $whereNip = 'kosong' : $whereNip = $nip;
        (empty($departemen_id)) ? $whereDepartemenId = 'kosong' : $whereDepartemenId = $departemen_id;
        (empty($sub_departemen_id)) ? $whereSubDepartemenId = 'kosong' : $whereSubDepartemenId = $sub_departemen_id;
        (empty($tipe_pegawai)) ? $whereTipePegawai = 'kosong' : $whereTipePegawai = $tipe_pegawai;
        (empty($jenis_pegawai_id)) ? $whereJenisPegawai = 'kosong' : $whereJenisPegawai = $jenis_pegawai_id;
        if (empty($tgl_awal) or empty($tgl_akhir)) {
            $tgl_awal = date("Y-m-01");;
            $tgl_akhir = date("Y-m-t", strtotime($tgl_awal));
        }
        $params = array('nip' => $nip, 'departemen_id' => $departemen_id, 'sub_departemen_id' => $sub_departemen_id, 'tipe_pegawai' => $tipe_pegawai, 'jenis_pegawai_id' => $jenis_pegawai_id);
        $paramsFix = array_filter($params);
        $getPegawai = $this->getPegawaiBaseOnPost($paramsFix);
        $laporan = $this->getLog($tgl_awal,$tgl_akhir,'kosong',$whereNip,'kosong',$whereDepartemenId,$whereSubDepartemenId,$whereTipePegawai,$whereJenisPegawai,'Aktif');
        mysqli_next_result($this->db->conn_id);
        $getTanggals = $this->generateTanggalNonWeekend(array('tanggal_mulai' => $tgl_awal, 'tanggal_selesai' => $tgl_akhir));
        $dataLaporan = array();
        //inisialisasi variable
        foreach ($laporan as $key => $val) {
            $dataLaporan[$val->pegawai_id][$val->tanggal]['inisial'] = $val->inisial;
            $dataLaporan[$val->pegawai_id][$val->tanggal]['menit_tl'] = $val->menit_terlambat;
            $dataLaporan[$val->pegawai_id][$val->tanggal]['menit_psw'] = $val->menit_pulang_cepat;
        }
        $getPengaturanTukin = $this->db->get_where('sipot_pengaturan_tukin')->result();
        foreach ($getPengaturanTukin as $t) {
            $dataPengaturanTukin['tukin'][$t->nama] = array('batas_awal' => $t->batas_awal, 'batas_akhir' => $t->batas_akhir, 'pengurangan' => $t->pengurangan, 'pengurangan_rupiah' => $t->pengurangan_rupiah);
        }
        //perulangan pegawai
        foreach ($getPegawai as $key2 => $pg) {
            // $dataHasil[$pg->id]['result']=array()
            //inisialisasi variable
            $dataSum[$pg->id]['TL1'][] = 0;
            $dataSum[$pg->id]['TL2'][] = 0;
            $dataSum[$pg->id]['TL3'][] = 0;
            $dataSum[$pg->id]['TL4'][] = 0;
            $dataSum[$pg->id]['PSW1'][] = 0;
            $dataSum[$pg->id]['PSW2'][] = 0;
            $dataSum[$pg->id]['PSW3'][] = 0;
            $dataSum[$pg->id]['PSW4'][] = 0;
            $dataSum[$pg->id]['A'][] = 0;
            $dataSum[$pg->id]['I'][] = 0;
            $dataSum[$pg->id]['S'][] = 0;
            $dataSum[$pg->id]['D'][] = 0;
            $dataSum[$pg->id]['C'][] = 0;
            $dataSum[$pg->id][1][] = 0;
            //perulangan tanggal
            foreach ($getTanggals as $rt2) {
                if (@$dataLaporan[$pg->id][$rt2->date_dummy]['inisial'] == 1) {
                    //untuk mendapatkan psw dan tlnya
                    $dataPswTl = $this->lp->cekPresensi(@$dataLaporan[$pg->id][$rt2->date_dummy]['menit_tl'], @$dataLaporan[$pg->id][$rt2->date_dummy]['menit_psw']);
                    if ($dataPswTl != 1) {
                        //jika =1 maka masukkan ke jumlah hari masuk dibawahnya
                        //karena psw maupun tl dianggap masuk
                        //kalo ndak ada if maka yang nilai 1 menjadi dobel
                        $dataSum[$pg->id][$dataPswTl][] = 1;
                    }
                    //jumlah hari masuk
                    $dataSum[$pg->id][1][] = 1;
                } else {
                    //perhitungan jumlahnya
                    if (empty(@$dataLaporan[$pg->id][$rt2->date_dummy])) {
                        //jika kosong dianggap a
                        $dataSum[$pg->id]['A'][] = 1;
                        echo 'A';
                    } else {
                        //jika selain A
                        //masukkan ke sum
                        $dataSum[$pg->id][@$dataLaporan[$pg->id][$rt2->date_dummy]['inisial']][] = 1;
                        @$dataLaporan[$pg->id][$rt2->date_dummy]['inisial'];
                    }
                }
            }
            $hasilt1 = $this->getJumlahPersenPswTl('TL1', array_sum(@$dataSum[$pg->id]['TL1']), $dataPengaturanTukin['tukin']);
            $hasilt2 = $this->getJumlahPersenPswTl('TL2', array_sum(@$dataSum[$pg->id]['TL2']), $dataPengaturanTukin['tukin']);
            $hasilt3 = $this->getJumlahPersenPswTl('TL3', array_sum(@$dataSum[$pg->id]['TL3']), $dataPengaturanTukin['tukin']);
            $hasilt4 = $this->getJumlahPersenPswTl('TL4', array_sum(@$dataSum[$pg->id]['TL4']), $dataPengaturanTukin['tukin']);
            $hasilpsw1 = $this->getJumlahPersenPswTl('PSW1', array_sum(@$dataSum[$pg->id]['PSW1']), $dataPengaturanTukin['tukin']);
            $hasilpsw2 = $this->getJumlahPersenPswTl('PSW2', array_sum(@$dataSum[$pg->id]['PSW2']), $dataPengaturanTukin['tukin']);
            $hasilpsw3 = $this->getJumlahPersenPswTl('PSW3', array_sum(@$dataSum[$pg->id]['PSW3']), $dataPengaturanTukin['tukin']);
            $hasilpsw4 = $this->getJumlahPersenPswTl('PSW4', array_sum(@$dataSum[$pg->id]['PSW4']), $dataPengaturanTukin['tukin']);
            $hasilAlpha = $this->getJumlahPersenPswTl('A', array_sum(@$dataSum[$pg->id]['A']), $dataPengaturanTukin['tukin']);
            $hasilIzin = $this->getJumlahPersenPswTl('I', array_sum(@$dataSum[$pg->id]['I']), $dataPengaturanTukin['tukin']);
            $hasilSakit = $this->getJumlahPersenPswTl('S', array_sum(@$dataSum[$pg->id]['S']), $dataPengaturanTukin['tukin']);
            $hasilDinas = $this->getJumlahPersenPswTl('D', array_sum(@$dataSum[$pg->id]['D']), $dataPengaturanTukin['tukin']);
            $hasilCuti = $this->getJumlahPersenPswTl('C', array_sum(@$dataSum[$pg->id]['C']), $dataPengaturanTukin['tukin']);
            $total = $this->perhitunganTambahPersen($hasilt1, $hasilt2, $hasilt3, $hasilt4, $hasilpsw1, $hasilpsw2, $hasilpsw3, $hasilpsw4, $hasilAlpha, $hasilIzin, $hasilSakit, $hasilDinas, $hasilCuti);
            //ini yang diganti ketika nanti dirubah ke nip
            $dataHasil[$pg->id]['TL1'] = $hasilt1;
            $dataHasil[$pg->id]['TL2'] = $hasilt2;
            $dataHasil[$pg->id]['TL3'] = $hasilt3;
            $dataHasil[$pg->id]['TL4'] = $hasilt4;
            $dataHasil[$pg->id]['PSW1'] = $hasilpsw1;
            $dataHasil[$pg->id]['PSW2'] = $hasilpsw2;
            $dataHasil[$pg->id]['PSW3'] = $hasilpsw3;
            $dataHasil[$pg->id]['alpha'] = $hasilAlpha;
            $dataHasil[$pg->id]['izin'] = $hasilIzin;
            $dataHasil[$pg->id]['sakit'] = $hasilSakit;
            $dataHasil[$pg->id]['dinas'] = $hasilDinas;
            $dataHasil[$pg->id]['cuti'] = $hasilCuti;
            $dataHasil[$pg->id]['total'] = $total;
            $hasilt1 = 0;
            $hasilt2 = 0;
            $hasilt3 = 0;
            $hasilt4 = 0;
            $hasilpsw1 = 0;
            $hasilpsw2 = 0;
            $hasilpsw3 = 0;
            $hasilpsw4 = 0;
            $hasilAlpha = 0;
            $hasilIzin = 0;
            $hasilSakit = 0;
            $hasilDinas = 0;
            $hasilCuti = 0;
            $total = 0;
        }
        return $dataHasil;
    }
    function getJumlahPersenPswTlApi($jenis = null, $jumlah = null, $pengaturan = null)
    {
        $setTukin = $this->session->userdata('tukin');
        $hasil = 0;
        switch ($jenis) {
            case 'TL1':
                $hasil = $setTukin['TL1']['pengurangan'] * $jumlah;
                break;
            case 'TL2':
                $hasil = $setTukin['TL2']['pengurangan'] * $jumlah;
                break;
            case 'TL3':
                $hasil = $setTukin['TL3']['pengurangan'] * $jumlah;
                break;
            case 'TL4':
                $hasil = $setTukin['TL4']['pengurangan'] * $jumlah;
                break;
            case 'PSW1':
                $hasil = $setTukin['PSW1']['pengurangan'] * $jumlah;
                break;
            case 'PSW2':
                $hasil = $setTukin['PSW2']['pengurangan'] * $jumlah;
                break;
            case 'PSW3':
                $hasil = $setTukin['PSW3']['pengurangan'] * $jumlah;
                break;
            case 'PSW4':
                $hasil = $setTukin['PSW4']['pengurangan'] * $jumlah;
                break;
            case 'A':
                $hasil = $setTukin['Alpha']['pengurangan'] * $jumlah;
                break;
            case 'I':
                $hasil = $setTukin['Izin']['pengurangan'] * $jumlah;
                break;
            case 'S':
                $hasil = $setTukin['Sakit']['pengurangan'] * $jumlah;
                break;
            case 'D':
                $hasil = $setTukin['Dinas']['pengurangan'] * $jumlah;
                break;
            case 'C':
                $hasil = $setTukin['Cuti']['pengurangan'] * $jumlah;
                break;
            default:
                $hasil = '0';
        }
        return $hasil;
    }
	function getLogSatpam($tgl_awal=null,$tgl_akhir=null,$pegawai_id=null,$nip=null,$jenis_presensi_id=null,$departemen_id=null,$sub_departemen_id=null,$tipe_pegawai_id=null,$jenis_pegawai_id=null,$status_pegawai_id=null){
        if(empty($tgl_awal) or empty($tgl_akhir)){
            $tgl_awal = date("Y-m-01");;
            $tgl_akhir = date("Y-m-t", strtotime($tgl_awal));
        }
        if($pegawai_id=='kosong'){
            $wherePegawaiId1="0=0";
            $wherePegawaiId2="0=0";
        }else{
            $wherePegawaiId1="pegawai_id in ($pegawai_id)";
            $wherePegawaiId2="id in ($pegawai_id)";
        }
        ($jenis_presensi_id=='kosong')?$whereJenisPresensi="0=0":$whereJenisPresensi="jenis_presensi_id in ($jenis_presensi_id)";
        ($departemen_id=='kosong')?$whereDepartemen="0=0":$whereDepartemen="departemen_id in ($departemen_id)";
        ($sub_departemen_id=='kosong')?$whereSubDepartemen="0=0":$whereSubDepartemen="sub_departemen_id in ($sub_departemen_id)";
        ($tipe_pegawai_id=='kosong')?$whereTipePegawai="0=0":$whereTipePegawai="tipe_pegawai_id in ($tipe_pegawai_id)";
        ($nip=='kosong')?$whereNip="0=0":$whereNip="nip in ($nip)";
        ($status_pegawai_id=='kosong')?$whereStatusPegawai="0=0":$whereStatusPegawai="status  = '$status_pegawai_id'";
        ($jenis_pegawai_id=='kosong')?$whereJenisPegawai="0=0":$whereJenisPegawai="jenis_pegawai_id in ($jenis_pegawai_id)";
        $sql = "
          SELECT
            a.tanggal,
            a.pegawai_id,
            a.shift_id,
            a.masuk,
            a.keluar,
            a.jenis_presensi_id,
            a.keterangan,
            b.nip,
            b.nama,
            b.departemen_id,
            b.sub_departemen_id,
            b.tipe_pegawai_id,
            b.jenis_pegawai_id,
            b.pin,
            b.status,
            c.jenis,
			c.nama as nama_shift,
            d.inisial,
			d.nama as status_presensi,
            e.nama AS nama_departemen,
            (CASE WHEN (DAYOFWEEK(a.tanggal) = 1 ||
                DAYOFWEEK(a.tanggal) = 7) THEN 1 END) AS is_libur_sabtu_minggu,
            (CASE WHEN (c.jenis = 'rutin') ||
                (c.jenis = 'shift') THEN (CASE WHEN (DAYOFWEEK(a.tanggal)) = 2 THEN (CASE WHEN a.masuk > c.senin_jam_masuk THEN TIMEDIFF(a.masuk, c.senin_jam_masuk) END) WHEN (DAYOFWEEK(a.tanggal)) = 3 THEN (CASE WHEN a.masuk > c.selasa_jam_masuk THEN TIMEDIFF(a.masuk, c.selasa_jam_masuk) END) WHEN (DAYOFWEEK(a.tanggal)) = 4 THEN (CASE WHEN a.masuk > c.rabu_jam_masuk THEN TIMEDIFF(a.masuk, c.rabu_jam_masuk) END) WHEN (DAYOFWEEK(a.tanggal)) = 5 THEN (CASE WHEN a.masuk > c.kamis_jam_masuk THEN TIMEDIFF(a.masuk, c.kamis_jam_masuk) END) WHEN (DAYOFWEEK(a.tanggal)) = 6 THEN (CASE WHEN a.masuk > c.jumat_jam_masuk THEN TIMEDIFF(a.masuk, c.jumat_jam_masuk) END) WHEN (DAYOFWEEK(a.tanggal)) = 7 THEN (CASE WHEN c.sabtu_wajib_masuk = 1 THEN CASE WHEN a.masuk > c.sabtu_jam_masuk THEN TIMEDIFF(a.masuk, c.sabtu_jam_masuk) END END) WHEN (DAYOFWEEK(a.tanggal)) = 1 THEN (CASE WHEN c.ahad_wajib_masuk = 1 THEN CASE WHEN a.masuk > c.sabtu_jam_masuk THEN TIMEDIFF(a.masuk, c.ahad_jam_masuk) END END) END) ELSE NULL END) AS terlambat,
            (CASE WHEN (c.jenis = 'rutin') ||
                (c.jenis = 'shift') THEN (CASE WHEN (DAYOFWEEK(a.tanggal)) = 2 THEN (CASE WHEN a.masuk > c.senin_jam_masuk THEN FORMAT(TIME_TO_SEC(TIMEDIFF(a.masuk, c.senin_jam_masuk)) / 60, 0) END) WHEN (DAYOFWEEK(a.tanggal)) = 3 THEN (CASE WHEN a.masuk > c.selasa_jam_masuk THEN FORMAT(TIME_TO_SEC(TIMEDIFF(a.masuk, c.selasa_jam_masuk)) / 60, 0) END) WHEN (DAYOFWEEK(a.tanggal)) = 4 THEN (CASE WHEN a.masuk > c.rabu_jam_masuk THEN FORMAT(TIME_TO_SEC(TIMEDIFF(a.masuk, c.rabu_jam_masuk)) / 60, 0) END) WHEN (DAYOFWEEK(a.tanggal)) = 5 THEN (CASE WHEN a.masuk > c.kamis_jam_masuk THEN FORMAT(TIME_TO_SEC(TIMEDIFF(a.masuk, c.kamis_jam_masuk)) / 60, 0) END) WHEN (DAYOFWEEK(a.tanggal)) = 6 THEN (CASE WHEN a.masuk > c.jumat_jam_masuk THEN FORMAT(TIME_TO_SEC(TIMEDIFF(a.masuk, c.jumat_jam_masuk)) / 60, 0) END) WHEN (DAYOFWEEK(a.tanggal)) = 7 THEN (CASE WHEN c.sabtu_wajib_masuk = 1 THEN CASE WHEN a.masuk > c.sabtu_jam_masuk THEN FORMAT(TIME_TO_SEC(TIMEDIFF(a.masuk, c.sabtu_jam_masuk)) / 60, 0) END END) WHEN (DAYOFWEEK(a.tanggal)) = 1 THEN (CASE WHEN c.ahad_wajib_masuk = 1 THEN CASE WHEN a.masuk > c.sabtu_jam_masuk THEN FORMAT(TIME_TO_SEC(TIMEDIFF(a.masuk, c.ahad_jam_masuk)) / 60, 0) END END) END) ELSE NULL END) AS menit_terlambat,
            (CASE WHEN (c.jenis = 'rutin') ||
                (c.jenis = 'shift') THEN (CASE WHEN (DAYOFWEEK(a.tanggal)) = 2 THEN (CASE WHEN a.keluar < c.senin_jam_keluar THEN TIMEDIFF(c.senin_jam_keluar, a.keluar) END) WHEN (DAYOFWEEK(a.tanggal)) = 3 THEN (CASE WHEN a.keluar < c.selasa_jam_keluar THEN TIMEDIFF(c.selasa_jam_keluar, a.keluar) END) WHEN (DAYOFWEEK(a.tanggal)) = 4 THEN (CASE WHEN a.keluar < c.rabu_jam_keluar THEN TIMEDIFF(c.rabu_jam_keluar, a.keluar) END) WHEN (DAYOFWEEK(a.tanggal)) = 5 THEN (CASE WHEN a.keluar < c.kamis_jam_keluar THEN TIMEDIFF(c.kamis_jam_keluar, a.keluar) END) WHEN (DAYOFWEEK(a.tanggal)) = 6 THEN (CASE WHEN a.keluar < c.jumat_jam_keluar THEN TIMEDIFF(c.jumat_jam_keluar, a.keluar) END) WHEN (DAYOFWEEK(a.tanggal)) = 7 THEN (CASE WHEN c.sabtu_wajib_masuk = 1 THEN CASE WHEN a.keluar < c.sabtu_jam_keluar THEN TIMEDIFF(c.sabtu_jam_keluar, a.keluar) END END) WHEN (DAYOFWEEK(a.tanggal)) = 1 THEN (CASE WHEN c.ahad_wajib_masuk = 1 THEN CASE WHEN a.keluar < c.sabtu_jam_keluar THEN TIMEDIFF(c.ahad_jam_keluar, a.keluar) END END) END) ELSE NULL END) AS pulang_cepat,
             (CASE WHEN (c.jenis = 'rutin') ||
                (c.jenis = 'shift') THEN (CASE WHEN (DAYOFWEEK(a.tanggal)) = 2 THEN (CASE WHEN a.keluar < c.senin_jam_keluar THEN FORMAT(TIME_TO_SEC(TIMEDIFF(c.senin_jam_keluar, a.keluar)) / 60, 0) END) WHEN (DAYOFWEEK(a.tanggal)) = 3 THEN (CASE WHEN a.keluar < c.selasa_jam_keluar THEN FORMAT(TIME_TO_SEC(TIMEDIFF(c.selasa_jam_keluar, a.keluar)) / 60, 0) END) WHEN (DAYOFWEEK(a.tanggal)) = 4 THEN (CASE WHEN a.keluar < c.rabu_jam_keluar THEN FORMAT(TIME_TO_SEC(TIMEDIFF(c.rabu_jam_keluar, a.keluar)) / 60, 0) END) WHEN (DAYOFWEEK(a.tanggal)) = 5 THEN (CASE WHEN a.keluar < c.kamis_jam_keluar THEN FORMAT(TIME_TO_SEC(TIMEDIFF(c.kamis_jam_keluar, a.keluar)) / 60, 0) END) WHEN (DAYOFWEEK(a.tanggal)) = 6 THEN (CASE WHEN a.keluar < c.jumat_jam_keluar THEN FORMAT(TIME_TO_SEC(TIMEDIFF(c.jumat_jam_keluar, a.keluar)) / 60, 0) END) WHEN (DAYOFWEEK(a.tanggal)) = 7 THEN (CASE WHEN c.sabtu_wajib_masuk = 1 THEN CASE WHEN a.keluar < c.sabtu_jam_keluar THEN FORMAT(TIME_TO_SEC(TIMEDIFF(c.sabtu_jam_keluar, a.keluar)) / 60, 0) END END) WHEN (DAYOFWEEK(a.tanggal)) = 1 THEN (CASE WHEN c.ahad_wajib_masuk = 1 THEN CASE WHEN a.keluar < c.sabtu_jam_keluar THEN FORMAT(TIME_TO_SEC(TIMEDIFF(c.ahad_jam_keluar, a.keluar)) / 60, 0) END END) END) ELSE NULL END) AS menit_pulang_cepat,
            (CASE WHEN (c.jenis = 'rutin') ||
                (c.jenis = 'shift') THEN (CASE WHEN (DAYOFWEEK(a.tanggal)) = 2 THEN (CASE WHEN a.keluar > c.senin_jam_keluar THEN TIMEDIFF(a.keluar, c.senin_jam_keluar) END) WHEN (DAYOFWEEK(a.tanggal)) = 3 THEN (CASE WHEN a.keluar > c.selasa_jam_keluar THEN TIMEDIFF(a.keluar, c.selasa_jam_keluar) END) WHEN (DAYOFWEEK(a.tanggal)) = 4 THEN (CASE WHEN a.keluar > c.rabu_jam_keluar THEN TIMEDIFF(a.keluar, c.rabu_jam_keluar) END) WHEN (DAYOFWEEK(a.tanggal)) = 5 THEN (CASE WHEN a.keluar > c.kamis_jam_keluar THEN TIMEDIFF(a.keluar, c.kamis_jam_keluar) END) WHEN (DAYOFWEEK(a.tanggal)) = 6 THEN (CASE WHEN a.keluar > c.jumat_jam_keluar THEN TIMEDIFF(a.keluar, c.jumat_jam_keluar) END) WHEN (DAYOFWEEK(a.tanggal)) = 7 THEN (CASE WHEN c.sabtu_wajib_masuk = 1 THEN CASE WHEN a.keluar < c.sabtu_jam_keluar THEN TIMEDIFF(a.keluar, c.sabtu_jam_keluar) END END) WHEN (DAYOFWEEK(a.tanggal)) = 1 THEN (CASE WHEN c.ahad_wajib_masuk = 1 THEN CASE WHEN a.keluar < c.sabtu_jam_keluar THEN TIMEDIFF(a.keluar, c.ahad_jam_keluar) END END) END) ELSE NULL END) AS lembur,
            (CASE WHEN (a.keluar != '' AND
                      a.masuk != '' AND a.jenis_presensi_id = 1) THEN TIMEDIFF(a.keluar, a.masuk) ELSE NULL END) AS durasi
          FROM (SELECT
              *
            FROM sipot_log_presensi
            WHERE tanggal BETWEEN '$tgl_awal' and '$tgl_akhir'
            AND $wherePegawaiId1
            AND $whereJenisPresensi) AS a
            INNER JOIN (SELECT
                 id,nip,nama,departemen_id,sub_departemen_id,tipe_pegawai_id,jenis_pegawai_id,pangkat,gol,pin,status
              FROM sipot_pegawai
              WHERE $wherePegawaiId2
              AND $whereDepartemen
              AND $whereSubDepartemen
              AND $whereTipePegawai
              AND $whereNip
              AND $whereStatusPegawai
              AND $whereJenisPegawai) AS b
              ON a.pegawai_id = b.id
            INNER JOIN (SELECT
                *
              FROM sipot_shift) AS c
              ON a.shift_id = c.id
            INNER JOIN sipot_jenis_presensi d
              ON a.jenis_presensi_id = d.id
          INNER JOIN sipot_departemen e ON e.id = b.departemen_id
          ORDER BY a.tanggal,a.masuk desc";

          return $this->db->query($sql)->result();
    }
    function getLog($tgl_awal=null,$tgl_akhir=null,$pegawai_id=null,$nip=null,$jenis_presensi_id=null,$departemen_id=null,$sub_departemen_id=null,$tipe_pegawai_id=null,$jenis_pegawai_id=null,$status_pegawai_id=null){
        if(empty($tgl_awal) or empty($tgl_akhir)){
            $tgl_awal = date("Y-m-01");;
            $tgl_akhir = date("Y-m-t", strtotime($tgl_awal));
        }
        if($pegawai_id=='kosong'){
            $wherePegawaiId1="0=0";
            $wherePegawaiId2="0=0";
        }else{
            $wherePegawaiId1="pegawai_id in ($pegawai_id)";
            $wherePegawaiId2="id in ($pegawai_id)";
        }
        ($jenis_presensi_id=='kosong')?$whereJenisPresensi="0=0":$whereJenisPresensi="jenis_presensi_id in ($jenis_presensi_id)";
        ($departemen_id=='kosong')?$whereDepartemen="0=0":$whereDepartemen="departemen_id in ($departemen_id)";
        ($sub_departemen_id=='kosong')?$whereSubDepartemen="0=0":$whereSubDepartemen="sub_departemen_id in ($sub_departemen_id)";
        ($tipe_pegawai_id=='kosong')?$whereTipePegawai="0=0":$whereTipePegawai="tipe_pegawai_id in ($tipe_pegawai_id)";
        ($nip=='kosong')?$whereNip="0=0":$whereNip="nip in ($nip)";
        ($status_pegawai_id=='kosong')?$whereStatusPegawai="0=0":$whereStatusPegawai="status  = '$status_pegawai_id'";
        ($jenis_pegawai_id=='kosong')?$whereJenisPegawai="0=0":$whereJenisPegawai="jenis_pegawai_id in ($jenis_pegawai_id)";
        $sql = "
          SELECT
            a.tanggal,
            a.pegawai_id,
            a.shift_id,
            a.masuk,
            a.keluar,
            a.jenis_presensi_id,
            a.keterangan,
            b.nip,
            b.nama,
            b.departemen_id,
            b.sub_departemen_id,
            b.tipe_pegawai_id,
            b.jenis_pegawai_id,
            b.pin,
            b.status,
            c.jenis,
			c.nama as nama_shift,
            d.inisial,
			d.nama as status_presensi,
            e.nama AS nama_departemen,
            (CASE WHEN (DAYOFWEEK(a.tanggal) = 1 ||
                DAYOFWEEK(a.tanggal) = 7) THEN 1 END) AS is_libur_sabtu_minggu,
            (CASE WHEN (c.jenis = 'rutin') ||
                (c.jenis = 'shift') THEN (CASE WHEN (DAYOFWEEK(a.tanggal)) = 2 THEN (CASE WHEN a.masuk > c.senin_jam_masuk THEN TIMEDIFF(a.masuk, c.senin_jam_masuk) END) WHEN (DAYOFWEEK(a.tanggal)) = 3 THEN (CASE WHEN a.masuk > c.selasa_jam_masuk THEN TIMEDIFF(a.masuk, c.selasa_jam_masuk) END) WHEN (DAYOFWEEK(a.tanggal)) = 4 THEN (CASE WHEN a.masuk > c.rabu_jam_masuk THEN TIMEDIFF(a.masuk, c.rabu_jam_masuk) END) WHEN (DAYOFWEEK(a.tanggal)) = 5 THEN (CASE WHEN a.masuk > c.kamis_jam_masuk THEN TIMEDIFF(a.masuk, c.kamis_jam_masuk) END) WHEN (DAYOFWEEK(a.tanggal)) = 6 THEN (CASE WHEN a.masuk > c.jumat_jam_masuk THEN TIMEDIFF(a.masuk, c.jumat_jam_masuk) END) WHEN (DAYOFWEEK(a.tanggal)) = 7 THEN (CASE WHEN c.sabtu_wajib_masuk = 1 THEN CASE WHEN a.masuk > c.sabtu_jam_masuk THEN TIMEDIFF(a.masuk, c.sabtu_jam_masuk) END END) WHEN (DAYOFWEEK(a.tanggal)) = 1 THEN (CASE WHEN c.ahad_wajib_masuk = 1 THEN CASE WHEN a.masuk > c.sabtu_jam_masuk THEN TIMEDIFF(a.masuk, c.ahad_jam_masuk) END END) END) ELSE NULL END) AS terlambat,
            (CASE WHEN (c.jenis = 'rutin') ||
                (c.jenis = 'shift') THEN (CASE WHEN (DAYOFWEEK(a.tanggal)) = 2 THEN (CASE WHEN a.masuk > c.senin_jam_masuk THEN FORMAT(TIME_TO_SEC(TIMEDIFF(a.masuk, c.senin_jam_masuk)) / 60, 0) END) WHEN (DAYOFWEEK(a.tanggal)) = 3 THEN (CASE WHEN a.masuk > c.selasa_jam_masuk THEN FORMAT(TIME_TO_SEC(TIMEDIFF(a.masuk, c.selasa_jam_masuk)) / 60, 0) END) WHEN (DAYOFWEEK(a.tanggal)) = 4 THEN (CASE WHEN a.masuk > c.rabu_jam_masuk THEN FORMAT(TIME_TO_SEC(TIMEDIFF(a.masuk, c.rabu_jam_masuk)) / 60, 0) END) WHEN (DAYOFWEEK(a.tanggal)) = 5 THEN (CASE WHEN a.masuk > c.kamis_jam_masuk THEN FORMAT(TIME_TO_SEC(TIMEDIFF(a.masuk, c.kamis_jam_masuk)) / 60, 0) END) WHEN (DAYOFWEEK(a.tanggal)) = 6 THEN (CASE WHEN a.masuk > c.jumat_jam_masuk THEN FORMAT(TIME_TO_SEC(TIMEDIFF(a.masuk, c.jumat_jam_masuk)) / 60, 0) END) WHEN (DAYOFWEEK(a.tanggal)) = 7 THEN (CASE WHEN c.sabtu_wajib_masuk = 1 THEN CASE WHEN a.masuk > c.sabtu_jam_masuk THEN FORMAT(TIME_TO_SEC(TIMEDIFF(a.masuk, c.sabtu_jam_masuk)) / 60, 0) END END) WHEN (DAYOFWEEK(a.tanggal)) = 1 THEN (CASE WHEN c.ahad_wajib_masuk = 1 THEN CASE WHEN a.masuk > c.sabtu_jam_masuk THEN FORMAT(TIME_TO_SEC(TIMEDIFF(a.masuk, c.ahad_jam_masuk)) / 60, 0) END END) END) ELSE NULL END) AS menit_terlambat,
            (CASE WHEN (c.jenis = 'rutin') ||
                (c.jenis = 'shift') THEN (CASE WHEN (DAYOFWEEK(a.tanggal)) = 2 THEN (CASE WHEN a.keluar < c.senin_jam_keluar THEN TIMEDIFF(c.senin_jam_keluar, a.keluar) END) WHEN (DAYOFWEEK(a.tanggal)) = 3 THEN (CASE WHEN a.keluar < c.selasa_jam_keluar THEN TIMEDIFF(c.selasa_jam_keluar, a.keluar) END) WHEN (DAYOFWEEK(a.tanggal)) = 4 THEN (CASE WHEN a.keluar < c.rabu_jam_keluar THEN TIMEDIFF(c.rabu_jam_keluar, a.keluar) END) WHEN (DAYOFWEEK(a.tanggal)) = 5 THEN (CASE WHEN a.keluar < c.kamis_jam_keluar THEN TIMEDIFF(c.kamis_jam_keluar, a.keluar) END) WHEN (DAYOFWEEK(a.tanggal)) = 6 THEN (CASE WHEN a.keluar < c.jumat_jam_keluar THEN TIMEDIFF(c.jumat_jam_keluar, a.keluar) END) WHEN (DAYOFWEEK(a.tanggal)) = 7 THEN (CASE WHEN c.sabtu_wajib_masuk = 1 THEN CASE WHEN a.keluar < c.sabtu_jam_keluar THEN TIMEDIFF(c.sabtu_jam_keluar, a.keluar) END END) WHEN (DAYOFWEEK(a.tanggal)) = 1 THEN (CASE WHEN c.ahad_wajib_masuk = 1 THEN CASE WHEN a.keluar < c.sabtu_jam_keluar THEN TIMEDIFF(c.ahad_jam_keluar, a.keluar) END END) END) ELSE NULL END) AS pulang_cepat,
             (CASE WHEN (c.jenis = 'rutin') ||
                (c.jenis = 'shift') THEN (CASE WHEN (DAYOFWEEK(a.tanggal)) = 2 THEN (CASE WHEN a.keluar < c.senin_jam_keluar THEN FORMAT(TIME_TO_SEC(TIMEDIFF(c.senin_jam_keluar, a.keluar)) / 60, 0) END) WHEN (DAYOFWEEK(a.tanggal)) = 3 THEN (CASE WHEN a.keluar < c.selasa_jam_keluar THEN FORMAT(TIME_TO_SEC(TIMEDIFF(c.selasa_jam_keluar, a.keluar)) / 60, 0) END) WHEN (DAYOFWEEK(a.tanggal)) = 4 THEN (CASE WHEN a.keluar < c.rabu_jam_keluar THEN FORMAT(TIME_TO_SEC(TIMEDIFF(c.rabu_jam_keluar, a.keluar)) / 60, 0) END) WHEN (DAYOFWEEK(a.tanggal)) = 5 THEN (CASE WHEN a.keluar < c.kamis_jam_keluar THEN FORMAT(TIME_TO_SEC(TIMEDIFF(c.kamis_jam_keluar, a.keluar)) / 60, 0) END) WHEN (DAYOFWEEK(a.tanggal)) = 6 THEN (CASE WHEN a.keluar < c.jumat_jam_keluar THEN FORMAT(TIME_TO_SEC(TIMEDIFF(c.jumat_jam_keluar, a.keluar)) / 60, 0) END) WHEN (DAYOFWEEK(a.tanggal)) = 7 THEN (CASE WHEN c.sabtu_wajib_masuk = 1 THEN CASE WHEN a.keluar < c.sabtu_jam_keluar THEN FORMAT(TIME_TO_SEC(TIMEDIFF(c.sabtu_jam_keluar, a.keluar)) / 60, 0) END END) WHEN (DAYOFWEEK(a.tanggal)) = 1 THEN (CASE WHEN c.ahad_wajib_masuk = 1 THEN CASE WHEN a.keluar < c.sabtu_jam_keluar THEN FORMAT(TIME_TO_SEC(TIMEDIFF(c.ahad_jam_keluar, a.keluar)) / 60, 0) END END) END) ELSE NULL END) AS menit_pulang_cepat,
            (CASE WHEN (c.jenis = 'rutin') ||
                (c.jenis = 'shift') THEN (CASE WHEN (DAYOFWEEK(a.tanggal)) = 2 THEN (CASE WHEN a.keluar > c.senin_jam_keluar THEN TIMEDIFF(a.keluar, c.senin_jam_keluar) END) WHEN (DAYOFWEEK(a.tanggal)) = 3 THEN (CASE WHEN a.keluar > c.selasa_jam_keluar THEN TIMEDIFF(a.keluar, c.selasa_jam_keluar) END) WHEN (DAYOFWEEK(a.tanggal)) = 4 THEN (CASE WHEN a.keluar > c.rabu_jam_keluar THEN TIMEDIFF(a.keluar, c.rabu_jam_keluar) END) WHEN (DAYOFWEEK(a.tanggal)) = 5 THEN (CASE WHEN a.keluar > c.kamis_jam_keluar THEN TIMEDIFF(a.keluar, c.kamis_jam_keluar) END) WHEN (DAYOFWEEK(a.tanggal)) = 6 THEN (CASE WHEN a.keluar > c.jumat_jam_keluar THEN TIMEDIFF(a.keluar, c.jumat_jam_keluar) END) WHEN (DAYOFWEEK(a.tanggal)) = 7 THEN (CASE WHEN c.sabtu_wajib_masuk = 1 THEN CASE WHEN a.keluar < c.sabtu_jam_keluar THEN TIMEDIFF(a.keluar, c.sabtu_jam_keluar) END END) WHEN (DAYOFWEEK(a.tanggal)) = 1 THEN (CASE WHEN c.ahad_wajib_masuk = 1 THEN CASE WHEN a.keluar < c.sabtu_jam_keluar THEN TIMEDIFF(a.keluar, c.ahad_jam_keluar) END END) END) ELSE NULL END) AS lembur,
            (CASE WHEN (a.keluar != '' AND
                      a.masuk != '' AND a.jenis_presensi_id = 1) THEN TIMEDIFF(a.keluar, a.masuk) ELSE NULL END) AS durasi
          FROM (SELECT
              *
            FROM sipot_log_presensi
            WHERE tanggal BETWEEN '$tgl_awal' and '$tgl_akhir'
            AND $wherePegawaiId1
            AND $whereJenisPresensi and tanggal not in (select tanggal from sipot_hari_libur)) AS a
            INNER JOIN (SELECT
                 id,nip,nama,departemen_id,sub_departemen_id,tipe_pegawai_id,jenis_pegawai_id,pangkat,gol,pin,status
              FROM sipot_pegawai
              WHERE $wherePegawaiId2
              AND $whereDepartemen
              AND $whereSubDepartemen
              AND $whereTipePegawai
              AND $whereNip
              AND $whereStatusPegawai
              AND $whereJenisPegawai) AS b
              ON a.pegawai_id = b.id
            INNER JOIN (SELECT
                *
              FROM sipot_shift) AS c
              ON a.shift_id = c.id
            INNER JOIN sipot_jenis_presensi d
              ON a.jenis_presensi_id = d.id
          INNER JOIN sipot_departemen e ON e.id = b.departemen_id
          ORDER BY a.tanggal,a.masuk desc";

          return $this->db->query($sql)->result();
    }
    function getLaporanKehadiranBlu()
    {
        $postData = $this->getPostData();
        // $postFix = array_filter($postData);
        // $this->general->testPre($postData);die();
        (empty($postData['pegawai_id'])) ? $wherePegawai = 'kosong' : $wherePegawai = $postData['pegawai_id'];
        (empty($postData['departemen_id'])) ? $whereDepartemen = 'kosong' : $whereDepartemen = $postData['departemen_id'];
        (empty($postData['sub_departemen_id'])) ? $whereSubDepartemen = 'kosong' : $whereSubDepartemen = $postData['sub_departemen_id'];
        (empty($postData['tipe_pegawai_id'])) ? $whereTipePegawai = 'kosong' : $whereTipePegawai = $postData['tipe_pegawai_id'];
        (empty($postData['jenis_pegawai_id'])) ? $whereJenisPegawai = 'kosong' : $whereJenisPegawai = $postData['jenis_pegawai_id'];
        (empty($postData['status_pegawai_id'])) ? $whereStatusPegawai = 'kosong' : $whereStatusPegawai = $postData['status_pegawai_id'];
        $tgl_awal = $postData['tanggal']['tgl_mulai'];
        $tgl_akhir = $postData['tanggal']['tgl_selesai'];
        $laporan = $this->getLog($tgl_awal,$tgl_akhir,$wherePegawai,'kosong','kosong',$whereDepartemen,$whereSubDepartemen,$whereTipePegawai,$whereJenisPegawai,$whereStatusPegawai);
        $dataLaporan = array();
        foreach ($laporan as $lp) {
            $dataLaporan[$lp->pegawai_id][$lp->tanggal]['inisial'] = $lp->inisial;
            $dataLaporan[$lp->pegawai_id][$lp->tanggal]['menit_tl'] = $lp->menit_terlambat;
            $dataLaporan[$lp->pegawai_id][$lp->tanggal]['menit_psw'] = $lp->menit_pulang_cepat;
            $dataLaporan[$lp->pegawai_id][$lp->tanggal]['masuk'] = $lp->masuk;
            $dataLaporan[$lp->pegawai_id][$lp->tanggal]['keluar'] = $lp->keluar;
        }
        return $dataLaporan;
    }
	function prosesKehadiranSatpam()
    {
		ini_set('max_execution_time', 0);
        $postData = $this->getPostData();
        $postFix = array_filter($postData);
        $generateTanggal = $this->generateTanggal($postData['tanggal']);
        mysqli_next_result($this->db->conn_id);
        $dataLaporan = $this->getLaporanKehadiranBlu();
		$getHariLibur=$this->getHariLibur($postData['tanggal']['tgl_mulai'],$postData['tanggal']['tgl_selesai']);
        // mysqli_next_result($this->db->conn_id);
        $data = array('hariLibur'=>$getHariLibur,'dataLaporan' => $dataLaporan, 'postFix' => $postFix, 'generateTanggal' => $generateTanggal, 'dataPegawai' => $this->getPegawaiBaseOnPost($postFix));
        return array('success' => true, 'msg' => 'berhasil', 'result' => $this->load->view('laporan/kehadiran/kehadiran_satpam', $data, true));
    }
    function prosesKehadiranBlu()
    {
		ini_set('max_execution_time', 0);
        $postData = $this->getPostData();
        $postFix = array_filter($postData);
        $generateTanggal = $this->generateTanggal($postData['tanggal']);
        mysqli_next_result($this->db->conn_id);
        $dataLaporan = $this->getLaporanKehadiranBlu();
		$getHariLibur=$this->getHariLibur($postData['tanggal']['tgl_mulai'],$postData['tanggal']['tgl_selesai']);
        // mysqli_next_result($this->db->conn_id);
        $data = array('hariLibur'=>$getHariLibur,'dataLaporan' => $dataLaporan, 'postFix' => $postFix, 'generateTanggal' => $generateTanggal, 'dataPegawai' => $this->getPegawaiBaseOnPost($postFix));
        return array('success' => true, 'msg' => 'berhasil', 'result' => $this->load->view('laporan/kehadiran/kehadiran_blu', $data, true));
    }

    function durasiKehadiran()
    {
        $content = $this->load->view('laporan/kehadiran/header', array('urlProses' => 'admin/prosesdurasiKehadiran','namaFile'=>'Durasi Kehadiran'), true);
        $temp = $this->load->view("pluggins/panel_bootstrap", array('headerPanel' => 'Laporan Durasi Kehadiran', 'contentPanel' => $content), true);
        $output = array('laporanActive' => 'active', 'output' => $temp);
        return $output;
    }
    function prosesdurasiKehadiran()
    {
        $postData = $this->getPostData();
        $postFix = array_filter($postData);
        $generateTanggal = $this->generateTanggal($postData['tanggal']);
        mysqli_next_result($this->db->conn_id);
        $dataLaporan = $this->getLaporanKehadiranDurasi();
		$getHariLibur=$this->getHariLibur($postData['tanggal']['tgl_mulai'],$postData['tanggal']['tgl_selesai']);
        // mysqli_next_result($this->db->conn_id);
        $data = array('hariLibur'=>$getHariLibur,'dataLaporan' => $dataLaporan, 'postFix' => $postFix, 'generateTanggal' => $generateTanggal, 'dataPegawai' => $this->getPegawaiBaseOnPost($postFix));
        return array('success' => true, 'msg' => 'berhasil', 'result' => $this->load->view('laporan/kehadiran/kehadiran_durasi', $data, true));
    }

    function getLaporanKehadiranDurasi()
    {
        $postData = $this->getPostData();
        (empty($postData['pegawai_id'])) ? $wherePegawai = 'kosong' : $wherePegawai = $postData['pegawai_id'];
        (empty($postData['departemen_id'])) ? $whereDepartemen = 'kosong' : $whereDepartemen = $postData['departemen_id'];
        (empty($postData['sub_departemen'])) ? $whereSubDepartemen = 'kosong' : $whereSubDepartemen = $postData['sub_departemen'];
        (empty($postData['tipe_pegawai_id'])) ? $whereTipePegawai = 'kosong' : $whereTipePegawai = $postData['tipe_pegawai_id'];
        (empty($postData['jenis_pegawai_id'])) ? $whereJenisPegawai = 'kosong' : $whereJenisPegawai = $postData['jenis_pegawai_id'];
        (empty($postData['status_pegawai_id'])) ? $whereStatusPegawai = 'kosong' : $whereStatusPegawai = $postData['status_pegawai_id'];
        $tgl_awal = $postData['tanggal']['tgl_mulai'];
        $tgl_akhir = $postData['tanggal']['tgl_selesai'];
        $laporan = $this->getLog($tgl_awal,$tgl_akhir,$wherePegawai,'kosong','1',$whereDepartemen,$whereSubDepartemen,$whereTipePegawai,$whereJenisPegawai,$whereStatusPegawai);
        $dataLaporan = array();
        foreach ($laporan as $lp) {
            $dataLaporan[$lp->pegawai_id][$lp->tanggal] = $lp->durasi;
        }
        return $dataLaporan;
    }
    function logHarian()
    {
        $content = $this->load->view('laporan/kehadiran/header', array('urlProses' => 'admin/prosesLogHarian','namaFile'=>'Log Harian'), true);
        $temp = $this->load->view("pluggins/panel_bootstrap", array('headerPanel' => 'Laporan Log Hrian', 'contentPanel' => $content), true);
        $output = array('laporanActive' => 'active', 'output' => $temp);
        return $output;
    }
    function prosesLogHarian()
    {
        $postData = $this->getPostData();
        $postFix = array_filter($postData);
        $generateTanggal = $this->generateTanggal($postData['tanggal']);
        mysqli_next_result($this->db->conn_id);
        $dataLaporan = $this->getLaporanLogHarian($postFix);
        // mysqli_next_result($this->db->conn_id);
        $data = array('dataLaporan' => $dataLaporan, 'postFix' => $postFix, 'generateTanggal' => $generateTanggal);
        return array('success' => true, 'msg' => 'berhasil', 'result' => $this->load->view('laporan/kehadiran/log_harian', $data, true));
    }
    function getLaporanLogHarian($postFix=null){
        if(isset($postFix['tanggal'])){
            $tgl_awal = $postFix['tanggal']['tgl_mulai'];
            $tgl_akhir = $postFix['tanggal']['tgl_selesai'];
        }else{
            $tgl_awal = date('Y-m-d');
            $tgl_akhir = date('Y-m-d');
        }
        $tgl_awal = trim($tgl_awal);
        $tgl_akhir = trim($tgl_akhir);
        if(isset($postFix['pegawai_id'])){
            $pegawaiId = $postFix['pegawai_id'];
            $wherePegawai1 = "pegawai_id in ($pegawaiId)";
            $wherePegawai2 = "id in ($pegawaiId)";
        }else{
            $wherePegawai1 = "0=0";
            $wherePegawai2 = "0=0";
        }
        if(isset($postFix['departemen_id'])){
            $departemenId = $postFix['departemen_id'];
            $whereDepartemen = "departemen_id in ($departemenId)";
        }else{
            $whereDepartemen = "0=0";
        }
        if(isset($postFix['sub_departemen_id'])){
            $subDepartemenId = $postFix['sub_departemen_id'];
            $whereSubDepartemen = "sub_departemen_id in ($subDepartemenId)";
        }else{
            $whereSubDepartemen = "0=0";
        }
        if(isset($postFix['tipe_pegawai_id'])){
            $tipe_pegawai_id = $postFix['tipe_pegawai_id'];
            $whereTipePegawai = "tipe_pegawai_id in ($tipe_pegawai_id)";
        }else{
            $whereTipePegawai = "0=0";
        }
        if(isset($postFix['jenis_pegawai_id'])){
            $jenis_pegawai_id = $postFix['jenis_pegawai_id'];
            $whereJenisPegawai = "jenis_pegawai_id in ($jenis_pegawai_id)";
        }else{
            $whereJenisPegawai = "0=0";
        }
        if(isset($postFix['status_pegawai_id'])){
            $statusPegawaiId = $postFix['status_pegawai_id'];
            $whereStatusPegawai="status = '$statusPegawaiId'";
        }else{
            $whereStatusPegawai="0=0";
        }
        $sql = "
      SELECT
        a.tanggal,
        a.pegawai_id,
        b.nama,
        a.shift_id,
        a.masuk,
        a.keluar,
		a.jenis_presensi_id,
		d.nama as nama_presensi,
        c.nama AS nama_shift,
        (CASE WHEN DAYOFWEEK(tanggal) = 1 THEN c.ahad_jam_masuk WHEN DAYOFWEEK(tanggal) = 2 THEN c.senin_jam_masuk WHEN DAYOFWEEK(tanggal) = 3 THEN c.selasa_jam_masuk WHEN DAYOFWEEK(tanggal) = 4 THEN c.rabu_jam_masuk WHEN DAYOFWEEK(tanggal) = 5 THEN c.kamis_jam_masuk WHEN DAYOFWEEK(tanggal) = 6 THEN c.jumat_jam_masuk WHEN DAYOFWEEK(tanggal) = 7 THEN c.sabtu_jam_masuk END) AS jam_masuk,
        (
        CASE WHEN DAYOFWEEK(tanggal) = 1 THEN c.ahad_jam_keluar WHEN DAYOFWEEK(tanggal) = 2 THEN c.senin_jam_keluar WHEN DAYOFWEEK(tanggal) = 3 THEN c.selasa_jam_keluar WHEN DAYOFWEEK(tanggal) = 4 THEN c.rabu_jam_keluar WHEN DAYOFWEEK(tanggal) = 5 THEN c.kamis_jam_keluar WHEN DAYOFWEEK(tanggal) = 6 THEN c.jumat_jam_keluar WHEN DAYOFWEEK(tanggal) = 7 THEN c.sabtu_jam_keluar END) AS jam_keluar
      FROM (SELECT
          *
        FROM sipot_log_presensi
        WHERE tanggal between '$tgl_awal' and '$tgl_akhir' and $wherePegawai1) AS a
        INNER JOIN (SELECT
            id,
            nama
          FROM sipot_pegawai where $wherePegawai2 and $whereStatusPegawai and $whereJenisPegawai and $whereTipePegawai and $whereSubDepartemen and $whereDepartemen) AS b
          ON a.pegawai_id = b.id
        INNER JOIN sipot_shift c
          ON a.shift_id = c.id 
		  inner join sipot_jenis_presensi d on a.jenis_presensi_id = d.id order by a.tanggal asc,a.masuk desc"
          ;
          return $this->db->query($sql)->result();
    }
    function rekap()
    {
        $content = $this->load->view('laporan/kehadiran/header', array('urlProses' => 'admin/prosesRekap','namaFile'=>'Rekap'), true);
        $temp = $this->load->view("pluggins/panel_bootstrap", array('headerPanel' => 'Laporan Rekap Presensi', 'contentPanel' => $content), true);
        $output = array('laporanActive' => 'active', 'output' => $temp);
        return $output;
    }
    function prosesRekap()
    {
        $postData = $this->getPostData();
        $postFix = array_filter($postData);
        $generateTanggal = $this->generateTanggal($postData['tanggal']);
        mysqli_next_result($this->db->conn_id);
        $dataLaporan = $this->getLaporanRekap();
		$getHariLibur=$this->getHariLibur($postData['tanggal']['tgl_mulai'],$postData['tanggal']['tgl_selesai']);
        // mysqli_next_result($this->db->conn_id);
        $data = array('hariLibur'=>$getHariLibur,'dataLaporan' => $dataLaporan, 'postFix' => $postFix, 'generateTanggal' => $generateTanggal, 'dataPegawai' => $this->getPegawaiBaseOnPost($postFix));
        return array('success' => true, 'msg' => 'berhasil', 'result' => $this->load->view('laporan/kehadiran/rekap', $data, true));
    }
    function getRekapApi()
    {
        $nip = $this->input->get('nip');
        $departemen_id = $this->input->get('departemen_id');
        $sub_departemen_id = $this->input->get('sub_departemen_id');
        $tipe_pegawai = $this->input->get('tipe_pegawai');
        $jenis_pegawai_id = $this->input->get('jenis_pegawai_id');
        $tgl_awal = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');
        (empty($nip)) ? $whereNip = 'kosong' : $whereNip = $nip;
        (empty($departemen_id)) ? $whereDepartemenId = 'kosong' : $whereDepartemenId = $departemen_id;
        (empty($sub_departemen_id)) ? $whereSubDepartemenId = 'kosong' : $whereSubDepartemenId = $sub_departemen_id;
        (empty($tipe_pegawai)) ? $whereTipePegawai = 'kosong' : $whereTipePegawai = $tipe_pegawai;
        (empty($jenis_pegawai_id)) ? $whereJenisPegawai = 'kosong' : $whereJenisPegawai = $jenis_pegawai_id;
        
        if (empty($tgl_awal) or empty($tgl_akhir)) {
            $tgl_awal = date("Y-m-01");;
            $tgl_akhir = date("Y-m-t", strtotime($tgl_awal));
        }
        $laporan = $this->getLog($tgl_awal,$tgl_akhir,'kosong',$whereNip,'kosong',$whereDepartemenId,$whereSubDepartemenId,$whereTipePegawai,$whereJenisPegawai,'Aktif');
        $dataLaporan = array();
        foreach ($laporan as $key => $val) {
            $dataLaporan[$val->pegawai_id][$val->tanggal]['masuk'] = $val->masuk;
            $dataLaporan[$val->pegawai_id][$val->tanggal]['keluar'] = $val->keluar;
            $dataLaporan[$val->pegawai_id][$val->tanggal]['terlambat'] = $val->terlambat;
            $dataLaporan[$val->pegawai_id][$val->tanggal]['pulang_cepat'] = $val->pulang_cepat;
            $dataLaporan[$val->pegawai_id][$val->tanggal]['lembur'] = $val->lembur;
            $dataLaporan[$val->pegawai_id][$val->tanggal]['jenis_presensi'] = $val->jenis_presensi_id;
        }
        return $dataLaporan;
    }

    function getLaporanRekap()
    {
        $postData = $this->getPostData();
        (empty($postData['pegawai_id'])) ? $wherePegawai = 'kosong' : $wherePegawai = $postData['pegawai_id'];
        (empty($postData['departemen_id'])) ? $whereDepartemen = 'kosong' : $whereDepartemen = $postData['departemen_id'];
        (empty($postData['sub_departemen'])) ? $whereSubDepartemen = 'kosong' : $whereSubDepartemen = $postData['sub_departemen'];
        (empty($postData['tipe_pegawai_id'])) ? $whereTipePegawai = 'kosong' : $whereTipePegawai = $postData['tipe_pegawai_id'];
        (empty($postData['jenis_pegawai_id'])) ? $whereJenisPegawai = 'kosong' : $whereJenisPegawai = $postData['jenis_pegawai_id'];
        (empty($postData['status_pegawai_id'])) ? $whereStatusPegawai = 'kosong' : $whereStatusPegawai = $postData['status_pegawai_id'];
        $tgl_awal = $postData['tanggal']['tgl_mulai'];
        $tgl_akhir = $postData['tanggal']['tgl_selesai'];
        $laporan = $this->getLog($tgl_awal,$tgl_akhir,$wherePegawai,'kosong','1',$whereDepartemen,$whereSubDepartemen,$whereTipePegawai,$whereJenisPegawai,$whereStatusPegawai);
        $dataLaporan = array();
        foreach ($laporan as $lp) {
            $dataLaporan[$lp->pegawai_id][$lp->tanggal]['masuk'] = $lp->masuk;
            $dataLaporan[$lp->pegawai_id][$lp->tanggal]['keluar'] = $lp->keluar;
            $dataLaporan[$lp->pegawai_id][$lp->tanggal]['terlambat'] = $lp->terlambat;
            $dataLaporan[$lp->pegawai_id][$lp->tanggal]['pulang_cepat'] = $lp->pulang_cepat;
            $dataLaporan[$lp->pegawai_id][$lp->tanggal]['lembur'] = $lp->lembur;
        }
        return $dataLaporan;
    }
    function presensiKhusus()
    {
        $content = $this->load->view('laporan/kehadiran/header', array('urlProses' => 'admin/prosesPresensiKhusus','namaFile'=>'Lap Presensi Khusus'), true);
        $temp = $this->load->view("pluggins/panel_bootstrap", array('headerPanel' => 'Laporan Presensi Khusus', 'contentPanel' => $content), true);
        $output = array('laporanActive' => 'active', 'output' => $temp);
        return $output;
    }
    function prosesPresensiKhusus()
    {
        $postData = $this->getPostData();
        $postFix = array_filter($postData);
        $generateTanggal = $this->generateTanggal($postData['tanggal']);
        mysqli_next_result($this->db->conn_id);
        $dataLaporan = $this->getLaporanPresensiKhusus();
		$getHariLibur=$this->getHariLibur($postData['tanggal']['tgl_mulai'],$postData['tanggal']['tgl_selesai']);
        // mysqli_next_result($this->db->conn_id);
        $data = array('hariLibur'=>$getHariLibur,'dataLaporan' => $dataLaporan, 'postFix' => $postFix, 'generateTanggal' => $generateTanggal, 'dataPegawai' => $this->getPegawaiBaseOnPost($postFix));
        return array('success' => true, 'msg' => 'berhasil', 'result' => $this->load->view('laporan/kehadiran/presensi_khusus', $data, true));
    }

    function getLogKhusus($tgl_awal=null,$tgl_akhir=null,$pegawai_id=null,$departemen_id=null,$sub_departemen_id=null,$tipe_pegawai_id=null,$jenis_pegawai_id=null,$status_pegawai_id=null){
        if(empty($tgl_awal) or $tgl_akhir){
            $tgl_awal = date("Y-m-01");;
            $tgl_akhir = date("Y-m-t", strtotime($tgl_awal));
        }
        if($pegawai_id=='kosong'){
            $wherePegawaiId1="0=0";
            $wherePegawaiId2="0=0";
        }else{
            $wherePegawaiId1="pegawai_id in ($pegawai_id)";
            $wherePegawaiId2="id in ($pegawai_id)";
        }
        
        ($departemen_id=='kosong')?$whereDepartemen="0=0":$whereDepartemen="departemen_id in ($departemen_id)";
        ($sub_departemen_id=='kosong')?$whereSubDepartemen="0=0":$whereSubDepartemen="sub_departemen_id in ($sub_departemen_id)";
        ($tipe_pegawai_id=='kosong')?$whereTipePegawai="0=0":$whereTipePegawai="tipe_pegawai_id in ($tipe_pegawai_id)";
        ($status_pegawai_id=='kosong')?$whereStatusPegawai="0=0":$whereStatusPegawai="status  = '$status_pegawai_id'";
        ($jenis_pegawai_id=='kosong')?$whereJenisPegawai="0=0":$whereJenisPegawai="jenis_pegawai_id in ($jenis_pegawai_id)";

    $sql="SELECT
        *
      FROM (SELECT
          tanggal,
          pegawai_id,
          shift_id,
          masuk,
          keluar,
          jenis_presensi_id
        FROM sipot_log_presensi
         WHERE tanggal BETWEEN '$tgl_awal' and '$tgl_akhir'
         and jenis_presensi_id = 1
          AND $wherePegawaiId1) AS a
         INNER JOIN (SELECT
              id,nip,nama,departemen_id,sub_departemen_id,tipe_pegawai_id,jenis_pegawai_id,pangkat,gol,pin
            FROM sipot_pegawai
            WHERE $wherePegawaiId2
            AND $whereDepartemen
              AND $whereSubDepartemen
              AND $whereTipePegawai
              AND $whereStatusPegawai
              AND $whereJenisPegawai
            ) AS b
            ON a.pegawai_id = b.id";
            return $this->db->query($sql)->result();
    }

    function getLaporanPresensiKhusus()
    {
        $postData = $this->getPostData();
        (empty($postData['pegawai_id'])) ? $wherePegawai = 'kosong' : $wherePegawai = $postData['pegawai_id'];
        (empty($postData['departemen_id'])) ? $whereDepartemen = 'kosong' : $whereDepartemen = $postData['departemen_id'];
        (empty($postData['sub_departemen'])) ? $whereSubDepartemen = 'kosong' : $whereSubDepartemen = $postData['sub_departemen'];
        (empty($postData['tipe_pegawai_id'])) ? $whereTipePegawai = 'kosong' : $whereTipePegawai = $postData['tipe_pegawai_id'];
        (empty($postData['jenis_pegawai_id'])) ? $whereJenisPegawai = 'kosong' : $whereJenisPegawai = $postData['jenis_pegawai_id'];
        (empty($postData['status_pegawai_id'])) ? $whereStatusPegawai = 'kosong' : $whereStatusPegawai = $postData['status_pegawai_id'];
        $tgl_awal = $postData['tanggal']['tgl_mulai'];
        $tgl_akhir = $postData['tanggal']['tgl_selesai'];
        $laporan = $this->getLogKhusus($tgl_awal,$tgl_akhir,$wherePegawai,$whereDepartemen,$whereSubDepartemen,$whereTipePegawai,$whereJenisPegawai,$whereStatusPegawai);
        $dataLaporan = array();
        foreach ($laporan as $lp) {
            $dataLaporan[$lp->pegawai_id][$lp->tanggal] = 1;
        }
        return $dataLaporan;
    }
    function sum_time($times = null)
    {
        $i = 0;
        // foreach (func_get_args() as $time) {
        //     sscanf($time, '%d:%d', $hour, $min);
        //     $i += $hour * 60 + $min;
        // }
        if (!empty($times)) {
            foreach ($times as $time) {
                sscanf($time, '%d:%d', $hour, $min);
                $i += $hour * 60 + $min;
            }
            if ($h = floor($i / 60)) {
                $i %= 60;
            }
            return sprintf('%02d:%02d', $h, $i);
        } else {
            return '0';
        }
    }
    function sum_the_time($times = null)
    {
        // $times = array($time1, $time2);
        $seconds = 0;
        foreach ($times as $time) {
            list($hour, $minute, $second) = explode(':', $time);
            $seconds += $hour * 3600;
            $seconds += $minute * 60;
            $seconds += $second;
        }
        $hours = floor($seconds / 3600);
        $seconds -= $hours * 3600;
        $minutes  = floor($seconds / 60);
        return sosintf('%02d:%02d:%02d', $hours, $minutes, $seconds); // Thanks to Patrick
    }
    function bagi_time($time = null, $bagi = null)
    {
        if (!empty($time)) {
            list($hours, $minutes) = explode(":", $time);
            $minutes += $hours * 60;
            $seconds = $minutes * 60;
            date_default_timezone_set("UTC"); // makes sure there is no DST or timezone added to result
            return date("h:i", $seconds / $bagi);
        } else {
            return '0';
        }
    }

    function perhitunganPotonganBlu($tl1 = null, $tl2 = null, $tl3 = null, $tl4 = null, $psw1 = null, $psw2 = null, $psw3 = null, $psw4 = null, $alpha = null, $izin = null, $sakit = null, $dinas = null, $cuti = null)
    {
		$setTukin = $this->session->userdata('tukin');
		 //$arg_list = func_get_args();
		//$this->general->testPre($arg_list);
		//$this->general->testPre($setTukin);
        
        $hasil = ($tl1 * $setTukin['TL1']['pengurangan_rupiah']) + ($tl2 * $setTukin['TL2']['pengurangan_rupiah']) + ($tl3 * $setTukin['TL3']['pengurangan_rupiah']) + ($tl4 * $setTukin['TL4']['pengurangan_rupiah']) + ($psw1 * $setTukin['PSW1']['pengurangan_rupiah']) + ($psw2 * $setTukin['PSW2']['pengurangan_rupiah']) + ($psw3 * $setTukin['PSW3']['pengurangan_rupiah']) + ($psw4 * $setTukin['PSW4']['pengurangan_rupiah']) + ($alpha * $setTukin['Alpha']['pengurangan_rupiah']) + ($izin * $setTukin['Izin']['pengurangan_rupiah']) + ($sakit * $setTukin['Sakit']['pengurangan_rupiah']) + ($dinas * $setTukin['Dinas']['pengurangan_rupiah']) + ($cuti * $setTukin['Cuti']['pengurangan_rupiah']);
        return $hasil;
    }
    function perhitunganTambahPersen($tl1 = null, $tl2 = null, $tl3 = null, $tl4 = null, $psw1 = null, $psw2 = null, $psw3 = null, $psw4 = null, $alpha = null, $izin = null, $sakit = null, $dinas = null, $cuti = null)
    {
        $hasil = ($tl1) + ($tl2) + ($tl3) + ($tl4) + ($psw1) + ($psw2) + ($psw3) + ($psw4) + ($alpha) + ($izin) + ($sakit) + ($dinas) + ($cuti);
        return $hasil;
    }

    function getJumlahHariKerja($arrayTanggal = null)
    {
        $hari = 0;
        foreach ($arrayTanggal as $val) {
            $weekend = $this->isWeekend($val->date_dummy);
            if (!$weekend) {
                $hari++;
            }
        }
        return $hari;
    }
    function cekPresensi($menitTl = null, $menitPsw = null,$jamMasuk=null,$jamKeluar=null)
    {
        if (empty($menitTl)) {
            $jumlahTl = 0;
        } else {
            $jumlahTl = $this->getTlRange($menitTl);
        }

        if (empty($menitPsw)) {
            $jumlahPsw = 0;
        } else {
            $jumlahPsw = $this->getPswRange($menitPsw);
        }
        //format output
        if ($jumlahTl == 0) {
            if ($jumlahPsw == 0) {
                $hasil = 1;
            } else {
                $hasil = 'PSW' . $jumlahPsw;
            }
        } else {
            if ($jumlahPsw == 0) {
                $hasil = 'TL' . $jumlahTl;
            } else {
                $jumlahTotal = $jumlahPsw + $jumlahTl;
                if ($jumlahTotal >= 4) {
                    $hasil = "TL4";
                } else {
                    $hasil = "TL" . $jumlahTotal;
                }
            }
        }
		//jika cuman datang atau pulang saja maka dianggap tl4
		if(empty($jamMasuk) || empty($jamKeluar)){
			$hasil ="TL4";
		}
        return $hasil;
        // $jumlahTotal = $jumlahTl+$jumlahPsw;
        // return ($jumlahTotal >=4)?4:$jumlahTotal; //jika hasil lebih dari 4 maka return 4

    }
    function getPswRange($psw = null)
    {
        $setTukin = $this->session->userdata('tukin');
        $hasil = 0;
        if ($psw <= $setTukin['PSW1']['batas_akhir']) {
            $hasil = 1;
        } else if ($psw <= $setTukin['PSW2']['batas_akhir']) {
            $hasil = 2;
        } else if ($psw <= $setTukin['PSW3']['batas_akhir']) {
            $hasil = 3;
        } else {
            $hasil = 4;
        }

        return $hasil;
    }

    function getJumlahPersenPswTl($jenis = null, $jumlah = null)
    {
        $setTukin = $this->session->userdata('tukin');
        $hasil = 0;
        switch ($jenis) {
            case 'TL1':
                $hasil = $setTukin['TL1']['pengurangan'] * $jumlah;
                break;
            case 'TL2':
                $hasil = $setTukin['TL2']['pengurangan'] * $jumlah;
                break;
            case 'TL3':
                $hasil = $setTukin['TL3']['pengurangan'] * $jumlah;
                break;
            case 'TL4':
                $hasil = $setTukin['TL4']['pengurangan'] * $jumlah;
                break;
            case 'PSW1':
                $hasil = $setTukin['PSW1']['pengurangan'] * $jumlah;
                break;
            case 'PSW2':
                $hasil = $setTukin['PSW2']['pengurangan'] * $jumlah;
                break;
            case 'PSW3':
                $hasil = $setTukin['PSW3']['pengurangan'] * $jumlah;
                break;
            case 'PSW4':
                $hasil = $setTukin['PSW4']['pengurangan'] * $jumlah;
                break;
            case 'A':
                $hasil = $setTukin['Alpha']['pengurangan'] * $jumlah;
                break;
            case 'I':
                $hasil = $setTukin['Izin']['pengurangan'] * $jumlah;
                break;
            case 'S':
                $hasil = $setTukin['Sakit']['pengurangan'] * $jumlah;
                break;
            case 'D':
                $hasil = $setTukin['Dinas']['pengurangan'] * $jumlah;
                break;
            case 'C':
                $hasil = $setTukin['Cuti']['pengurangan'] * $jumlah;
                break;
            default:
                $hasil = '0';
        }
        return $hasil;
    }
    function getTlRange($tl = null)
    {
        $setTukin = $this->session->userdata('tukin');
        $hasil = 0;
        if ($tl <= $setTukin['TL1']['batas_akhir']) {
            $hasil = 1;
        } else if ($tl <= $setTukin['TL2']['batas_akhir']) {
            $hasil = 2;
        } else if ($tl <= $setTukin['TL3']['batas_akhir']) {
            $hasil = 3;
        } else {
            $hasil = 4;
        }

        return $hasil;
    }
}
