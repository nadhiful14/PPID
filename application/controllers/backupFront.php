<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        $this->load->model('Master_model', 'master', true);
        $this->load->helper('url');
        $this->load->helper('download');
    }

    function index()
    {
        $data['tampil_berita'] = $this->master->tampil_berita();
        $this->template->templateHome($data);
    }
    function listBerita()
    {
        $data['tampil_berita'] = $this->master->tampil_berita();
        $this->template->listBerita($data);
    }
    function detailBerita()
    {
        $slug = $this->uri->segment(3);
        $data['detail_berita'] = $this->master->detailBerita($slug);
        $data['recent_berita'] = $this->master->recentBerita($slug);
        $this->template->detailBerita($data);
    }
    function formulirOffline()
    {
        force_download('assets/front/download/Form-Pemohonan-Informasi.pdf', NULL);
    }
    function formulir_permohonan_online()
    {
        $data['aktif'] = 'active';
        $this->template->formulir_permohonan_online($data);
    }
    function add_form_permohonan()
    {
        $nomor = $this->input->post('nomor', true);
        $nama_depan = $this->input->post('nama_depan', true);
        $nama_belakang = $this->input->post('nama_belakang', true);
        $alamat = $this->input->post('alamat', true);
        $kota = $this->input->post('kota', true);
        $provinsi = $this->input->post('provinsi');
        $no_telpon = $this->input->post('no_telpon', true);
        $pekerjaan = $this->input->post('pekerjaan', true);
        $email = $this->input->post('email', true);
        $upload_ktp = $_FILES['upload_ktp'];

        if ($upload_ktp = '') {
        } else {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '4096';
            $config['upload_path'] = './assets/uploads/files/';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('upload_ktp')) {
                echo "Upload Gagal";
            } else {
                $upload_ktp = $this->upload->data('file_name');
            }
        }

        $upload_pengantar = $_FILES['upload_pengantar'];

        if ($upload_pengantar = '') {
        } else {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '4096';
            $config['upload_path'] = './assets/uploads/files/';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('upload_pengantar')) {
                echo "Upload Gagal";
            } else {
                $upload_pengantar = $this->upload->data('file_name');
            }
        }

        $informasi = $this->input->post('informasi', true);
        $tujuan = $this->input->post('tujuan', true);
        $cara_memperoleh = implode(", ", $this->input->post('cara_memperoleh', true));
        $cara_mendapatkan = implode(", ", $this->input->post('cara_mendapatkan', true));

        if ($_POST) {
            $data = array(
                "nomor" => $nomor,
                "nama_depan" => $nama_depan,
                "nama_belakang" => $nama_belakang,
                "alamat" => $alamat,
                "kota" => $kota,
                "provinsi" => $provinsi,
                "no_telpon" => $no_telpon,
                "pekerjaan" => $pekerjaan,
                "email" => $email,
                "upload_ktp" => $upload_ktp,
                "upload_pengantar" => $upload_pengantar,
                "informasi" => $informasi,
                "tujuan" => $tujuan,
                "cara_memperoleh" => $cara_memperoleh,
                "cara_mendapatkan" => $cara_mendapatkan,
            );
            echo $this->master->add_form_permohonan($data);
        } else {
            redirect('Front/formulir_permohonan_online');
        }
    }

    // Pengajuan============================================================================

    function formulir_pengajuan_keberatan()
    {
        $data['aktif'] = 'active';
        $this->template->formulir_pengajuan_keberatan($data);
    }

    function add_form_pengajuan()
    {

        $config['upload_path'] = './assets/uploads/files/';

        $this->load->library('upload', $config);

        $nama_depan = $this->input->post('nama_depan', true);
        $nama_belakang = $this->input->post('nama_belakang', true);
        $email = $this->input->post('email', true);
        $no_telpon = $this->input->post('no_telpon', true);
        $upload_ktp = $_FILES['upload_ktp'];
        $nama_ktp = $_FILES['upload_ktp']['name'];
        $ukuran_ktp = $_FILES['upload_ktp']['size'];
        $tmp_ktp = $_FILES["upload_ktp"]["tmp_name"];

        $ekstensiValid  = ['jpg', 'jpeg', 'png'];
        $ekstensiFoto = explode('.', $nama_ktp);

        $ekstensiFoto = strtolower(end($ekstensiFoto));

        if ($upload_ktp = '') {
        } else {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['upload_path'] = './assets/uploads/files/';

            $this->load->library('upload', $config);
            if (!in_array($ekstensiFoto, $ekstensiValid)) {
                echo "<script>
                        alert('Maaf, Yang Anda Upload Bukan Gambar!');
                    </script>";
                redirect('front/formulir_pengajuan_keberatan', 'refresh');

                return false;
            } else if ($ukuran_ktp > 1500000) {
                echo "<script>alert('Permohonan gagal di unggah! Ukuran file terlalu besar');</script>";
                redirect('front/formulir_pengajuan_keberatan', 'refresh');
                return false;
            } else {
                $upload_ktp = $this->upload->data('file_name');
            }
        }


        $informasi = $this->input->post('informasi', true);

        $alasan_keberatan = implode(", ", $this->input->post('alasan_keberatan', true));
        $keterangan_keberatan = $this->input->post('keterangan_keberatan', true);
        $upload_lampiran = $_FILES['upload_lampiran'];
        $nama_lampiran = $_FILES['upload_lampiran']['name'];
        $ukuran_lampiran = $_FILES['upload_lampiran']['size'];
        $ekstensiFotoLamp = explode('.', $nama_lampiran);
        $tmpLamp = $_FILES["upload_lampiran"]["tmp_name"];

        $ekstensiFotoLamp = strtolower(end($ekstensiFotoLamp));

        if ($upload_lampiran = '') {
        } else {
            if (!in_array($ekstensiFotoLamp, $ekstensiValid)) {
                echo "<script>
                        alert('Maaf, Yang Anda Upload Bukan Gambar!');
                    </script>";
                redirect('front/formulir_pengajuan_keberatan', 'refresh');

                return false;
            } else if ($ukuran_lampiran > 1500000) {
                echo "<script>alert('Permohonan gagal di unggah! Ukuran file terlalu besar');</script>";
                redirect('front/formulir_pengajuan_keberatan', 'refresh');
                return false;
            } else {
                $upload_lampiran = $this->upload->data('file_name');
            }
        }


        // if ($upload_lampiran = '') {
        // } else {
        //     $config['allowed_types'] = 'gif|jpg|png';
        //     $config['max_size']     = '1024';

        //     if (!$this->upload->do_upload('upload_lampiran')) {
        //         echo "<script>alert('Permohonan gagal di unggah! Ukuran file terlalu besar');</script>";
        //         // redirect('front/formulir_pengajuan_keberatan', 'refresh');
        //         return false;
        //     } else {
        //         $upload_lampiran = $this->upload->data('file_name');
        //     }
        // }

        $namaKTP = uniqid();
        $namaKTP .= '.';
        $namaKTP .= $ekstensiFoto;

        // move_uploaded_file(base_url(), 'assets/uploads/files/' . $namaKTP);
        // var_dump($tmp_ktp);
        // var_dump(base_url());
        // die();

        $namaLamp = uniqid();
        $namaLamp .= '.';
        $namaLamp .= $ekstensiFotoLamp;

        // move_uploaded_file(base_url(), 'assets/uploads/files/' . $namaLamp);


        if ($_POST) {
            $data = array(
                "nama_depan" => $nama_depan,
                "nama_belakang" => $nama_belakang,
                "email" => $email,
                "no_telpon" => $no_telpon,
                "upload_ktp" => $upload_ktp,
                "informasi" => $informasi,
                "alasan_keberatan" => $alasan_keberatan,
                "keterangan_keberatan" => $keterangan_keberatan,
                "upload_lampiran" => $upload_lampiran,
            );
            echo $this->master->add_form_pengajuan($data);
        } else {
            redirect('Front/formulir_pengajuan_keberatan');
        }
    }


    // Kepuasan Masyarakat=======================
    function formulir_kepuasan_masyarakat()
    {
        $data['aktif'] = 'active';
        $this->template->formulir_kepuasan_masyarakat($data);
    }
    function add_form_kepuasan()
    {
        $email = $this->input->post('email', true);
        $nama = $this->input->post('nama', true);
        $alamat = $this->input->post('alamat', true);
        $no_telpon = $this->input->post('no_telpon', true);
        $nilai_pelayanan = $this->input->post('nilai_pelayanan', true);

        if ($_POST) {
            $data = array(
                "email" => $email,
                "nama" => $nama,
                "alamat" => $alamat,
                "no_telpon" => $no_telpon,
                "nilai_pelayanan" => $nilai_pelayanan,
            );
            echo $this->master->add_form_kepuasan($data);
        } else {
            redirect('Front/formulir_kepuasan_masyarakat');
        }
    }

    // Survey Pelayanan=========================
    function formulir_survey_pelayanan()
    {
        $data['aktif'] = 'active';
        $this->template->formulir_survey_pelayanan($data);
    }
    function add_form_survey()
    {
        $email = $this->input->post('email', true);
        $nama = $this->input->post('nama', true);
        $alamat = $this->input->post('alamat', true);
        $no_telpon = $this->input->post('no_telpon', true);
        $nilai_pelayanan = $this->input->post('nilai_pelayanan', true);

        if ($_POST) {
            $data = array(
                "email" => $email,
                "nama" => $nama,
                "alamat" => $alamat,
                "no_telpon" => $no_telpon,
                "nilai_pelayanan" => $nilai_pelayanan,
            );
            echo $this->master->add_form_survey($data);
        } else {
            redirect('Front/formulir_survey_pelayanan');
        }
    }
}
