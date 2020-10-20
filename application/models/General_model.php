<?php
defined('BASEPATH') or exit('No direct script access allowed');

class General_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }


    function generateAngka($batas = null, $default = null)
    {
        if (empty($batas)) {
            $batas = 100;
        }
        $hasil = "<option value=''></option>";
        for ($i = 0; $i <= $batas; $i++) {
            ($i == $default) ? $selected = "selected" : $selected = "";
            $hasil .= "<option value=$i $selected>$i</option>";
        }
        return $hasil;
    }

    function redirectSkpi()
    {
        redirect('admin', 'refresh');
        // if ($this->session->has_userdata('skpi_is_login_admin')) {

        // } elseif ($this->session->has_userdata('skpi_is_login_dosen')) {
        //     redirect('dosen', 'refresh');
        // } else {
        //     redirect('mahasiswa', 'refresh');
        // }
    }
    function formatRupiah($rupiah = null)
    {
        return number_format($rupiah, 0, ".", ".");
    }
    function formatRupiahKoma($rupiah = null)
    {
        return number_format($rupiah, 0, ",", ",");
    }
    function convertArray($array = null, $field = null)
    {
        foreach ($array as $key => $val) {
            $data[] = $val->$field;
        }
        return $data;
    }
    function whereInFromDb($array = null, $field = null)
    {
        $hasil = $this->convertArray($array, $field);
        return  "'" . implode("','", $hasil) . "'";
    }

    function convertArrayWithIndex($array = null, $index = null, $result = null)
    {
        foreach ($array as $key => $val) {
            $data[$val->$index] = $val->$result;
        }
        return $data;
    }

    function getLogin($username = null)
    {
        $dataUser = $this->db->get_where('user', array('username' => $username))->row();
        return (!empty($dataUser)) ? $dataUser : false;
    }


    function generate($table)
    {
        $field = $this->db->field_data($table);
        foreach ($field as $key => $f) {
?>
            $this->form_validation->set_rules('<?php echo $f->name ?>', '<?php echo ucwords($f->name) ?>', 'required');
            <br>
<?php
        }
        //            echo '<pre>';
        //            print_r($field);
        //            echo '</pre>';
    }

    function date_convert($date)
    {
        $date = date('Y-m-d', strtotime($date)); // ubah sesuai format penanggalan standart
        $bulan = array(
            '01' => 'Januari', // array bulan konversi
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        );
        $date = explode('-', $date); // ubah string menjadi array dengan paramere '-'

        return $bulan[$date[1]]; // hasil yang di kembalikan
    }
    function konversiBulanKeNama($nomor = null)
    {
        (strlen($nomor) == 1) ? $nomor = "0" . $nomor : $nomor = $nomor;
        $bulan = array(
            '01' => 'Januari', // array bulan konversi
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        );
        return $bulan[$nomor];
    }
    function getBulanrekapTahunan($tanggalAwal = null, $tanggalAkhir = null)
    {
        $bulanAwal = substr($tanggalAwal, 5, 2);
        $bulanAkhir = substr($tanggalAkhir, 5, 2);
        $tahun = substr($tanggalAwal, 0, 4);
        $getHariMasuk = $this->lp->getSumTanggalNonWeekendOneMonth(array('tgl_mulai' => $tanggalAwal, 'tgl_selesai' => $tanggalAkhir));
        foreach ($getHariMasuk as $gm) {
            $bulan = substr($gm->bulan, 5, 2);
            $hariMasuk[$bulan] = $gm->jumlah_hari;
        }
        for ($i = $bulanAwal; $i <= $bulanAkhir; $i++) {
            (strlen($i) == 1) ? $i = "0" . $i : $i = $i;
            $dataBulan[$i]['nama_bulan'] = $this->konversiBulanKeNama($i);
            $dataBulan[$i]['hari_masuk'] = $hariMasuk[$i];
            $dataBulan[$i]['bulan'] = $tahun . '-' . $i;
        }
        return $dataBulan;
    }
    function getTanggalIndo($date = null, $type_kembalian = null)
    {
        if ($type_kembalian == 1) {
            $result = substr($date, -2) . " " . $this->date_convert($date) . " " . substr($date, 0, 4);
        } else if ($type_kembalian == 2) {
            $result = $this->date_convert($date) . " " . substr($date, 0, 4);
        }
        return $result;
    }
    function getTanggalSekarang()
    {
        $date = date('Y-m-d');
        return substr($date, -2) . " " . $this->date_convert($date) . " " . substr($date, 0, 4);
    }

    function testPre($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

    function lostHtml($kata = null)
    {
        $find = array('<p>', '</p>');
        $replace = array('', '');
        return str_replace($find, $replace, $kata);
    }

    function fontSoal($kata = null)
    {
        $find = array('<p>', '<div>');
        $replace = array("<p style='font-size:18px'>", "<div style='font-size:18px'>");
        return str_replace($find, $replace, $kata);
    }

    function cekCaptcha()
    {
        $input = $this->input->post('secutity_code');
        $sessionku = $this->session->userdata('mycaptcha');
        if ($input == $sessionku) {
            return true;
        } else {
            $this->form_validation->set_message('cek_captcha', 'Captcha Tidak Sesuai');
            return false;
        }
    }

    function randomString($length)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function genNumber($tabel = null, $field = null, $kode = null, $jml = null)
    {
        //contoh penggunaan $id = $this->general->genNumber('pmb_prodi','idpmb_prodi','PRODI',10);   
        $hari_ini = $hariini = date('Y') . date('m') . date('d');
        $hasil = $this->db->query("select * from $tabel order by $field desc limit 1")->row();
        if (!empty($hasil)) {
            $hari_database = substr($hasil->$field, 0, 8);
        } else {
            $hari_database = 'gakPodoBos';
        }
        if ($hari_database == $hari_ini) {
            $counter = substr($hasil->$field, -$jml) + 1;
            $number = $hari_ini . $kode . substr('0000000000' . $counter, -$jml);
        } else {
            $number = $hari_ini . $kode . substr('000000000001', -$jml);
        }
        return $number;
    }
}
