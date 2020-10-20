<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        $this->load->model('Master_model', 'master', true);

        $this->load->helper('url');
        $this->load->helper('download');
        $data['website'] = $this->master->tampil_list_web();
        $data['tentang'] = $this->master->tampil_tentang();
        $data['kontak'] = $this->master->tampil_kontak();
        $data['alamat'] = $this->master->tampil_alamat();
        $data['email'] = $this->master->tampil_email();
        $data['twitter'] = $this->master->tampil_twitter();
        $data['facebook'] = $this->master->tampil_facebook();
        $data['instagram'] = $this->master->tampil_instagram();
        $data['kelengkapan_dewan'] = $this->master->kelengkapan_dewan();
        $this->load->vars($data);
    }

    function index()
    {
        $data['tampil_berita'] = $this->master->tampil_berita();
        $data['tampil_berita_popular'] = $this->master->tampil_berita_popular();
        $data['master_image_slider'] = $this->master->image_slider();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['home_active'] = 'active';

        $this->template->templateHome($data);
    }

    function anggota_dprd()
    {
        $data['tampil_anggota_dprd'] = $this->master->tampil_anggota_dprd();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['profile_active'] = 'active';
        $this->template->anggota_dprd($data);
    }

    function listBerita()
    {
        // Library pagination
        $this->load->library('session');
        $this->load->library('pagination');

        //Ambil data keyword Pencarian
        // if ($this->input->post('submit')) {
        //     $data['keyword'] = $this->input->get('keyword');
        //     $this->session->set_userdata('keyword', $data['keyword']);
        // } else {
        //     $data['keyword'] = $this->session->userdata('keyword');
        // }
        $keyword = @$this->input->get('keyword');
        if (!empty($keyword)) {
            // $data['keyword'] = $keyword;
            $this->db->like('judul', $keyword);
        }

        // config
        $this->db->from('berita');
        $this->db->where('publish', 'Publish');

        // config
        if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        $config['first_url'] = site_url('Front/listBerita') . '?' . http_build_query($_GET);
        $config['base_url'] = site_url('Front/listBerita/');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5; //Batasan Per Halaman
        // styling pagination
        //Lanjutan config styling ada di file config/pagination.php

        // inisialisasi
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['tampil_berita'] = $this->master->tampil_berita();
        $data['tampil_kategori'] = $this->master->tampil_kategori();
        $data['recent_berita'] = $this->master->recent_list_berita();
        $data['tampil_page_berita'] = $this->master->tampil_page_berita($config['per_page'], $data['start'], $keyword);
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['keyword'] = $keyword;

        $this->template->listBerita($data);
    }
    function popular()
    {
        // Library pagination
        $this->load->library('session');
        $this->load->library('pagination');

        //Ambil data keyword Pencarian
        // if ($this->input->post('submit')) {
        //     $data['keyword'] = $this->input->get('keyword');
        //     $this->session->set_userdata('keyword', $data['keyword']);
        // } else {
        //     $data['keyword'] = $this->session->userdata('keyword');
        // }
        $keyword = @$this->input->get('keyword');
        if (!empty($keyword)) {
            // $data['keyword'] = $keyword;
            $this->db->like('judul', $keyword);
        }

        // config
        $this->db->from('berita');
        $this->db->where('publish', 'Publish');

        // config
        if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        $config['first_url'] = site_url('Front/popular') . '?' . http_build_query($_GET);
        $config['base_url'] = site_url('Front/popular/');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5; //Batasan Per Halaman
        // styling pagination
        //Lanjutan config styling ada di file config/pagination.php

        // inisialisasi
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        // $data['tampil_berita'] = $this->master->tampil_berita();
        $data['tampil_kategori'] = $this->master->tampil_kategori();
        $data['recent_berita'] = $this->master->recent_list_berita();
        $data['tampil_page_berita'] = $this->master->popular($config['per_page'], $data['start'], $keyword);
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();

        $this->template->listBerita($data);
    }
    function list_kategori()
    {
        // Library pagination
        $this->load->library('session');
        $this->load->library('pagination');
        $kategori = $this->uri->segment(3);
        $keyword = @$this->input->get('keyword');


        $this->db->select('berita.id, berita.publish, berita.judul, berita.slug, berita.isi, berita.tanggal, berita.thumbnail, kategori.nama, kategori.slug AS `kategori_slug`, user.fullname,  user.deskripsi');
        $this->db->from('berita');
        $this->db->join('kategori', 'berita.kategori_id = kategori.id');
        $this->db->join('user', 'user.id = berita.penulis');
        $this->db->where('kategori.slug', $kategori);
        $this->db->where('berita.publish', 'Publish');


        if (!empty($keyword)) {
            // $data['keyword'] = $keyword;
            $this->db->like('berita.judul', $keyword);
        }


        // config
        if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        $config['first_url'] = site_url('Front/list_kategori') . $kategori . '?' . http_build_query($_GET);
        $config['base_url'] = site_url('Front/list_kategori/') . $kategori;
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 6; //Batasan Per Halaman
        // styling pagination
        //Lanjutan config styling ada di file config/pagination.php

        // inisialisasi
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(4);
        $data['tampil_kategori'] = $this->master->tampil_kategori();
        $data['recent_berita'] = $this->master->recent_list_berita();
        $data['tampil_page_berita'] = $this->master->tampil_page_berita_kategori($config['per_page'], $data['start'], $keyword, $kategori);
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['keyword'] = $keyword;

        $this->template->list_kategori($data);
    }
    function detailBerita()
    {
        $slug = $this->uri->segment(3);
        if (empty($slug)) {
            redirect('Front/listBerita');
        }
        $data['tampil_berita'] = $this->master->semua_berita();
        $data['komentar'] = $this->master->tampil_komentar($slug);
        $data['detail_berita'] = $this->master->detailBerita($slug);
        $data['tampil_kategori'] = $this->master->tampil_kategori();
        $data['recent_berita'] = $this->master->recentBerita($slug);
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $this->add_count($slug);
        $this->template->detailBerita($data);
    }

    // This is the counter function.. 
    function add_count($slug)
    {
        // load cookie helper`
        $this->load->helper('cookie');
        // this line will return the cookie which has slug name
        $check_visitor = $this->input->cookie($slug, FALSE);
        // this line will return the visitor ip address
        $ip = $this->input->ip_address();
        // if the visitor visit this article for first time then //
        //set new cookie and update article_views column  ..
        //you might be notice we used slug for cookie name and ip 
        //address for value to distinguish between articles  views
        if ($check_visitor == false) {
            $cookie = array(
                "name"   => $slug,
                "value"  => "$ip",
                "expire" =>  time() + 7200,
                "secure" => false
            );
            $this->input->set_cookie($cookie);
            $this->master->update_counter($slug);
        }
    }
    function formulirOffline()
    {
        $query = $this->db->get('formulir_permohonan_informasi_offline')->result_array();
        foreach ($query as $a) {
            $haha = $a['upload_formulir'];
        }
        force_download('assets/front/download/' . $haha, NULL);
    }
    function formulir_permohonan_online()
    {
        $data['tittle_head'] = 'Formulir Permohonan Informasi - ';
        $data['informasi_active'] = 'active';
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
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
        $data['tittle_head'] = 'Formulir Pengajuan Keberatan - ';
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $this->template->formulir_pengajuan_keberatan($data);
    }

    function add_form_pengajuan()
    {
        $nama_depan = $this->input->post('nama_depan', true);
        $nama_belakang = $this->input->post('nama_belakang', true);
        $email = $this->input->post('email', true);
        $no_telpon = $this->input->post('no_telpon', true);
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

        $informasi = $this->input->post('informasi', true);

        $alasan_keberatan = implode(", ", $this->input->post('alasan_keberatan', true));
        $keterangan_keberatan = $this->input->post('keterangan_keberatan', true);
        $upload_lampiran = $_FILES['upload_lampiran'];

        if ($upload_lampiran = '') {
        } else {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '4096';
            $config['upload_path'] = './assets/uploads/files/';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('upload_lampiran')) {
                echo "Upload Gagal";
            } else {
                $upload_lampiran = $this->upload->data('file_name');
            }
        }

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
        $data['tittle_head'] = 'Formulir Kepuasan Masyarakat - ';
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
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
        $data['data_pertanyaan'] = $this->master->pertanyaan();
        $data['aktif'] = 'active';
        $data['tittle_head'] = 'Formulir Survey Pelayanan - ';
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $this->template->formulir_survey_pelayanan($data);
    }
    function add_form_survey()
    {
        $nama_depan = $this->input->post('nama_depan', true);
        $nama_belakang = $this->input->post('nama_belakang', true);
        $email = $this->input->post('email', true);
        $no_telepon = $this->input->post('no_telepon', true);
        $pekerjaan = $this->input->post('pekerjaan', true);
        $jenis_pelayanan = $this->input->post('jenis_pelayanan', true);
        $saran = $this->input->post('saran', true);
        $jawaban = $this->input->post('soal', true);
        // $this->general->testPre($jawaban);

        if ($_POST) {
            $data = array(
                "nama_depan" => $nama_depan,
                "nama_belakang" => $nama_belakang,
                "email" => $email,
                "no_telepon" => $no_telepon,
                "pekerjaan" => $pekerjaan,
                "jenis_pelayanan" => $jenis_pelayanan,
                "saran" => $saran,
            );
            echo $this->master->add_form_survey($data);
        } else {
            redirect('Front/formulir_survey_pelayanan');
        }
    }

    function daftar_informasi_publik()
    {
        $data['daftar_informasi_publik'] = $this->master->tampil_informasi_publik();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'Daftar Informasi Publik (DIP) - ';
        $data['informasi_active'] = 'active';
        $this->template->daftar_informasi_publik($data);
    }
    function informasi_berkala()
    {
        $data['tampil_informasi_berkala'] = $this->master->tampil_informasi_berkala();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'Informasi Berkala - ';
        $data['informasi_active'] = 'active';
        $this->template->informasi_berkala($data);
    }
    function informasi_serta_merta()
    {
        $data['tampil_informasi_berkala'] = $this->master->tampil_informasi_serta_merta();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'Informasi Serta Merta - ';
        $data['informasi_active'] = 'active';
        $this->template->informasi_berkala($data);
    }
    function informasi_setiap_saat()
    {
        $data['tampil_informasi_berkala'] = $this->master->tampil_informasi_setiap_saat();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'Informasi Setiap Saat - ';
        $data['informasi_active'] = 'active';
        $this->template->informasi_berkala($data);
    }
    // function badan_anggaran()
    // {
    //     $data['badan_anggaran'] = $this->master->tampil_badan_anggaran();
    //     $data['tampil_fraksi'] = $this->master->tampil_fraksi();
    //     $data['tittle_head'] = 'Badan Anggaran - ';
    //     $this->template->badan_anggaran($data);
    // }
    function badan_anggaran()
    {
        $data['badan_anggaran'] = $this->master->tampil_badan_anggaran();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'Badan Anggaran - ';
        $data['profile_active'] = 'active';
        $this->template->badan_anggaran($data);
    }
    function badan_musyawarah()
    {
        $data['badan_musyawarah'] = $this->master->tampil_badan_musyawarah();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'Badan Musyawarah - ';
        $data['profile_active'] = 'active';
        $this->template->badan_musyawarah($data);
    }
    function badan_pembentuk_perda()
    {
        $data['badan_pembentuk_perda'] = $this->master->tampil_badan_pembentuk_perda();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'Badan Pembentuk Perda - ';
        $data['profile_active'] = 'active';
        $this->template->badan_pembentuk_perda($data);
    }
    function badan_kehormatan()
    {
        $data['badan_kehormatan'] = $this->master->tampil_badan_kehormatan();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'Badan Kehormatan - ';
        $data['profile_active'] = 'active';
        $this->template->badan_kehormatan($data);
    }
    function struktur_organisasi()
    {
        $data['struktur_organisasi'] = $this->master->tampil_struktur_organisasi();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'Struktur Organisasi - ';
        $data['profile_active'] = 'active';
        $this->template->struktur_organisasi($data);
    }
    function tugas_dan_fungsi()
    {
        $data['tugas_dan_fungsi'] = $this->master->tampil_tugas_dan_fungsi();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'Tugas Dan Fungsi - ';
        $data['profile_active'] = 'active';
        $this->template->tugas_dan_fungsi($data);
    }
    function profil_pejabat_struktural()
    {
        $data['profil_pejabat_struktural'] = $this->master->tampil_profil_pejabat_struktural();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['profile_active'] = 'active';
        $data['tittle_head'] = 'Profil Pejabat Struktural - ';
        $this->template->profil_pejabat_struktural($data);
    }
    function komisi_komisi()
    {
        // Library pagination
        $this->load->library('pagination');

        //Ambil data keyword Pencarian
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->set_userdata('keyword');
        }

        // config

        $this->db->select('berita.judul, berita.slug, berita.isi, berita.tanggal, berita.thumbnail, kategori.nama, user.fullname,  user.deskripsi, berita.tag');
        $this->db->from('berita');
        $this->db->join('kategori', 'berita.kategori_id = kategori.id');
        $this->db->join('user', 'user.id = berita.penulis');
        // $this->db->join('master_tag', 'master_tag.id = berita.tag');
        $this->db->like('berita.tag', 'komisi');
        $this->db->like('judul', $data['keyword']);

        // config
        $config['base_url'] = site_url('Front/komisi_komisi');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 4; //Batasan Per Halaman
        // styling pagination
        //Lanjutan config styling ada di file config/pagination.php

        // inisialisasi
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['komisi_komisi'] = $this->master->tampil_komisi_komisi($config['per_page'], $data['start']);
        $data['tampil_kategori'] = $this->master->tampil_kategori();
        $data['recent_berita'] = $this->master->recent_list_berita();
        $data['profile_active'] = 'active';
        // $data['tampil_page_berita'] = $this->master->tampil_page_berita($config['per_page'], $data['start'], $data['keyword']);
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();


        $this->template->komisi_komisi($data);
    }
    function pimpinan_dprd()
    {
        $data['pimpinan_dprd'] = $this->master->data_pimpinan_dprd();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['recent_berita'] = $this->master->recent_list_berita();
        $data['tittle_head'] = 'Pimpinan DPRD - ';
        $data['profile_active'] = 'active';
        $data['tampil_kategori'] = $this->master->tampil_kategori();
        $this->template->pimpinan_dprd($data);
    }
    function agenda_kerja()
    {
        $data['agenda_kerja'] = $this->master->tampil_agenda_kerja();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['recent_berita'] = $this->master->recent_list_berita();
        $data['tampil_kategori'] = $this->master->tampil_kategori();
        $data['tittle_head'] = 'Agenda Kerja DPRD - ';
        $data['profile_active'] = 'active';
        $this->template->agenda_kerja($data);
    }
    function rencana_ppid()
    {
        $data['rencana_ppid'] = $this->master->tampil_rencana_ppid();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['recent_berita'] = $this->master->recent_list_berita();
        $data['tampil_kategori'] = $this->master->tampil_kategori();
        $data['tittle_head'] = 'Rencana Kerja & Kegiatan PPID - ';
        $data['ppid_active'] = 'active';
        $this->template->rencana_ppid($data);
    }
    function laporan_tahunan_dprd()
    {
        $data['laporan_tahunan_dprd'] = $this->master->tampil_laporan_tahunan_dprd();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['recent_berita'] = $this->master->recent_list_berita();
        $data['tampil_kategori'] = $this->master->tampil_kategori();
        $data['tittle_head'] = 'Laporan Tahunan DPRD - ';
        $data['laporan_active'] = 'active';
        $this->template->laporan_tahunan_dprd($data);
    }
    function profil_dprd()
    {
        $data['profil_dprd'] = $this->master->tampil_profil_dprd();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'Profil DPRD - ';
        $data['profile_active'] = 'active';
        $this->template->profil_dprd($data);
    }
    function profil_ppid_pembantu()
    {
        $data['profil_ppid_pembantu'] = $this->master->tampil_profil_ppid_pembantu();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'Profil PPID Pembantu - ';
        $data['ppid_active'] = 'active';
        $this->template->profil_ppid_pembantu($data);
    }
    function download_sk_ppid()
    {

        // $query = $this->db->get('sk_ppid')->result_array();

        // for ($x = 0; $x < count($query); $x++) {
        //     force_download('assets/front/download/' . $query[$x]['upload_dokumen'], NULL);
        // }
        // foreach ($query as $a) {
        //     $haha = $a['upload_formulir'];
        // }

    }
    function laporan_keuangan()
    {
        $data['laporan_keuangan'] = $this->master->tampil_list_laporan_keuangan();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'Ringkasan Laporan Keuangan - ';
        $data['tampil_kategori'] = $this->master->tampil_kategori();
        $data['recent_berita'] = $this->master->recent_list_berita();
        $data['laporan_active'] = 'active';
        $this->template->list_laporan_keuangan($data);
    }
    function detail_laporan_keuangan($id)
    {
        $data['laporan_keuangan'] = $this->master->tampil_laporan_keuangan($id);
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tampil_kategori'] = $this->master->tampil_kategori();
        $data['recent_berita'] = $this->master->recent_list_berita();
        $data['tittle_head'] = 'Ringkasan Laporan Keuangan - ';
        $data['laporan_active'] = 'active';
        $this->template->tampil_laporan_keuangan($data);
    }
    function peraturan_keterbukaan_informasi()
    {
        $data['peraturan_keterbukaan_informasi'] = $this->master->tampil_peraturan_keterbukaan_informasi();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tampil_kategori'] = $this->master->tampil_kategori();
        $data['recent_berita'] = $this->master->recent_list_berita();
        $data['tittle_head'] = 'Peraturan Keterbukaan Informasi Publik - ';
        $data['ppid_active'] = 'active';
        $this->template->tampil_peraturan_keterbukaan_informasi($data);
    }
    function struktur_ppid()
    {
        $data['struktur_ppid'] = $this->master->tampil_struktur_ppid();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        // $data['tampil_kategori'] = $this->master->tampil_kategori();
        // $data['recent_berita'] = $this->master->recent_list_berita();
        $data['tittle_head'] = 'Struktur PPID Pembantu - ';
        $data['ppid_active'] = 'active';
        $this->template->tampil_struktur_ppid($data);
    }
    function kontak()
    {
        $data['kontak'] = $this->master->tampil_kontak();
        $data['email'] = $this->master->tampil_email();
        $data['alamat'] = $this->master->tampil_alamat();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'Kontak - ';
        $data['kontak_active'] = 'active';
        $this->template->tampil_kontak($data);
    }
    function add_komentar()
    {
        $data = array(
            "email" => $this->input->post('email', true),
            "nama" => $this->input->post('nama', true),
            "komentar" => $this->input->post('komentar', true),
            "id_berita" => $this->input->post('id_berita', true),
        );
        $this->master->add_komentar($data);
    }
    function sop_layanan_ppid()
    {
        $data['sop_ppid'] = $this->master->tampil_sop_ppid();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'SOP Layanan PPID - ';
        $data['informasi_active'] = 'active';
        $this->template->sop_ppid($data);
    }
    function tata_tertib_dprd()
    {
        $data['tata_tertib_dprd'] = $this->master->tampil_tata_tertib_dprd();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'Tata Tertib DPRD - ';
        $data['profil_active'] = 'active';
        $this->template->tata_tertib_dprd($data);
    }
    function pedoman_ppid_pembantu()
    {
        $data['pedoman_ppid'] = $this->master->tampil_pedoman_ppid();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'Pedoman PPID Pembantu - ';
        $data['ppid_active'] = 'active';
        $this->template->pedoman_ppid($data);
    }
    function profil_badan_publik()
    {
        $data['profil_badan_publik'] = $this->master->tampil_profil_badan_publik();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'Profil Badan Publik - ';
        $data['ppid_active'] = 'active';
        $this->template->profil_badan_publik($data);
    }
    function informasi_dikecualikan()
    {
        $data['informasi_dikecualikan'] = $this->master->tampil_informasi_dikecualikan();
        $data['data_tahun'] = $this->master->data_tahun();
        $data['foto_informasi_dikecualikan'] = $this->master->tampil_foto_informasi_dikecualikan();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'Informasi yang Dikecualikan - ';
        $data['informasi_active'] = 'active';
        $this->template->informasi_dikecualikan($data);
    }
    function download()
    {
        $data = $this->uri->segment(3);
        force_download('assets/front/download/' . $data, NULL);
    }
    function downloads()
    {
        $tahun = $this->uri->segment(4);
        $file = $this->uri->segment(3);

        $this->db->select('naskah_pertimbangan');
        $this->db->from('informasi_dikecualikan');
        $this->db->where('naskah_pertimbangan', $file);
        $this->db->where('tahun', $tahun);
        $data = $this->db->get()->result_array();

        foreach ($data as $a) {
            $pdf = $a['naskah_pertimbangan'];
        }

        force_download('assets/front/download/' . $pdf, NULL);
    }
    function document()
    {
        $tahun = $this->uri->segment(4);
        $file = $this->uri->segment(3);

        $this->db->select('informasi_dikecualikan');
        $this->db->from('informasi_dikecualikan');
        $this->db->where('informasi_dikecualikan', $file);
        $this->db->where('tahun', $tahun);
        $data = $this->db->get()->result_array();

        foreach ($data as $a) {
            $pdf = $a['informasi_dikecualikan'];
        }

        force_download('assets/front/download/' . $pdf, NULL);
    }
    function informasi_yang_dikecualikan()
    {
        $tahun = $this->uri->segment(3);

        $data['informasi_dikecualikan'] = $this->master->tampil_informasi_dikecualikan_tahun($tahun);
        $data['arsip_naskah'] = $this->master->arsip_naskah($tahun);
        $data['data_tahun'] = $this->master->data_tahun_dt($tahun);
        $data['foto_informasi_dikecualikan'] = $this->master->tampil_foto_informasi_dikecualikan_tahun($tahun);
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'Informasi yang Dikecualikan - ';
        $this->template->informasi_dikecualikan_tahun($data);
    }
    function download_dip()
    {
        $file = $this->uri->segment(3);
        force_download('assets/front/download/' . $file, NULL);
    }
    function download_peraturan()
    {
        $file = $this->uri->segment(3);
        force_download('assets/uploads/files/' . $file, NULL);
    }
    function peraturan_daerah()
    {
        // $key = $this->input->get('bentuk');

        $data['peraturan_daerah'] = $this->master->tampil_peraturan_daerah();
        $query_total = $this->master->tampil_total_tahun_peraturan_daerah();
        foreach ($query_total as $total) {
            $total_tahun[$total['tahun']] = $total['jumlah'];
        }
        $data['total_tahun'] = $total_tahun;
        $data['tahun'] = $this->master->tampil_tahun_peraturan_daerah();
        $data['bentuk'] = $this->master->tampil_bentuk_hukum();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'Peraturan Daerah - ';
        $data['ppid_active'] = 'active';
        // $this->general->testPre($total_tahun);
        // die();
        $this->template->peraturan_daerah($data);
    }
    function view_peraturan_daerah()
    {
        // $bentuk = $this->uri->segment(3);
        // $nomor = $this->uri->segment(4);
        // $tahun = $this->uri->segment(5);
        $id = $this->uri->segment(3);

        $data['peraturan_daerah'] = $this->master->detail_peraturan_daerah($id);
        $query_total = $this->master->tampil_total_tahun_peraturan_daerah();
        foreach ($query_total as $total) {
            $total_tahun[$total['tahun']] = $total['jumlah'];
        }
        $data['total_tahun'] = $total_tahun;
        $data['tahun'] = $this->master->tampil_tahun_peraturan_daerah();
        $data['bentuk'] = $this->master->tampil_bentuk_hukum();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'Peraturan Daerah - ';
        // $this->general->testPre($total_tahun);
        // die();
        $this->template->detail_peraturan_daerah($data);
    }
    function tahun_peraturan()
    {
        // $data['peraturan_daerah'] = $this->master->tampil_peraturan_daerah();
        $query_total = $this->master->tampil_total_tahun_peraturan_daerah();
        foreach ($query_total as $total) {
            $total_tahun[$total['tahun']] = $total['jumlah'];
        }
        $data['total_tahun'] = $total_tahun;
        $data['tahun'] = $this->master->tampil_tahun_peraturan_daerah();
        $data['tahun_peraturan'] = $this->master->tampil_tahun_peraturan();
        $data['bentuk'] = $this->master->tampil_bentuk_hukum();
        $data['tampil_fraksi'] = $this->master->tampil_fraksi();
        $data['tittle_head'] = 'Peraturan Daerah - ';
        // $this->general->testPre($total_tahun);
        // die();
        $this->template->tahun_peraturan($data);
    }
}
