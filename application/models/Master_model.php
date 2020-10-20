<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Master_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('grocery_CRUD');
        $this->load->model('General_model', 'general', true);
    }



    // TABEL SKPI USER-------------------------------
    function user()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('user');
        $crud->set_subject('User');
        $crud->required_fields("fullname", "username");
        $crud->field_type('password', 'password');
        $crud->callback_edit_field('password', array($this, 'set_password_input_to_empty'));
        $crud->callback_before_update(array($this, 'encrypt_password_callback'));
        $crud->set_field_upload('foto', 'assets/uploads/files/');
        $crud->callback_before_insert(array($this, 'encrypt_password_insert'));
        $output = $crud->render();
        $output->pengaturanActive = 'active';
        return $output;
    }

    function set_password_input_to_empty()
    {
        return "<input class=form-control type='password' name='password' value='' />";
    }
    function encrypt_password_insert($post_array)
    {
        $post_array['password'] = md5($post_array['password']);
        return $post_array;
    }
    function encrypt_password_callback($post_array, $primary_key)
    {
        if (!empty($post_array['password'])) {
            $post_array['password'] = md5($post_array['password']);
        } else {
            unset($post_array['password']);
        }

        return $post_array;
    }
    function updateProfile()
    {
        $foto = '';
        $changepassword = $this->input->post('changePassword', true);
        $password = $this->input->post('password', true);
        (empty($changepassword)) ? $pass = $password : $pass = md5($changepassword);
        if (!empty($_FILES["image"]["name"])) {
            $foto = $this->image = $this->uploadImage();
        }
        $data = array('password' => $pass);
        if (!empty($foto)) {
            $this->db->set('foto', $foto);
            $this->session->set_userdata('sipot_foto', $foto);
        }
        $this->db->where('id', $this->id)->update('sipot_pegawai', $data);
        //simpan sessionnya
        return true;
    }

    function uploadImage()
    {
        $config['upload_path']          = './assets/uploads/files/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']         = true;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }

        return "default.png";
    }
    // END TABEL SKPI USER-----------------------------------







    function master_jabatan()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('master_jabatan');
        $crud->set_subject('Jabatan');
        $crud->required_fields('nama');
        $output = $crud->render();
        $output->masterActive = 'active';
        return $output;
    }
    function master_fraksi()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('master_fraksi');
        $crud->set_subject('Fraksi');
        $crud->required_fields('nama');
        $crud->set_field_upload('foto', 'assets/uploads/files');
        $output = $crud->render();
        $output->masterActive = 'active';
        return $output;
    }
    function master_kategori()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('kategori');
        $crud->set_subject('Kategori');
        $crud->required_fields('nama');
        $crud->field_type('slug', 'invisible');
        $crud->callback_before_insert(array($this, 'slug_kategori_insert'));
        $crud->callback_before_update(array($this, 'slug_kategori_update'));
        $output = $crud->render();
        $output->masterActive = 'active';
        return $output;
    }
    function master_tag()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('master_tag');
        $crud->set_subject('Tag');
        $crud->required_fields('nama');
        $crud->field_type('slug', 'invisible');
        $crud->callback_before_insert(array($this, 'slug_kategori_insert'));
        $crud->callback_before_update(array($this, 'slug_kategori_update'));
        $output = $crud->render();
        $output->masterActive = 'active';
        return $output;
    }
    function master_image_slider()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('master_image_slider');
        $crud->set_subject('Image Slider');
        $crud->set_field_upload('gambar', 'assets/uploads/files');
        $output = $crud->render();
        $output->masterActive = 'active';
        return $output;
    }
    function master_footer()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('master_footer');
        $crud->set_subject('Footer');
        $output = $crud->render();
        $output->masterActive = 'active';
        return $output;
    }
    function slug_alat_insert($post_array)
    {
        $post_array['slug'] = $this->slug($post_array['konten']);
        return $post_array;
    }
    function slug_alat_update($post_array)
    {
        $post_array['slug'] = $this->slug($post_array['konten']);
        return $post_array;
    }
    function alat_kelengkapan_dewan()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('alat_kelengkapan_dewan');
        $crud->set_subject('Alat Kelengkapan Dewan');
        $crud->field_type('slug', 'invisible');
        $crud->callback_before_insert(array($this, 'slug_alat_insert'));
        $crud->callback_before_update(array($this, 'slug_alat_update'));
        $output = $crud->render();
        $output->masterActive = 'active';
        return $output;
    }

    function slug_kategori_insert($post_array)
    {
        $post_array['slug'] = $this->slug($post_array['nama']);
        return $post_array;
    }
    function slug_kategori_update($post_array)
    {
        $post_array['slug'] = $this->slug($post_array['nama']);
        return $post_array;
    }
    function berita()
    {
        $crud = new grocery_CRUD();
        $crud->columns('judul', 'isi', 'tanggal', 'thumbnail', 'kategori_id', 'tag', 'publish');
        $crud->add_action('Publish Article', '', 'admin/publishArticle', 'fa fa-check', '', 'confirm_type', 'Publish Article?');
        $crud->add_action('Jangan Publish Article', '', 'admin/tidakPublish', 'fa fa-times', '', 'confirm_type', 'Jangan Publish Article?');
        $crud->set_table('berita');
        $crud->set_subject('Berita');
        $crud->display_as('kategori_id', 'kategori');
        $crud->required_fields('judul');
        $crud->required_fields('tag');
        $crud->required_fields('kategori_id');
        $crud->required_fields('thumbnail');
        $crud->field_type('slug', 'invisible');
        $crud->field_type('tanggal', 'invisible');
        $crud->field_type('penulis', 'invisible');
        $crud->field_type('visitor', 'invisible');

        $crud->set_field_upload('thumbnail', 'assets/uploads/files');
        $crud->set_relation('kategori_id', 'kategori', 'nama');
        $crud->callback_before_insert(array($this, 'slug_before_insert_berita'));
        $crud->callback_before_update(array($this, 'slug_before_insert_berita'));
        $crud->callback_add_field('tag', function () {
            return $this->load->view('multiple_tag', '', true);
        });
        $crud->callback_edit_field('tag', function ($value, $primary_key) {
            return $this->load->view('multiple_tag', array('value' => $value), true);
        });
        // $crud->callback_before_update(array($this, 'slug_before_update'));
        $output = $crud->render();
        $output->beritaActive = 'active';
        return $output;
    }
    function slug_before_insert_berita($post_array)
    {
        $post_array['slug'] = $this->slug($post_array['judul']);
        $post_array['tag'] = implode(",", $post_array['tag']);
        $post_array['penulis'] = $this->session->userdata('admin_id');
        return $post_array;
    }
    function slug_before_update_berita($post_array)
    {
        $post_array['slug'] = $this->slug($post_array['judul']);
        $post_array['tag'] = implode(",", $post_array['tag']);
        $post_array['penulis'] = $this->session->userdata('admin_id');
        return $post_array;
    }
    function slug_before_insert($post_array)
    {
        $post_array['slug'] = $this->slug($post_array['judul']);
        $post_array['penulis'] = $this->session->userdata('admin_id');
        return $post_array;
    }
    function slug_before_update($post_array)
    {
        $post_array['slug'] = $this->slug($post_array['judul']);
        $post_array['penulis'] = $this->session->userdata('admin_id');
        return $post_array;
    }
    function slug($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        // trim
        $text = trim($text, '-');
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // lowercase
        $text = strtolower($text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text . '-' . rand(1, 1000);
    }
    function anggota_dprd()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('anggota_dprd');
        $crud->set_subject('Anggota DPRD');
        $crud->required_fields('nama');
        $crud->set_field_upload('foto', 'assets/uploads/files');
        $crud->set_relation('komisi', 'alat_kelengkapan_dewan', 'konten');
        // $crud->set_relation('komisi', 'alat_kelengkapan_dewan', 'konten', "konten like '%komisi%'", "");
        $crud->set_relation('id_fraksi', 'master_fraksi', 'nama');
        $crud->set_relation('id_jabatan', 'master_jabatan', 'nama');
        $output = $crud->render();
        $output->profilActive = 'active';
        return $output;
    }
    function struktur_organisasi()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('struktur_organisasi');
        $crud->set_subject('Struktur Organisasi');
        $crud->set_field_upload('gambar', 'assets/uploads/files');
        $crud->field_type('slug', 'invisible');
        $crud->callback_before_insert(array($this, 'slug_sebelum_insert'));
        $crud->callback_before_update(array($this, 'slug_sebelum_update'));
        $output = $crud->render();
        $output->profilActive = 'active';
        $output->sekretariatActive = 'active';
        return $output;
    }
    function tugas_dan_fungsi()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('tugas_dan_fungsi');
        $crud->set_subject('Tugas Dan Fungsi');
        $crud->field_type('slug', 'invisible');
        $crud->set_field_upload('gambar', 'assets/uploads/files/');
        $crud->callback_before_insert(array($this, 'slug_sebelum_insert'));
        $crud->callback_before_update(array($this, 'slug_sebelum_update'));
        $output = $crud->render();
        $output->profilActive = 'active';
        $output->sekretariatActive = 'active';
        return $output;
    }
    function profil_pejabat_struktural()
    {
        $crud = new grocery_CRUD();
        $crud->columns('nama', 'alamat', 'pendidikan_terakhir', 'diklat_penjenjangan', 'jabatan', 'diklat_penjenjangan', 'foto');
        $crud->set_table('profil_pejabat_struktural');
        $crud->set_subject('Profil Pejabat Struktural');
        $crud->set_field_upload('foto', 'assets/uploads/files/');
        $output = $crud->render();
        $output->profilActive = 'active';
        $output->sekretariatActive = 'active';
        return $output;
    }
    function pimpinan_dprd()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('pimpinan_dprd');
        $crud->set_subject('Pimpinan DPRD');
        $crud->field_type('slug', 'invisible');
        $crud->display_as('kategori_id', 'Kategori');
        $crud->set_relation('kategori_id', 'kategori', 'nama');
        $crud->callback_before_insert(array($this, 'slug_sebelum_insert'));
        $crud->callback_before_update(array($this, 'slug_sebelum_update'));
        $output = $crud->render();
        $output->profilActive = 'active';
        $output->kelengkapanActive = 'active';
        return $output;
    }
    function komisi_komisi()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('komisi_komisi');
        $crud->set_subject('Komisi-Komisi');
        $output = $crud->render();
        $output->profilActive = 'active';
        $output->kelengkapanActive = 'active';
        return $output;
    }
    function badan_anggaran()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('badan_anggaran');
        $crud->set_subject('Badan Anggaran');
        $output = $crud->render();
        $output->profilActive = 'active';
        $output->kelengkapanActive = 'active';
        return $output;
    }
    function badan_musyawarah()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('badan_musyawarah');
        $crud->set_subject('Badan Musyawarah');
        $output = $crud->render();
        $output->profilActive = 'active';
        $output->kelengkapanActive = 'active';
        return $output;
    }
    function badan_pembentuk_perda()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('badan_pembentuk_perda');
        $crud->set_subject('Badan Pembentuk Perda');
        $output = $crud->render();
        $output->profilActive = 'active';
        $output->kelengkapanActive = 'active';
        return $output;
    }
    function badan_kehormatan()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('badan_kehormatan');
        $crud->set_subject('Badan Kehormatan');
        $output = $crud->render();
        $output->profilActive = 'active';
        $output->kelengkapanActive = 'active';
        return $output;
    }
    function tatatertib_dprd()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('tatatertib_dprd');
        $crud->set_subject('Tata Tertib DPRD');
        $crud->set_field_upload('gambar', 'assets/uploads/files');
        $output = $crud->render();
        $output->profilActive = 'active';
        return $output;
    }
    function agenda_kerja()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('agenda_kerja');
        $crud->set_subject('Agenda Kerja DPRD');
        $output = $crud->render();
        $output->profilActive = 'active';
        return $output;
    }
    function rencana_ppid()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('rencana_ppid');
        $crud->set_subject('Kegiatan PPID');
        $output = $crud->render();
        $output->ppidActive = 'active';
        return $output;
    }
    function laporan_tahunan()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('laporan_tahunan');
        $crud->set_subject('Laporan_tahunan');
        // $crud->set_field_upload('upload_dokumen', 'assets/uploads/files');
        $output = $crud->render();
        $output->laporanActive = 'active';
        return $output;
    }
    function profil_dprd()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('profil_dprd');
        $crud->set_subject('Profil DPRD');
        $crud->field_type('slug', 'invisible');
        // $crud->set_field_upload('gambar', 'assets/uploads/files');
        $crud->callback_before_insert(array($this, 'slug_sebelum_insert'));
        $crud->callback_before_update(array($this, 'slug_sebelum_update'));
        $output = $crud->render();
        $output->profilActive = 'active';
        $output->kelengkapanActive = 'active';
        return $output;
    }
    function pedoman_ppid()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('pedoman_ppid');
        $crud->set_subject('Pedoman Umum PPID');
        $crud->set_field_upload('gambar', 'assets/uploads/files');
        $output = $crud->render();
        $output->ppidActive = 'active';
        return $output;
    }
    function sop_layanan_ppid()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('sop_layanan_ppid');
        $crud->set_subject('SOP Layanan PPID');
        $crud->set_field_upload('gambar', 'assets/uploads/files');
        $output = $crud->render();
        $output->informasiActive = 'active';
        return $output;
    }
    function peraturan_keterbukaan_informasi()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('peraturan_keterbukaan_informasi');
        $crud->set_subject('Peraturan Keterbukaan Informasi');
        $output = $crud->render();
        $output->ppidActive = 'active';
        $output->regulasiActive = 'active';
        return $output;
    }
    function peraturan_daerah()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('peraturan_daerah');
        $crud->set_subject('Peraturan');
        $crud->set_relation('bentuk_produk_hukum', 'master_bentuk_produk_hukum', 'judul');
        $crud->set_field_upload('upload_dokumen', 'assets/uploads/files');
        $crud->field_type('tanggal', 'invisible');
        $output = $crud->render();
        $output->ppidActive = 'active';
        $output->regulasiActive = 'active';
        return $output;
    }
    function peraturan_bupati()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('peraturan_bupati');
        $crud->set_subject('Peraturan Bupati');
        $crud->field_type('slug', 'invisible');
        $crud->set_field_upload('gambar', 'assets/uploads/files');
        $crud->callback_before_insert(array($this, 'slug_sebelum_insert'));
        $crud->callback_before_update(array($this, 'slug_sebelum_update'));
        $output = $crud->render();
        $output->ppidActive = 'active';
        $output->regulasiActive = 'active';
        return $output;
    }
    function slug_sebelum_insert($post_array)
    {
        $post_array['slug'] = $this->slug($post_array['judul']);
        return $post_array;
    }
    function slug_sebelum_update($post_array)
    {
        $post_array['slug'] = $this->slug($post_array['judul']);
        return $post_array;
    }
    function kontak()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('master_kontak');
        $crud->set_subject('Kontak');
        $output = $crud->render();
        $output->pengaturanActive = 'active';
        return $output;
    }
    function twitter()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('sosmed');
        $crud->set_subject('Akun Sosial Media');
        $output = $crud->render();
        $output->pengaturanActive = 'active';
        return $output;
    }
    function alamat()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('alamat');
        $crud->set_subject('Alamat');
        $output = $crud->render();
        $output->pengaturanActive = 'active';
        return $output;
    }
    function tentang()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('sekretariat_dprd');
        $crud->set_subject('Sekretariat DPRD');
        $output = $crud->render();
        $output->pengaturanActive = 'active';
        return $output;
    }
    function email()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('email');
        $crud->set_subject('E-Mail');
        $output = $crud->render();
        $output->pengaturanActive = 'active';
        return $output;
    }
    function website()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('website_terkait');
        $crud->set_subject('Website Terkait');
        $output = $crud->render();
        $output->pengaturanActive = 'active';
        return $output;
    }
    function profil_badan_publik()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('profil_badan_publik');
        $crud->set_subject('Profil Badan Publik');
        $output = $crud->render();
        $output->ppidActive = 'active';
        return $output;
    }
    function profil_ppid_pembantu()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('profil_ppid_pembantu');
        $crud->set_subject('Profil PPID Pembantu');
        $crud->field_type('slug', 'invisible');
        $crud->set_field_upload('gambar', 'assets/uploads/files');
        $crud->callback_before_insert(array($this, 'slug_sebelum_insert'));
        $crud->callback_before_update(array($this, 'slug_sebelum_update'));
        $output = $crud->render();
        $output->ppidActive = 'active';
        return $output;
    }
    // function sk_ppid_pembantu()
    // {
    //     $crud = new grocery_CRUD();
    //     $crud->set_table('sk_ppid_pembantu');
    //     $crud->set_subject('SK PPID Pembantu');
    //     $crud->set_field_upload('upload_file', 'assets/front/download');
    //     $output = $crud->render();
    //     $output->ppidActive = 'active';
    //     return $output;
    // }
    function struktur_ppid_pembantu()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('struktur_ppid_pembantu');
        $crud->set_subject('Struktur PPID Pembantu');
        $crud->set_field_upload('image', 'assets/uploads/files');
        $crud->field_type('slug', 'invisible');
        $crud->callback_before_insert(array($this, 'slug_sebelum_insert'));
        $crud->callback_before_update(array($this, 'slug_sebelum_update'));
        $output = $crud->render();
        $output->ppidActive = 'active';
        return $output;
    }
    function rencana_kerja_ppid()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('rencana_kerja_ppid');
        $crud->set_subject('Rencana Kerja PPID');
        $crud->field_type('slug', 'invisible');
        $crud->callback_before_insert(array($this, 'slug_sebelum_insert'));
        $crud->callback_before_update(array($this, 'slug_sebelum_update'));
        $output = $crud->render();
        $output->ppidActive = 'active';
        return $output;
    }
    function form_permohonan()
    {
        $crud = new grocery_CRUD();
        $crud->add_action('Permohonan Diterima', '', 'admin/setDiterima', 'fa fa-check', '', 'confirm_type', 'Terima pengajuan permohonan informasi?');
        $crud->add_action('Permohonan Ditolak', '', 'admin/setDitolak', 'fa fa-times', '', 'confirm_type', 'Tolak pengajuan permohonan informasi?');
        $crud->add_action('Tanggal Pengambilan', '', 'admin/setTanggal', 'fa fa-calendar', '', 'ajax_type', '');

        // $crud->add_multi_button('Pasang Jadwal', 'admin/formPasangJadwal', 'fa fa-calendar', false, 'Pasang Jadwal', 'anda akan pasang jadwal', 'ajax_type');
        $crud->columns('nomor', 'nama_depan', 'nama_belakang', 'alamat', 'no_telpon', 'upload_pengantar', 'status', 'tanggal_pengambilan');
        $crud->set_table('formulir_permohonan_informasi');
        $crud->set_subject('Formulir Permohonan Informasi');
        $crud->field_type('timestamp', 'invisible');
        $crud->field_type('status', 'invisible');
        $crud->set_field_upload('upload_ktp', 'assets/uploads/files');
        $crud->set_field_upload('upload_pengantar', 'assets/uploads/files');
        $crud->callback_add_field('cara_memperoleh', array($this, 'add_field_callback_1'));
        // $crud->callback_edit_field('cara_memperoleh', array($this, 'edit_field_callback_1'));
        // $crud->callback_edit_field('cara_memperoleh', function ($value, $primary_key) {
        //     return $this->load->view('callback/editcheckbox', array('value' => $value), true);
        // });
        $output = $crud->render();

        $output->informasiActive = 'active';
        $output->formulirActive = 'active';
        return $output;
    }

    function add_field_callback_1()
    {
        return ' <input type="checkbox" name="cara_memperoleh[]" value="Melihat/Membaca/Mendengarkan/Mencatat"> Melihat/Membaca/Mendengarkan/Mencatat <br>
                 <input type="checkbox" name="cara_memperoleh[]" value="Mendapatkan salinan informasi hardcopy/ softcopy"> Mendapatkan salinan informasi hardcopy/ softcopy';
    }
    function edit_field_callback_1()
    {
        return $this->load->view('callback/editcheckbox', '', true);
    }

    function form_pengajuan()
    {
        $crud = new grocery_CRUD();
        $crud->columns('nama_depan', 'nama_belakang', 'email', 'no_telpon', 'upload_ktp', 'status', 'tanggal_pengambilan');
        $crud->add_action('Permohonan Diterima', '', 'admin/setDiterimaPengajuan', 'fa fa-check', '', 'confirm_type', 'Terima pengajuan permohonan informasi?');
        $crud->add_action('Permohonan Ditolak', '', 'admin/setDitolakPengajuan', 'fa fa-times', '', 'confirm_type', 'Tolak pengajuan permohonan informasi?');
        $crud->add_action('Tanggal Pengambilan', '', 'admin/setTanggalPengajuan', 'fa fa-calendar', '', 'ajax_type', '');

        $crud->set_table('formulir_pengajuan_keberatan');
        $crud->set_subject('Formulir Pengajuan Keberatan');
        $crud->field_type('timestamp', 'invisible');
        $crud->set_field_upload('upload_ktp', 'assets/uploads/files');
        $crud->set_field_upload('upload_lampiran', 'assets/uploads/files');
        $crud->callback_add_field('alasan_keberatan', array($this, 'add_field_callback_1'));
        $output = $crud->render();
        $output->informasiActive = 'active';
        $output->formulirActive = 'active';
        return $output;
    }
    function form_survey_pelayanan()
    {
        $crud = new grocery_CRUD();
        $crud->columns('nama_depan', 'nama_belakang', 'email', 'no_telepon', 'pekerjaan', 'jenis_pelayanan', 'saran');

        // $crud->add_action('Permohonan Diterima', '', 'admin/setDiterimaPengajuan', 'fa fa-check', '', 'confirm_type', 'Terima pengajuan permohonan informasi?');
        // $crud->add_action('Permohonan Ditolak', '', 'admin/setDitolakPengajuan', 'fa fa-times', '', 'confirm_type', 'Tolak pengajuan permohonan informasi?');
        // $crud->add_action('Tanggal Pengambilan', '', 'admin/setTanggalPengajuan', 'fa fa-calendar', '', 'ajax_type', '');
        $crud->add_action('Detail', '', 'admin/detail_survey', 'fa fa-check', '', 'emodal_type', 'Terima pengajuan permohonan informasi?');
        $crud->set_table('formulir_survey_pelayanan');
        $crud->set_subject('Formulir Survey Pelayanan');
        $crud->field_type('waktu', 'invisible');
        // $crud->callback_add_field('alasan_keberatan', array($this, 'add_field_callback_1'));
        // $crud->set_relation()
        $crud->unset_add();
        $crud->unset_edit();

        $output = $crud->render();
        $output->informasiActive = 'active';
        $output->formulirActive = 'active';
        return $output;
    }
    function detail_survey($id)
    {
        $crud = new grocery_CRUD();
        $crud->where('id_responden', $id);
        $crud->set_table('jawaban_survey_pelayanan');
        $crud->display_as('id_responden', 'Nama Responden');
        $crud->display_as('id_Pertanyaan', 'Pertanyaan');
        $crud->set_relation('id_responden', 'formulir_survey_pelayanan', '{nama_depan} {nama_belakang}');
        $crud->set_relation('id_pertanyaan', 'pertanyaan_survey_pelayanan', 'pertanyaan');
        $crud->callback_column('jawaban', array($this, 'callback_jawaban'));
        $crud->unset_add();
        $crud->unset_edit();

        $output = $crud->render();
        $output->informasiActive = 'active';
        $output->formulirActive = 'active';
        return $output;
    }
    public function callback_jawaban($value, $row)
    {
        switch ($value) {
            case "1":
                $hasil = 'Kurang Sekali';
                break;
            case "2":
                $hasil = 'Kurang';
                break;
            case "3":
                $hasil = 'Biasa';
                break;
            case "4":
                $hasil = 'Bagus';
                break;
            case "5":
                $hasil = 'Sangat Bagus';
                break;
        }
        return $hasil;
    }
    function form_kepuasan()
    {
        $crud = new grocery_CRUD();
        $crud->add_action('Formulir Diterima', '', 'admin/setDiterimaKepuasan', 'fa fa-check', '', 'confirm_type', 'Terima pengajuan permohonan informasi?');
        $crud->add_action('Formulir Ditolak', '', 'admin/setDitolakKepuasan', 'fa fa-times', '', 'confirm_type', 'Tolak pengajuan permohonan informasi?');

        $crud->set_table('formulir_kepuasan_masyarakat');
        $crud->set_subject('Formulir Kepuasan Masyarakat');
        $crud->field_type('waktu', 'invisible');
        $crud->callback_add_field('nilai_pelayanan', array($this, 'add_field_callback_pelayanan'));
        $output = $crud->render();
        $output->informasiActive = 'active';
        $output->formulirActive = 'active';
        return $output;
    }
    function add_field_callback_pelayanan()
    {
        return '<div class="radio">
                  <label><input type="radio" name="nilai_pelayanan" id="nilai_pelayanan" value="Sangat Baik"> Sangat Baik</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="nilai_pelayanan" id="nilai_pelayanan" value="Baik"> Baik</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="nilai_pelayanan" id="nilai_pelayanan" value="Cukup Baik"> Cukup Baik</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="nilai_pelayanan" id="nilai_pelayanan" value="Tidak Baik"> Tidak Baik</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="nilai_pelayanan" id="nilai_pelayanan" value="Sangat Tidak Baik"> Sangat Tidak Baik</label>
                </div>';
    }
    function daftar_informasi_publik()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('daftar_informasi_publik');
        $crud->set_subject('Daftar Informasi Publik');
        $crud->set_field_upload('upload_dokumen', 'assets/front/download');
        $output = $crud->render();
        $output->informasiActive = 'active';
        return $output;
    }
    function informasi_berkala()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('informasi_berkala');
        $crud->set_subject('Informasi Berkala');
        $output = $crud->render();
        $output->informasiActive = 'active';
        $output->ragamActive = 'active';
        return $output;
    }
    function informasi_serta_merta()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('informasi_serta_merta');
        $crud->set_subject('Informasi Serta Merta');
        $output = $crud->render();
        $output->informasiActive = 'active';
        $output->ragamActive = 'active';
        return $output;
    }
    function informasi_setiap_saat()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('informasi_setiap_saat');
        $crud->set_subject('Informasi Setiap Saat');
        $output = $crud->render();
        $output->informasiActive = 'active';
        $output->ragamActive = 'active';
        return $output;
    }
    function data_formulir_offline()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('formulir_permohonan_informasi_offline');
        $crud->set_subject('Formulir Offline');
        $crud->set_field_upload('upload_formulir', 'assets/front/download');
        $output = $crud->render();
        $output->informasiActive = 'active';
        $output->ragamActive = 'active';
        return $output;
    }
    function sk_ppid()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('sk_ppid');
        $crud->set_subject('SK PPID Pembantu');
        $crud->set_field_upload('upload_dokumen', 'assets/front/download');
        $output = $crud->render();
        $output->ppidActive = 'active';
        return $output;
    }
    function laporan_keuangan()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('laporan_keuangan');
        $crud->set_subject('Laporan Keuangan');
        $crud->field_type('tanggal', 'invisible');
        $crud->field_type('author', 'invisible');
        $crud->display_as('isi', 'Isi Laporan');
        $crud->required_fields('judul');
        $crud->required_fields('tahun');
        $crud->required_fields('ringkasan');
        $crud->required_fields('tanggal');
        $crud->required_fields('thumbnail');
        $crud->set_field_upload('thumbnail', 'assets/front/download');
        $crud->callback_before_insert(array($this, 'insert_penulis'));
        $crud->callback_before_update(array($this, 'update_penulis'));
        // $crud->set_relation('author', 'user', 'fullname');
        $output = $crud->render();
        $output->laporanActive = 'active';
        return $output;
    }
    function insert_penulis($post_array)
    {
        $post_array['author'] = $this->session->userdata('admin_id');
        return $post_array;
    }
    function update_penulis($post_array)
    {
        $post_array['author'] = $this->session->userdata('admin_id');
        return $post_array;
    }
    function informasi_dikecualikan()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('informasi_dikecualikan');
        $crud->set_subject('Informasi Yang Dikecualikan');
        $crud->display_as('informasi_dikecualikan', 'Informasi yang Dikecualikan');
        $crud->display_as('uji_konsekuensi', 'Draft Uji Konsekuensi');
        $crud->display_as('naskah_pertimbangan', 'Dokumen Naskah Pertimbangan');
        $crud->display_as('sk_informasi_dikecualikan', 'SK Kepala Dinas Tentang Penetapan Informasi yang Dikecualikan');

        $crud->set_field_upload('informasi_dikecualikan', 'assets/front/download');
        $crud->set_field_upload('uji_konsekuensi', 'assets/front/download');
        $crud->set_field_upload('naskah_pertimbangan', 'assets/front/download');
        $crud->set_field_upload('sk_informasi_dikecualikan', 'assets/front/download');
        $output = $crud->render();
        $output->informasiActive = 'active';
        $output->ragamActive = 'active';
        return $output;
    }
    function foto_informasi_dikecualikan()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('foto_informasi_dikecualikan');
        $crud->set_subject('Foto Kegiatan');
        $crud->set_field_upload('foto', 'assets/front/download');
        $output = $crud->render();
        $output->informasiActive = 'active';
        $output->ragamActive = 'active';
        return $output;
    }
    function master_bentuk_produk_hukum()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('master_bentuk_produk_hukum');
        $crud->display_as('judul', 'Bentuk Produk Hukum');
        $crud->set_subject('Master Bentuk Produk Hukum');
        $crud->field_type('slug', 'invisible');
        $crud->callback_before_insert(array($this, 'slug_sebelum_insert'));
        $crud->callback_before_update(array($this, 'slug_sebelum_update'));
        $output = $crud->render();
        $output->masterActive = 'active';
        return $output;
    }
    function master_pertanyaan_survey_pelayanan()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('pertanyaan_survey_pelayanan');
        $crud->set_subject('Pertanyaan Survey Pelayanan');
        $output = $crud->render();
        $output->masterActive = 'active';
        return $output;
    }


    // END MODEL ADMIN==========================================================================================
















    // MODEL FRONT===============================================================================================


    public function tampil_berita()
    {
        $this->db->select('berita.id, berita.judul, berita.slug, berita.isi, berita.tanggal, berita.thumbnail, kategori.nama, user.fullname,  user.deskripsi');
        $this->db->from('berita');
        $this->db->join('kategori', 'berita.kategori_id = kategori.id');
        $this->db->join('user', 'user.id = berita.penulis');
        $this->db->order_by('berita.id', 'desc');
        $this->db->where('berita.publish', 'Publish');
        $this->db->limit(6);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function semua_berita()
    {
        $this->db->select('id, slug,thumbnail');
        $this->db->from('berita');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_komentar($slug)
    {
        $this->db->select('*');
        $this->db->from('komentar');
        $this->db->where('id_berita', $slug);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('nama');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_page_berita($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->select('berita.id, berita.publish, berita.judul, berita.slug, berita.isi, berita.tanggal, berita.thumbnail, kategori.nama, user.fullname,  user.deskripsi');
            $this->db->from('berita');
            $this->db->join('kategori', 'berita.kategori_id = kategori.id');
            $this->db->join('user', 'user.id = berita.penulis');
            $this->db->like('berita.judul', $keyword);
            $this->db->where('berita.publish', 'Publish');
            $this->db->limit($limit, $start);
            $this->db->order_by('berita.id', 'desc');
            $query = $this->db->get();
            return $query->result_array();
        }
        $this->db->select('berita.id, berita.publish, berita.judul, berita.slug, berita.isi, berita.tanggal, berita.thumbnail, kategori.nama, user.fullname,  user.deskripsi');
        $this->db->from('berita');
        $this->db->join('kategori', 'berita.kategori_id = kategori.id');
        $this->db->join('user', 'user.id = berita.penulis');
        $this->db->where('berita.publish', 'Publish');
        $this->db->limit($limit, $start);
        $this->db->order_by('berita.id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function popular($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->select('berita.id, berita.publish, berita.visitor, berita.judul, berita.slug, berita.isi, berita.tanggal, berita.thumbnail, kategori.nama, user.fullname,  user.deskripsi');
            $this->db->from('berita');
            $this->db->join('kategori', 'berita.kategori_id = kategori.id');
            $this->db->join('user', 'user.id = berita.penulis');
            $this->db->where('berita.publish', 'Publish');
            $this->db->like('berita.judul', $keyword);
            $this->db->limit($limit, $start);
            $this->db->order_by('berita.visitor', 'desc');
            $query = $this->db->get();
            return $query->result_array();
        }
        $this->db->select('berita.id, berita.publish, berita.judul, berita.slug, berita.isi, berita.tanggal, berita.thumbnail, kategori.nama, user.fullname,  user.deskripsi');
        $this->db->from('berita');
        $this->db->join('kategori', 'berita.kategori_id = kategori.id');
        $this->db->join('user', 'user.id = berita.penulis');
        $this->db->where('berita.publish', 'Publish');
        $this->db->limit($limit, $start);
        $this->db->order_by('berita.visitor', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_page_berita_kategori($limit, $start, $keyword = null, $kategori)
    {
        if ($keyword) {
            $this->db->select('berita.id, berita.publish, berita.judul, berita.slug, berita.isi, berita.tanggal, berita.thumbnail, kategori.nama, kategori.slug AS `kategori_slug`, user.fullname,  user.deskripsi');
            $this->db->from('berita');
            $this->db->join('kategori', 'berita.kategori_id = kategori.id');
            $this->db->join('user', 'user.id = berita.penulis');
            $this->db->like('berita.judul', $keyword);
            $this->db->where('kategori.slug', $kategori);
            $this->db->where('berita.publish', 'Publish');
            $this->db->order_by('berita.id', 'desc');
            $this->db->limit($limit, $start);
            $query = $this->db->get();
            return $query->result_array();
        }
        $this->db->select('berita.id, berita.publish, berita.judul, berita.slug, berita.isi, berita.tanggal, berita.thumbnail, kategori.nama, kategori.slug AS `kategori_slug`, user.fullname,  user.deskripsi');
        $this->db->from('berita');
        $this->db->join('kategori', 'berita.kategori_id = kategori.id');
        $this->db->join('user', 'user.id = berita.penulis');
        $this->db->where('kategori.slug', $kategori);
        $this->db->where('berita.publish', 'Publish');
        $this->db->order_by('berita.id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function countAllBerita()
    {
        return $this->db->get('berita')->num_rows();
    }
    public function tampil_berita_popular()
    {
        $this->db->select('berita.judul, berita.slug, berita.isi, berita.tanggal, berita.thumbnail, kategori.nama, user.fullname,  user.deskripsi');
        $this->db->from('berita');
        $this->db->join('kategori', 'berita.kategori_id = kategori.id');
        $this->db->join('user', 'user.id = berita.penulis');
        $this->db->order_by('visitor', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function image_slider()
    {
        $this->db->select('*');
        $this->db->from('master_image_slider');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_list_web()
    {
        $this->db->select('*');
        $this->db->from('website_terkait');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_tentang()
    {
        $this->db->select('*');
        $this->db->from('sekretariat_dprd');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_kontak()
    {
        $this->db->select('*');
        $this->db->from('kontak');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_alamat()
    {
        $this->db->select('*');
        $this->db->from('alamat');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_email()
    {
        $this->db->select('*');
        $this->db->from('email');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_twitter()
    {
        $this->db->select('*');
        $this->db->from('sosmed');
        $this->db->where('jenis_akun', 'Twitter');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function tampil_facebook()
    {
        $this->db->select('*');
        $this->db->from('sosmed');
        $this->db->where('jenis_akun', 'Facebook');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function tampil_instagram()
    {
        $this->db->select('*');
        $this->db->from('sosmed');
        $this->db->where('jenis_akun', 'Instagram');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function kelengkapan_dewan()
    {
        $this->db->select('*');
        $this->db->from('alat_kelengkapan_dewan');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_fraksi()
    {
        $this->db->select('*');
        $this->db->from('master_fraksi');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function pertanyaan()
    {
        $this->db->select('*');
        $this->db->from('pertanyaan_survey_pelayanan');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function detailBerita($slug)
    {
        $this->db->select('berita.id, berita.judul, berita.slug, berita.isi, berita.tanggal, berita.thumbnail, kategori.nama, user.fullname,  user.deskripsi, berita.tag');
        // , master_tag.nama AS `tag`
        $this->db->from('berita');
        $this->db->join('kategori', 'berita.kategori_id = kategori.id');
        $this->db->join('user', 'user.id = berita.penulis');
        // $this->db->join('master_tag', 'master_tag.id = berita.tag');
        $this->db->where('berita.slug', $slug);
        $query = $this->db->get();
        return $query->row_array();
    }
    function update_counter($slug)
    {
        // return current article views 
        $this->db->where('slug', $slug);
        $this->db->select('visitor');
        $count = $this->db->get('berita')->row();
        // then increase by one 
        $this->db->where('slug', $slug);
        $this->db->set('visitor', ($count->visitor + 1));
        $this->db->update('berita');
    }
    public function tampil_anggota_dprd()
    {
        $this->db->select('anggota_dprd.nama AS `nama`, year(anggota_dprd.periode_awal) as `periode_awal`, year(anggota_dprd.periode_akhir) as `periode_akhir`, anggota_dprd.foto, master_jabatan.nama AS `jabatan`, master_fraksi.nama AS `fraksi`');
        $this->db->from('anggota_dprd');
        $this->db->join('master_jabatan', 'master_jabatan.id = anggota_dprd.id_jabatan');
        $this->db->join('master_fraksi', 'master_fraksi.id = anggota_dprd.id_fraksi');
        $hari_sekarang = date('Y-m-d');
        $this->db->where("periode_akhir >='$hari_sekarang'");
        $query = $this->db->get();
        return $query->result_array();
    }
    public function recent_list_berita()
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where('publish', "Publish");
        $this->db->limit(5);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function recentBerita($slug)
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where_not_in('slug', $slug);
        $this->db->where('publish', 'Publish');
        $this->db->order_by('id', 'desc');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function add_form_permohonan($data)
    {
        $query = $this->db->insert('formulir_permohonan_informasi', $data);
        if (!$query) {
            echo "<script>alert('Permohonan gagal di unggah!');</script>";
        } else {
            echo "<script>alert('Permohonan berhasil di unggah!');</script>";
        }
        redirect('Front/formulir_permohonan_online', 'refresh');
        return $query;
    }

    public function add_form_pengajuan($data)
    {
        $query = $this->db->insert('formulir_pengajuan_keberatan', $data);
        if (!$query) {
            echo "<script>alert('Permohonan gagal di unggah!');</script>";
        } else {
            echo "<script>alert('Permohonan berhasil di unggah!');</script>";
        }
        redirect('Front/formulir_pengajuan_keberatan', 'refresh');
        return $query;
    }
    public function add_form_kepuasan($data)
    {
        $query = $this->db->insert('formulir_kepuasan_masyarakat', $data);
        if (!$query) {
            echo "<script>alert('Data Kuisioner gagal di unggah!');</script>";
        } else {
            echo "<script>alert('Data Kuisioner berhasil di unggah!');</script>";
        }
        redirect('Front/formulir_kepuasan_masyarakat', 'refresh');
        return $query;
    }
    public function add_form_survey($data)
    {
        $query = $this->db->insert('formulir_survey_pelayanan', $data);
        $insert_id = $this->db->insert_id();
        $soal = $this->input->post('soal');
        foreach ($soal as $key => $value) {
            $detail[] = array(
                'id_responden' => $insert_id,
                'id_pertanyaan' => $key,
                'jawaban' => $value
            );
        }
        $this->db->insert_batch('jawaban_survey_pelayanan', $detail);
        if ($query) {
            $this->session->set_flashdata('pesan_sukses', 'Data survey pelayanan berhasil disimpan');
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Data survey pelayanan gagal disimpan');
        }

        redirect('Front/formulir_survey_pelayanan', 'refresh');
        return $query;
    }

    public function tampil_informasi_publik()
    {
        $this->db->select('*`');
        $this->db->from('daftar_informasi_publik');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_informasi_berkala()
    {
        $this->db->select('*`');
        $this->db->from('informasi_berkala');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_informasi_serta_merta()
    {
        $this->db->select('*`');
        $this->db->from('informasi_serta_merta');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_informasi_setiap_saat()
    {
        $this->db->select('*`');
        $this->db->from('informasi_setiap_saat');
        $query = $this->db->get();
        return $query->result_array();
    }
    // public function tampil_badan_anggaran()
    // {
    //     $this->db->select('anggota_dprd.nama AS `nama`, anggota_dprd.foto, master_jabatan.nama AS `jabatan`, master_fraksi.nama AS `fraksi`, alat_kelengkapan_dewan.konten AS `komisi`');
    //     $this->db->from('anggota_dprd');
    //     $this->db->join('master_jabatan', 'master_jabatan.id = anggota_dprd.id_jabatan');
    //     $this->db->join('master_fraksi', 'master_fraksi.id = anggota_dprd.id_fraksi');
    //     $this->db->join('alat_kelengkapan_dewan', 'alat_kelengkapan_dewan.id = anggota_dprd.komisi');
    //     $this->db->where('alat_kelengkapan_dewan.konten', 'Badan Anggaran');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }
    public function tampil_badan_anggaran()
    {
        $this->db->select('*');
        $this->db->from('badan_anggaran');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_badan_musyawarah()
    {
        $this->db->select('*');
        $this->db->from('badan_musyawarah');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_badan_pembentuk_perda()
    {
        $this->db->select('*');
        $this->db->from('badan_pembentuk_perda');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_badan_kehormatan()
    {
        $this->db->select('*');
        $this->db->from('badan_kehormatan');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_struktur_organisasi()
    {
        $this->db->select('*');
        $this->db->from('struktur_organisasi');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_tugas_dan_fungsi()
    {
        $this->db->select('*');
        $this->db->from('tugas_dan_fungsi');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_profil_pejabat_struktural()
    {
        $this->db->select("id, nama, alamat, tempat_lahir, tanggal_lahir, pendidikan_terakhir, nip, no_sk, jabatan, jabatan_lengkap, pangkat_golongan, pensiun, diklat_penjenjangan, penghargaan,foto, year(periode_awal) as `periode_awal`, year(periode_akhir) as `periode_akhir`");
        $this->db->from('profil_pejabat_struktural');
        $hari_sekarang = date('Y-m-d');
        $this->db->where("periode_akhir >='$hari_sekarang'");
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_komisi_komisi($limit, $start)
    {
        $this->db->select('berita.id, berita.judul, berita.slug, berita.isi, berita.tanggal, berita.thumbnail, kategori.nama, user.fullname,  user.deskripsi, berita.tag');
        $this->db->from('berita');
        $this->db->join('kategori', 'berita.kategori_id = kategori.id');
        $this->db->join('user', 'user.id = berita.penulis');
        // $this->db->join('master_tag', 'master_tag.id = berita.tag');
        $this->db->like('berita.tag', 'komisi');
        // $this->db->where('berita.publis', 'komisi');
        $this->db->order_by('berita.id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function data_pimpinan_dprd()
    {
        $this->db->select('berita.judul, berita.slug, berita.isi, berita.tanggal, berita.thumbnail, kategori.nama, user.fullname,  user.deskripsi, berita.tag');
        $this->db->from('berita');
        $this->db->join('kategori', 'berita.kategori_id = kategori.id');
        $this->db->join('user', 'user.id = berita.penulis');
        // $this->db->join('master_tag', 'master_tag.id = berita.tag');
        $this->db->like('kategori.nama', 'Alat Kelengkapan DPRD');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_agenda_kerja()
    {
        $this->db->select('*');
        $this->db->from('agenda_kerja');
        $this->db->limit(6);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_rencana_ppid()
    {
        $this->db->select('*');
        $this->db->from('rencana_ppid');
        $this->db->limit(6);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_laporan_tahunan_dprd()
    {
        $this->db->select('*');
        $this->db->from('laporan_tahunan');
        $this->db->limit(6);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_profil_dprd()
    {
        $this->db->select('*');
        $this->db->from('profil_dprd');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_profil_ppid_pembantu()
    {
        $this->db->select('*');
        $this->db->from('profil_ppid_pembantu');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_list_laporan_keuangan()
    {
        $this->db->select('*');
        $this->db->from('laporan_keuangan');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_laporan_keuangan($id)
    {
        $this->db->select('a.judul, a.tahun, a.ringkasan, a.tanggal, a.thumbnail, a.isi, b.fullname, b.username');
        $this->db->from('laporan_keuangan AS `a`');
        $this->db->join('user AS `b`', 'a.author = b.id');
        $this->db->where('a.id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_peraturan_keterbukaan_informasi()
    {
        $this->db->select('*');
        $this->db->from('peraturan_keterbukaan_informasi');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_struktur_ppid()
    {
        $this->db->select('*');
        $this->db->from('struktur_ppid_pembantu');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function add_komentar($data)
    {
        $query = $this->db->insert('komentar', $data);
        if (!$query) {
            echo "<script>alert('Komentar gagal di kirim!');</script>";
        } else {
            echo "<script>alert('Komentar berhasil di kirim!');</script>";
        }
        redirect('Front/listBerita', 'refresh');
        return $query;
    }
    public function tampil_sop_ppid()
    {
        $this->db->select('*');
        $this->db->from('sop_layanan_ppid');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_tata_tertib_dprd()
    {
        $this->db->select('*');
        $this->db->from('tatatertib_dprd');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_pedoman_ppid()
    {
        $this->db->select('*');
        $this->db->from('pedoman_ppid');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_profil_badan_publik()
    {
        $this->db->select('*');
        $this->db->from('profil_badan_publik');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_informasi_dikecualikan()
    {
        // $filter = $this->db->select('*')->from('informasi_dikecualikan')->where('informasi_dikecualikan', $data['nisn'])->get()->num_rows();

        $this->db->select('*');
        $this->db->from('informasi_dikecualikan');
        $this->db->order_by('tahun', 'DESC');
        // $this->db->where('tahun', '2019');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_informasi_dikecualikan_tahun($tahun)
    {
        // $filter = $this->db->select('*')->from('informasi_dikecualikan')->where('informasi_dikecualikan', $data['nisn'])->get()->num_rows();

        $this->db->select('*');
        $this->db->from('informasi_dikecualikan');
        $this->db->where('tahun', $tahun);
        // $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function data_tahun()
    {

        $this->db->select('tahun');
        $this->db->from('informasi_dikecualikan');
        $this->db->order_by('tahun', 'DESC');
        $this->db->limit(1);
        $ex = $this->db->get()->result_array();

        foreach ($ex as $a) {
            $tahun = $a['tahun'];
        }

        $this->db->select('*');
        $this->db->from('informasi_dikecualikan');
        $this->db->order_by('tahun', 'DESC');
        $this->db->where_not_in('tahun', $tahun);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function data_tahun_dt($tahun)
    {

        $this->db->select('tahun');
        $this->db->from('informasi_dikecualikan');
        $this->db->where('tahun', $tahun);
        $this->db->limit(1);
        $ex = $this->db->get()->result_array();

        foreach ($ex as $a) {
            $tahuna = $a['tahun'];
        }

        $this->db->select('*');
        $this->db->from('informasi_dikecualikan');
        $this->db->order_by('tahun', 'DESC');
        $this->db->where_not_in('tahun', $tahuna);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_foto_informasi_dikecualikan()
    {
        $this->db->select('*');
        $this->db->from('foto_informasi_dikecualikan');
        $this->db->where('tahun', '2020');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_foto_informasi_dikecualikan_tahun($tahun)
    {
        $this->db->select('*');
        $this->db->from('foto_informasi_dikecualikan');
        $this->db->where('tahun', $tahun);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function arsip_naskah($tahun)
    {
        $this->db->select('*');
        $this->db->from('informasi_dikecualikan');
        $this->db->where_not_in('tahun', $tahun);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_peraturan_daerah()
    {
        $bentuk = @$this->input->get('bentuk');
        $tahun = @$this->input->get('tahun');
        $nomor = @$this->input->get('nomor');
        $tentang = @$this->input->get('tentang');

        if (!empty($bentuk)) {
            $this->db->like('b.slug', $bentuk);
        }
        if (!empty($tahun)) {
            $this->db->like('a.tahun', $tahun);
        }
        if (!empty($nomor)) {
            $this->db->like('a.no_peraturan', $nomor);
        }
        if (!empty($tentang)) {
            $this->db->like('a.tentang', $tentang);
        }
        $this->db->select('a.id, a.bentuk_produk_hukum, a.no_peraturan, a.tahun, a.tentang, a.upload_dokumen, a.tanggal, b.judul, b.slug');
        $this->db->from('peraturan_daerah as `a`');
        $this->db->join('master_bentuk_produk_hukum as `b`', 'a.bentuk_produk_hukum = b.id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_tahun_peraturan_daerah()
    {
        $this->db->select('tahun');
        $this->db->from('peraturan_daerah');
        $this->db->group_by('tahun');
        $this->db->limit(9);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_tahun_peraturan()
    {
        $this->db->select('tahun');
        $this->db->from('peraturan_daerah');
        $this->db->group_by('tahun');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function detail_peraturan_daerah($id)
    {
        $this->db->select('a.id, a.bentuk_produk_hukum, a.no_peraturan, a.tahun, a.tentang, a.upload_dokumen, a.tanggal, b.judul, b.slug');
        $this->db->from('peraturan_daerah as `a`');
        $this->db->join('master_bentuk_produk_hukum as `b`', 'a.bentuk_produk_hukum = b.id');
        $this->db->where('a.id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_total_tahun_peraturan_daerah()
    {
        $this->db->select('tahun, count(*) as `jumlah`');
        $this->db->from('peraturan_daerah');
        $this->db->group_by('tahun');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_bentuk_hukum()
    {
        $this->db->select('a.bentuk_produk_hukum, b.judul, b.slug');
        $this->db->from('peraturan_daerah as `a`');
        $this->db->join('master_bentuk_produk_hukum as `b`', 'a.bentuk_produk_hukum = b.id');
        $this->db->order_by('b.judul', 'asc');
        $this->db->group_by('a.bentuk_produk_hukum');
        $query = $this->db->get();
        return $query->result_array();
    }

    //END MODEL USER ============================================================









    // DASHBOARD ================================================================

    public function last_article()
    {
        $this->db->select('berita.id, berita.judul, berita.slug, berita.isi, berita.tanggal, berita.thumbnail, berita.visitor, kategori.nama, user.fullname,  user.deskripsi');
        $this->db->from('berita');
        $this->db->join('kategori', 'berita.kategori_id = kategori.id');
        $this->db->join('user', 'user.id = berita.penulis');
        // $this->db->join('komentar', 'komentar.id_berita = berita.slug');
        $this->db->order_by('berita.slug', 'desc');
        $this->db->where('berita.publish', 'Publish');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function total_komentar()
    {
        $this->db->select('count(*) as `jumlah`');
        $this->db->from('berita');
        $this->db->join('komentar', 'komentar.id_berita = berita.slug');
        $this->db->order_by('berita.slug', 'desc');
        $this->db->where('berita.publish', 'Publish');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row_array();
    }













    // function testing()
    // {
    //     $crud = new grocery_CRUD();
    //     $crud->set_table('testing');
    //     $crud->set_subject('Testing');
    //     $crud->set_relation('prodi_id','testing_prodi','nama');
    //     $output = $crud->render();
    //     $output->testingActive = 'active';
    //     return $output;
    // }
    // function testing_prodi()
    // {
    //     $crud = new grocery_CRUD();
    //     $crud->set_table('testing_prodi');
    //     $crud->set_subject('faruq');
    //     $crud->required_fields('nama');
    //     $output = $crud->render();
    //     $output->testingActive = 'active';
    //     return $output;
    // }
    /*
    function level()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('level');
        $crud->set_subject('Level');
        $crud->display_as('point','Batas Point');
        $crud->required_fields("nama", "point");
        $output = $crud->render();
        $output->masterActive = 'active';
        return $output;
    }
    function levelMhs()
    {
        $crud = new grocery_CRUD();
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->set_table('level');
        $crud->set_subject('Level');
        $crud->display_as('point','Batas Point');
        $crud->required_fields("nama", "point");
        $output = $crud->render();
        $output->pengumumanActive = 'active';
        return $output;
    }
    function task()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('task');
        $crud->set_subject('Task');
        $crud->required_fields("nama", "point", "batas_akhir");
        $output = $crud->render();
        $output->masterActive = 'active';
        return $output;
    }
    function user_mhs()
    {
        $user_id = $this->session->userdata('nim');
        $crud = new grocery_CRUD();
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_read();
        $crud->fields('NIM', 'PIN', 'NOHP');
        $crud->display_as('NIM', 'Nim');
        $crud->display_as('PIN', 'Password');
        $crud->display_as('NOHP', 'No Hp');
        $crud->columns('NIM', 'PIN', 'NOHP');
        $crud->where('nim', $user_id);
        $crud->set_table('login');
        $crud->set_subject('Profile');
        $crud->required_fields("pin");
        $output = $crud->render();
        $state = $crud->getState();
        $state_info = $crud->getStateInfo();
        if ($state == 'edit') {
            $primary_key = $state_info->primary_key[0];
            if($primary_key!=$user_id){
                $output->output = $this->load->view('tidak_berhak_mengakses','',true);
            }
        } 
        $output->pengaturanActive = 'active';
        return $output;
    }
    function taskMhs()
    {
        $crud = new grocery_CRUD();
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->set_table('task');
        $crud->set_subject('Task');
        $saatIni = date('Y-m-d H:i:s');
        $crud->where("batas_akhir >= '$saatIni'");
        $crud->required_fields("nama", "point", "batas_akhir");
        $output = $crud->render();
        $output->pengumumanActive = 'active';
        return $output;
    }
    function skpi()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('jenis');
        $crud->set_subject('Jenis SKPI');
        $crud->required_fields("nama");
        $output = $crud->render();
        $output->masterActive = 'active';
        return $output;
    }
    function whereInMultiButton()
    {
        $id = $this->input->post('ids', true);
        $idString = implode(",", $id);
        return $idHilangSlash = str_replace("/", "", $idString);
    }
    
    function encrypt_password_insert($post_array)
    {
        $post_array['password'] = md5($post_array['password']);
        return $post_array;
    }
    function encrypt_password_callback($post_array, $primary_key)
    {
        if (!empty($post_array['password'])) {
            $post_array['password'] = md5($post_array['password']);
        } else {
            unset($post_array['password']);
        }

        return $post_array;
    }

    function set_password_input_to_empty()
    {
        return "<input class=form-control type='password' name='password' value='' />";
    }
    /*
    function updateProfile()
    {
        $foto = '';
        $changepassword = $this->input->post('changePassword', true);
        $password = $this->input->post('password', true);
        (empty($changepassword)) ? $pass = $password : $pass = md5($changepassword);
        if (!empty($_FILES["image"]["name"])) {
            $foto = $this->image = $this->uploadImage();
        }
        $data = array('password' => $pass);
        if (!empty($foto)) {
            $this->db->set('foto', $foto);
            $this->session->set_userdata('sipot_foto', $foto);
        }
        $this->db->where('id', $this->id)->update('sipot_pegawai', $data);
        //simpan sessionnya
        return true;
    }
    function uploadImage()
    {
        $config['upload_path']          = './assets/uploads/files/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']            = true;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }

        return "default.png";
    }

    function whereInMultiButton()
    {
        $id = $this->input->post('ids', true);
        $idString = implode(",", $id);
        return $idHilangSlash = str_replace("/", "", $idString);
    }
   
    function sub_departemen()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('sipot_sub_departemen');
        $crud->set_subject('Sub Departemen');
        $crud->required_fields("nama");
        $output = $crud->render();
        $output->masterActive = 'active';
        return $output;
    }
    function mesin()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('sipot_mesin');
        $crud->set_subject('Mesin Finger');
        $crud->unset_add();
        $crud->unset_delete();
        $crud->field_type('ip_address', 'readonly');
        $crud->required_fields("nama");
        $output = $crud->render();
        $output->masterActive = 'active';
        return $output;
    }
    // function jamMasuk()
    // {
    //     $crud = new grocery_CRUD();
    //     $crud->set_table('sipot_jam');
    //     $crud->field_type('jam_masuk','time');
    //     $crud->field_type('jam_keluar','time');
    //     $crud->field_type('awal_scan_masuk','time');
    //     $crud->field_type('akhir_scan_masuk','time');
    //     $crud->field_type('awal_scan_keluar','time');
    //     $crud->field_type('akhir_scan_keluar','time');
    //     $crud->required_fields('nama','jam_masuk','jam_keluar');
    //     $crud->set_subject('Jam Masuk');
    //     $output = $crud->render();
    //     $output->pengaturanActive = 'active';
    //     $output->waktuActive = 'active';
    //     return $output;
    // }
    function shift()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('sipot_shift');
        $crud->where("jenis not in ('duratif','khusus')");
        $crud->columns('nama', 'awal_scan_masuk', 'akhir_scan_masuk', 'awal_scan_keluar', 'akhir_scan_keluar');
        $crud->required_fields('nama', 'senin_jam_masuk', 'senin_jam_keluar', 'selasa_jam_masuk', 'selasa_jam_keluar', 'rabu_jam_masuk', 'rabu_jam_keluar', 'kamis_jam_masuk', 'kamis_jam_keluar', 'jumat_jam_masuk', 'jumat_jam_keluar', 'sabtu_jam_masuk', 'sabtu_jam_keluar', 'ahad_jam_masuk', 'ahad_jam_keluar', 'sabtu_wajib_masuk', 'ahad_wajib_masuk');
        $crud->field_type('awal_scan_masuk', 'time');
        $crud->field_type('akhir_scan_masuk', 'time');
        $crud->field_type('awal_scan_keluar', 'time');
        $crud->field_type('akhir_scan_keluar', 'time');
        $crud->field_type('senin_jam_masuk', 'time');
        $crud->field_type('senin_jam_keluar', 'time');
        $crud->field_type('selasa_jam_masuk', 'time');
        $crud->field_type('selasa_jam_keluar', 'time');
        $crud->field_type('rabu_jam_masuk', 'time');
        $crud->field_type('rabu_jam_keluar', 'time');
        $crud->field_type('kamis_jam_masuk', 'time');
        $crud->field_type('kamis_jam_keluar', 'time');
        $crud->field_type('jumat_jam_masuk', 'time');
        $crud->field_type('jumat_jam_keluar', 'time');
        $crud->field_type('sabtu_jam_masuk', 'time');
        $crud->field_type('sabtu_jam_keluar', 'time');
        $crud->field_type('ahad_jam_masuk', 'time');
        $crud->field_type('ahad_jam_keluar', 'time');
        $crud->field_type('duratif_harian','invisible');
        $crud->field_type('duratif_mingguan','invisible');
        $crud->field_type('duratif_bulanan','invisible');
        $crud->field_type('duratif_aktif','invisible');
        $crud->set_subject('Shift');
        $crud->field_type('khusus_bulanan','invisible');
        $crud->field_type('khusus_aktif','invisible');
        $crud->field_type('jenis','invisible');
        $crud->field_type('khusus_mingguan','invisible');
        $output = $crud->render();
        $output->pengaturanActive = 'active';
        $output->waktuActive = 'active';
        return $output;
    }
    function pengaturanTukin()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('sipot_pengaturan_tukin');
        $crud->set_subject('Pengaturan Tukin');
        $crud->display_as('batas_awal', 'Batas Awal(Menit)');
        $crud->display_as('batas_akhir', 'Batas Akhir(Menit)');
        $crud->display_as('pengurangan', 'Pengurangan(%)');
        $crud->unset_delete();
        $crud->field_type('pengurangan_rupiah', 'rupiah');
        $crud->display_as('pengurangan_rupiah', 'Potongan(Rp)');
        $crud->required_fields("nama", "pengurangan", 'pengurangan_rupiah');
        $output = $crud->render();
        $output->pengaturanActive = 'active';
        return $output;
    }
    function pegawai()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('sipot_pegawai');
        $crud->field_type('pin','readonly');
        $crud->set_primary_key('sipot_pegawai', 'id');
        $crud->unset_add();
        $crud->set_subject('Pegawai');
        $crud->display_as('sub_departemen_id', 'Sub Departemen');
        $crud->set_relation('sub_departemen_id', 'sipot_sub_departemen', 'nama');
        $crud->columns('nip', 'nama', 'departemen_id', 'sub_departemen_id', 'tipe_pegawai_id', 'jenis_pegawai_id', 'status', 'foto');
        $crud->required_fields("nama", 'nip', 'departemen_id', 'tipe_pegawai_id', 'jenis_pegawai_id');
        $crud->display_as('departemen_id', 'Nama Departemen');
        $crud->set_relation('departemen_id', 'sipot_departemen', 'nama');
        $crud->display_as('tipe_pegawai_id', 'Tipe Pegawai');
        $crud->set_relation('atasan_id', 'sipot_pegawai', 'nama');
        $crud->display_as('atasan_id', 'Atasan');
        $crud->set_relation('tipe_pegawai_id', 'sipot_tipe_pegawai', 'nama');
        $crud->add_action('Reset Password', '', 'admin/resetPassword', 'fa fa-refresh', '', 'confirm_type', 'Anda Mereset Password Pegawai');
        $crud->display_as('jenis_pegawai_id', 'Jenis Pegawai');
        $crud->field_type('password', 'password');
        $crud->set_relation('jenis_pegawai_id', 'sipot_jenis_pegawai', 'nama');
        $crud->set_field_upload('foto', 'assets/uploads/files/');
        $crud->add_multi_button('Pasang Jadwal', 'admin/formPasangJadwal', 'fa fa-calendar', false, 'Pasang Jadwal', 'anda akan pasang jadwal', 'ajax_type');
        $crud->add_multi_button('Reset Password', 'admin/resetPasswordBulk', 'fa fa-refresh', true, 'Reset Password', 'Anda Akan Mereset Password', 'default_type');
		$output = $crud->render();
        $output->masterActive = 'active';
        return $output;
    }
    function tipePegawai()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('sipot_tipe_pegawai');
        $crud->set_subject('Tipe Pegawai');
        $crud->required_fields("nama");
        $output = $crud->render();
        $output->masterActive = 'active';
        return $output;
    }
    function jenisPegawai()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('sipot_jenis_pegawai');
        $crud->set_subject('Jenis Pegawai');
        $crud->required_fields("nama");
        $output = $crud->render();
        $output->masterActive = 'active';
        return $output;
    }
    function statusPresensi()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('sipot_jenis_presensi');
        $crud->set_subject('Jenis Presensi');
        $crud->required_fields("nama");
        $output = $crud->render();
        $output->masterActive = 'active';
        return $output;
    }
    function jadwal()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('sipot_jadwal');
        $crud->set_subject('Jadwal');
        $crud->required_fields("nama", "jenis");
        $crud->add_action('Detail Jadwal', '', 'admin/detailJadwal', 'fa fa-gear', '', 'emodal_type', '');
        // $crud->callback_after_update(array($this,'delete_old_detail_jadwal'));
        $output = $crud->render();
        $output->masterActive = 'active';
        return $output;
    }
    // function delete_old_detail_jadwal($post_array, $primary_key) {
    //    $this->db->delete('sipot_detail_jadwal',array('jadwal_id'=>$primary_key));
    //   return true;
    // }
    function detailJadwal($id = null)
    {
        $getJadwal =  $this->db->get_where('sipot_jadwal', array('id' => $id))->row();
        if ($getJadwal->jenis == 'Rutin' || $getJadwal->jenis == 'Shift') {
            $this->trDetailJadwal($id);
        } elseif ($getJadwal->jenis == 'Duratif') {
            $this->load->view('jadwal/duratif', compact('id'));
        } else {
            $this->load->view('jadwal/khusus', compact('id'));
        }
    }
    function trDetailJadwal($id)
    {
        $crud = new grocery_CRUD();
        $crud->set_table('sipot_detail_jadwal');
        $crud->set_subject('Detail Jadwal');
        $crud->field_type('jadwal_id', 'hidden', $id);
        $crud->where('jadwal_id', $id);
        $crud->set_relation('shift_id', 'sipot_shift', 'nama');
        $crud->display_as('jadwal_id', 'Jadwal');
        $crud->display_as('shift_id', 'Shift');
        $crud->required_fields("nama");
        $crud->fields('jadwal_id', 'shift_id');
        $crud->columns('shift_id');
        $crud->callback_after_insert(array($this, 'setJenisShift'));
        $output = $crud->render();
        $this->template->templateDetail($output);
    }

    function setJenisShift($post_array, $primary_key)
    {
        $getJenisJadwal = $this->db->get_where('sipot_jadwal', array('id' => $post_array['jadwal_id']))->row();
        $this->db->set('jenis', strtolower(@$getJenisJadwal->jenis))->where('id', $post_array['shift_id'])->update('sipot_shift');
        return true;
    }

    function detailJadwalRutinShift($id)
    {
        $crud = new grocery_CRUD();
        $crud->field_type('jadwal_id', 'hidden', $id);
        $crud->set_relation('shift_id', 'sipot_shift', 'nama');
        $crud->display_as('shift_id', 'Nama Shift');
        $crud->fields();
        $crud->set_table('sipot_detail_jadwal');
        // $crud->where('sipot_jadwal_id',$id);
        $crud->field_type('sipot_jadwal_id', 'hidden', $id);
        $crud->field_type('awal_scan_datang', 'time');
        $crud->columns('nama', 'awal_scan_datang', 'scan_datang', 'awal_scan_pulang', 'scan_pulang');
        $crud->field_type('scan_datang', 'time');
        $crud->field_type('awal_scan_pulang', 'time');
        $crud->field_type('scan_pulang', 'time');
        $crud->set_subject('Detail Jadwal Rutin dan Shift');
        $crud->required_fields("nama", "awal_scan_datang", 'jam_datang', 'awal_scan_pulang', 'jam_pulang');
        // $crud->add_action('Detail Jadwal', '', 'admin/detailJadwal','fa fa-gear','','ajax_type','');
        $output = $crud->render();
        $output->masterActive = 'active';
        $this->template->templateDetail($output);
    }

    function simpanJadwalDuratif()
    {
        $id = $this->input->post('id', true);
        $jadwal_id = $this->input->post('jadwal_id', true);
        $nama = $this->input->post('nama', true);
        $akumulasiHarian = $this->input->post('akumulasiHarian', true);
        $akumulasiMingguan = $this->input->post('akumulasiMingguan', true);
        $akumulasiBulanan = $this->input->post('akumulasiBulanan', true);
        $status_aktif = $this->input->post('pengaturanAktif', true);

        if (!empty($id)) {
            $this->db->where('id', $id)->update('sipot_shift', array('duratif_aktif' => $status_aktif, 'nama' => $nama, 'duratif_harian' => $akumulasiHarian, 'duratif_mingguan' => $akumulasiMingguan, 'duratif_bulanan' => $akumulasiBulanan));
        } else {
            //insert into sipot_sift dulu
            //setelah itu insert sipot_detail_jadwal
            $this->db->insert('sipot_shift', array('jenis' => 'duratif', 'duratif_aktif' => $status_aktif, 'nama' => $nama, 'duratif_harian' => $akumulasiHarian, 'duratif_mingguan' => $akumulasiMingguan, 'duratif_bulanan' => $akumulasiBulanan));
            $insert_id = $this->db->insert_id();
            $this->db->insert('sipot_detail_jadwal', array('jadwal_id' => $jadwal_id, 'shift_id' => $insert_id));
        }
        return array('success' => true, 'msg' => 'Penyimpanan Detail Jadwal Duratif Berhasil');
    }
    function simpanJadwalKhusus()
    {
        $id = $this->input->post('id', true);
        $jadwal_id = $this->input->post('jadwal_id', true);
        $nama = $this->input->post('nama', true);
        $akumulasiMingguan = $this->input->post('akumulasiMingguan', true);
        $akumulasiBulanan = $this->input->post('akumulasiBulanan', true);
        $status_aktif = $this->input->post('pengaturanAktif', true);

        if (!empty($id)) {
            $this->db->where('id', $id)->update('sipot_shift', array('khusus_aktif' => $status_aktif, 'nama' => $nama, 'khusus_mingguan' => $akumulasiMingguan, 'khusus_bulanan' => $akumulasiBulanan));
        } else {
            $this->db->insert('sipot_shift', array('jenis' => 'khusus', 'khusus_aktif' => $status_aktif, 'nama' => $nama, 'khusus_mingguan' => $akumulasiMingguan, 'khusus_bulanan' => $akumulasiBulanan));
            $insert_id = $this->db->insert_id();
            $this->db->insert('sipot_detail_jadwal', array('jadwal_id' => $jadwal_id, 'shift_id' => $insert_id));
        }
        return array('success' => true, 'msg' => 'Penyimpanan Detail Jadwal Khusus Berhasil');
    }
    function trJadwal()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('sipot_tr_jadwal');
        $crud->set_subject('Pemasangan Jadwal');
        $crud->display_as('pegawai_id', 'pegawai')
            ->display_as('jadwal_id', 'Jadwal')
            ->display_as('tgl_mulai_berlaku', 'Tanggal Mulai Berlaku');
        $crud->set_relation('pegawai_id', 'sipot_pegawai', 'nama');
        $crud->set_relation('jadwal_id', 'sipot_jadwal', 'nama');
        $crud->required_fields("pegawai_id", "jadwal_id", "tgl_mulai_berlaku");
        $output = $crud->render();
        $output->transaksiActive = 'active';
        return $output;
    }
    function logPresensi()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('sipot_log_presensi');
        $crud->set_subject('Log Presensi');
        $crud->field_type('masuk', 'time');
        $crud->field_type('keluar', 'time');
		$crud->order_by('tanggal','desc');
        $crud->set_relation('jenis_presensi_id', 'sipot_jenis_presensi', 'nama');
        #$crud->set_relation('detail_jadwal_id','sipot_jenis_presensi','nama');
        $crud->display_as('pegawai_id', 'pegawai')
            ->display_as('jadwal_id', 'Jadwal')
            ->display_as('jenis_presensi_id', 'Status Presensi');
        $crud->set_relation('pegawai_id', 'sipot_pegawai', 'nama');
        $crud->display_as('shift_id', 'Jadwal');
        $crud->set_relation('shift_id', 'sipot_shift', 'nama');
        $crud->required_fields("tanggal", "pegawai_id", "shift_id", "jenis_presensi_id");
        $crud->callback_after_insert(array($this, 'inserteFlag'));
        $crud->callback_after_update(array($this, 'updateFlag'));
        $crud->fields('tanggal', 'pegawai_id', 'shift_id', 'masuk', 'keluar', 'jenis_presensi_id','keterangan');
        // $crud->set_relation('serial_mesin','sipot_mesin','nama');
        // $crud->display_as('serial_mesin',"Mesin");
		// $crud->add_multi_button('Ubah Jadwal', 'admin/formUbahJadwal', 'fa fa-calendar-o', false, 'Ubah Jadwal', 'Anda Akan Merubah Jadwal Pegawai', 'ajax_type');
		// $crud->add_button_side_add('Jam Masuk Sebagai Jam Keluar','admin/masukAsKeluar','fa fa-clock-o',true);
        $crud->add_button_side_add('Tambah Multi', 'admin/showMultiFormAttLog', 'fa fa-eye', false, 'ajax_type');
        $output = $crud->render();
        $output->transaksiActive = 'active';
        return $output;
    }
    function updateFlag($post_array, $primary_key)
    {
        $this->db->update('sipot_log_presensi', array('flag'=>'Update Manual'), array('tanggal' => $post_array['tanggal'],'pegawai_id'=>$post_array['pegawai_id']));
        return true;
    }
    function inserteFlag($post_array, $primary_key)
    {
        $this->db->update('sipot_log_presensi', array('flag'=>'Insert Manual'), array('tanggal' => $post_array['tanggal'],'pegawai_id'=>$post_array['pegawai_id']));
        return true;
    }

    // function setKeterangan($post_array, $primary_key)
    // {
    //     $this->db->update('sipot_log_presensi', array('keterangan' => 'Input Manual', 'flag' => 'Input Manual'));
    //     return true;
    // }
    */
}
