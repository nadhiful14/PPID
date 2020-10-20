<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Transaksi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('grocery_CRUD');
    }
    function notif_skpi($id = null)
    {
        $hariJamIni = date('Y-m-d H:i:s');
        $crud = new grocery_CRUD();
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->where('skpi_trans.id', $id);
        $crud->set_table('skpi_trans');
        $crud->where("status_verifikasi in ('Belum Terverifikasi','Pengembalian Ke Admin')");
        // $crud->where('status_verifikasi','Belum Terverifikasi');
        $crud->columns('task_id', 'jenis_id', 'nim', 'kegiatan', 'lembaga', 'dokumen', 'status_verifikasi', 'tgl_isi');
        $crud->set_subject('Notif SKPI');
        $crud->add_action('Verifikasi', '', 'admin/verifikasi', 'fa fa-check', '', 'confirm_type', 'Anda Akan Memverifikasi');
        $crud->add_action('Pengembalian', '', 'admin/formPengembalian', 'fa fa-reply', '', 'ajax_type', 'Anda Akan Mengembalikan Pengajuan');
        $crud->required_fields("task_id", "jenis_id", "nim", 'kegiatan', 'lembaga');
        $crud->set_relation('task_id', 'skpi_task', 'nama', array('skpi_task.batas_akhir >=' => $hariJamIni, false), 'id asc');
        $crud->display_as('task_id', 'Nama Task');
        $crud->set_relation('jenis_id', 'skpi_jenis', 'nama', null, 'id asc');
        $crud->display_as('jenis_id', 'Jenis SKPI');
        $crud->set_relation('nim', 'mhs', 'NAMA');
        $crud->display_as('nim', 'Nama Mahasiswa');
        $crud->field_type('status_verifikasi', 'invisible');
        $crud->field_type('tgl_verifikasi', 'invisible');
        $crud->field_type('tgl_isi', 'hidden', $hariJamIni);
        $crud->set_rules('task_id', 'Task', 'callback_cek_task_tersedia');
        $crud->set_field_upload('dokumen', 'assets/uploads/files/');
        $output = $crud->render();
        $output->transaksiActive = 'active';
        return $output;
    }
    function notif_skpi_mhs($id = null)
    {
        $hariJamIni = date('Y-m-d H:i:s');
        $crud = new grocery_CRUD();
        $crud->unset_add();
        // $crud->unset_edit();
        // $crud->unset_delete();
        $crud->where('skpi_trans.id', $id);
        $crud->set_table('skpi_trans');
        $crud->where("status_verifikasi in ('Belum Terverifikasi','Pengembalian Ke Mahasiswa')");
        // $crud->where('status_verifikasi','Belum Terverifikasi');
        $crud->columns('task_id', 'jenis_id', 'nim', 'kegiatan', 'lembaga', 'dokumen', 'status_verifikasi', 'tgl_isi', 'tgl_pengembalian_ke_mahasiswa');
        $crud->display_as('tgl_pengembalian_ke_mahasiswa','Tanggal Pengembalian');
        $crud->set_subject('SKPI Pengembalian Ke Mahasiswa');
        $crud->required_fields("task_id", "jenis_id", "nim", 'kegiatan', 'lembaga');
        $crud->set_relation('task_id', 'skpi_task', 'nama', array('skpi_task.batas_akhir >=' => $hariJamIni, false), 'id asc');
        $crud->display_as('task_id', 'Nama Task');
        $crud->set_relation('jenis_id', 'skpi_jenis', 'nama', null, 'id asc');
        $crud->display_as('jenis_id', 'Jenis SKPI');
        $crud->set_relation('nim', 'mhs', 'NAMA');
        $crud->display_as('nim', 'Nama Mahasiswa');
        $crud->field_type('status_verifikasi', 'invisible');
        $crud->field_type('tgl_pengembalian_ke_mahasiswa', 'invisible');
        $crud->field_type('tgl_pengembalian_ke_admin', 'invisible');
        $crud->field_type('tgl_verifikasi', 'invisible');
        $crud->field_type('tgl_isi', 'hidden', $hariJamIni);
        $crud->set_field_upload('dokumen', 'assets/uploads/files/');
        $crud->callback_after_update(array($this, 'set_pengembalian_ke_admin'));
        $output = $crud->render();
        $output->transaksiActive = 'active';
        return $output;
    }
    function skpi_pengembalian_mhs($id=null)
    {
        $hariJamIni = date('Y-m-d H:i:s');
        $user_id =$this->session->userdata('skpi_nim');
        $crud = new grocery_CRUD();
        $crud->unset_add();
        $crud->where('status_verifikasi','Pengembalian Ke Mahasiswa');
        $crud->where('skpi_trans.nim',$user_id);
        $crud->set_table('skpi_trans');
        $crud->display_as('tgl_pengembalian_ke_mahasiswa','Tgl Pengembalian');
        $crud->columns('task_id', 'jenis_id', 'kegiatan', 'lembaga', 'dokumen', 'status_verifikasi','keterangan', 'tgl_isi','tgl_pengembalian_ke_mahasiswa');
        $crud->set_subject('Pengembalian SKPI');
        $crud->required_fields("task_id", "jenis_id", 'kegiatan', 'lembaga','dokumen');
        $crud->set_relation('task_id', 'skpi_task', 'nama', array('skpi_task.batas_akhir >=' => $hariJamIni, false), 'id asc');
        $crud->display_as('task_id', 'Nama Task');
        $crud->set_relation('jenis_id', 'skpi_jenis', 'nama', null, 'id asc');
        $crud->display_as('jenis_id', 'Jenis SKPI');
        $crud->field_type('status_verifikasi', 'invisible');
        $crud->field_type('tgl_verifikasi', 'invisible');
        $crud->field_type('tgl_pengembalian_ke_mahasiswa', 'invisible');
        $crud->field_type('tgl_pengembalian_ke_admin', 'invisible');
        $crud->field_type('nim', 'hidden',$user_id);
        $crud->field_type('tgl_isi', 'hidden', $hariJamIni);
        $crud->set_rules('task_id', 'Task', 'callback_cek_task_tersedia');
        $crud->callback_after_update(array($this, 'set_pengembalian_ke_admin'));
        // $crud->set_rules('jenis_id', 'Kategori', 'callback_cek_jumlah_input');
        $crud->set_field_upload('dokumen', 'assets/uploads/files/');
        $output = $crud->render();
        $output->transaksiActive = 'active';
        return $output;
    }
    function simpanPengembalian()
    {
        // $this->general->testPre($_POST);
        // die();
        if (empty($this->input->post('keterangan'))) {
            return false;
        } else {
            return $this->db->where('id', $this->input->post('id', true))->set(array('keterangan' => $this->input->post('keterangan'), 'status_verifikasi' => 'Pengembalian Ke Mahasiswa', 'tgl_pengembalian_ke_mahasiswa' => date('Y-m-d H:i:s')))->update('skpi_trans');
        }
    }
    function getNotifBaru()
    {
        $dataNotifbaru = $this->db->query("SELECT b.NAMA AS nama_mhs,c.nama as nama_jenis,d.nama as nama_task,d.point,date(a.tgl_isi) as tgl_isi_saja,a.*
        FROM skpi_trans a
        INNER JOIN mhs b ON a.nim=b.NIM
        INNER JOIN skpi_jenis c ON a.jenis_id = c.id
        inner join skpi_task d on a.task_id = d.id
        WHERE a.status_verifikasi = 'Belum Terverifikasi'
        ORDER BY a.tgl_isi ASC")->result();
        return $this->load->view('notif/notif_baru', array('notifBaru' => $dataNotifbaru), true);
    }
    function getNotifPengembalian()
    {
        $dataNotifPengembalian = $this->db->query("SELECT b.NAMA AS nama_mhs,c.nama as nama_jenis,d.nama as nama_task,d.point,date(a.tgl_isi) as tgl_isi_saja,a.*
        FROM skpi_trans a
        INNER JOIN mhs b ON a.nim=b.NIM
        INNER JOIN skpi_jenis c ON a.jenis_id = c.id
        inner join skpi_task d on a.task_id = d.id
        WHERE a.status_verifikasi = 'Pengembalian Ke Admin'
        ORDER BY a.tgl_pengembalian_ke_admin ASC")->result();
        return $this->load->view('notif/notif_pengembalian', array('notifPengembalian' => $dataNotifPengembalian), true);
    }
    function getNotifPengembalianMhs()
    {
        $user_id = $this->session->userdata('skpi_nim');
        $dataNotifPengembalian = $this->db->query("SELECT b.NAMA AS nama_mhs,c.nama as nama_jenis,d.nama as nama_task,d.point,date(a.tgl_isi) as tgl_isi_saja,a.*
        FROM skpi_trans a
        INNER JOIN mhs b ON a.nim=b.NIM
        INNER JOIN skpi_jenis c ON a.jenis_id = c.id
        inner join skpi_task d on a.task_id = d.id
        WHERE a.status_verifikasi = 'Pengembalian Ke Mahasiswa' and a.nim = '$user_id'
        ORDER BY a.tgl_pengembalian_ke_admin ASC")->result();
        return $this->load->view('notif/notif_pengembalian_mhs', array('notifPengembalian' => $dataNotifPengembalian), true);
    }
    function prestasi()
    {
        $crud = new grocery_CRUD();
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_read();
        $crud->unset_edit();
        $crud->set_table('skpi_trans');
        $crud->set_subject('SKPI Prestasi/Penghargaan');
        $crud->where('status_verifikasi', 'Terverifikasi');
        $crud->where('jenis_id', 1);
        $crud->columns('task_id', 'jenis_id', 'nim', 'kegiatan', 'lembaga', 'dokumen', 'tgl_isi');
        $crud->set_relation('task_id', 'skpi_task', 'nama');
        $crud->display_as('task_id', 'Nama Task');
        $crud->set_relation('jenis_id', 'skpi_jenis', 'nama');
        $crud->display_as('jenis_id', 'Jenis SKPI');
        $crud->set_relation('nim', 'mhs', 'NAMA');
        $crud->display_as('nim', 'Nama Mahasiswa');
        $crud->field_type('status_verifikasi', 'invisible');
        $crud->set_rules('task_id', 'Task', 'callback_cek_task_tersedia');
        $crud->set_field_upload('dokumen', 'assets/uploads/files/');
        $output = $crud->render();
        $output->laporanActive = 'active';
        return $output;
    }
    function prestasi_mhs()
    {
        $crud = new grocery_CRUD();
        $crud->unset_add();
        $crud->unset_delete();
        // $crud->unset_read();
        $crud->unset_edit();
        $crud->set_table('skpi_trans');
        $crud->set_subject('SKPI Prestasi/Penghargaan');
        $crud->where('skpi_trans.nim',$this->session->userdata('skpi_nim'));
        $crud->where('status_verifikasi', 'Terverifikasi');
        $crud->where('jenis_id', 1);
        $crud->columns('task_id', 'jenis_id', 'nim', 'kegiatan', 'lembaga', 'dokumen', 'tgl_isi');
        $crud->set_relation('task_id', 'skpi_task', 'nama');
        $crud->display_as('task_id', 'Nama Task');
        $crud->set_relation('jenis_id', 'skpi_jenis', 'nama');
        $crud->display_as('jenis_id', 'Jenis SKPI');
        $crud->set_relation('nim', 'mhs', 'NAMA');
        $crud->display_as('nim', 'Nama Mahasiswa');
        $crud->field_type('status_verifikasi', 'invisible');
        $crud->set_rules('task_id', 'Task', 'callback_cek_task_tersedia');
        $crud->set_field_upload('dokumen', 'assets/uploads/files/');
        $output = $crud->render();
        $output->laporanActive = 'active';
        return $output;
    }
    function organisasi()
    {
        $crud = new grocery_CRUD();
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_read();
        $crud->unset_edit();
        $crud->set_table('skpi_trans');
        $crud->set_subject('Keikutsertaan Dalam Organisasi');
        $crud->where('status_verifikasi', 'Terverifikasi');
        $crud->where('jenis_id', 2);
        $crud->columns('task_id', 'jenis_id', 'nim', 'kegiatan', 'lembaga', 'dokumen', 'tgl_isi');
        $crud->set_relation('task_id', 'skpi_task', 'nama');
        $crud->display_as('task_id', 'Nama Task');
        $crud->set_relation('jenis_id', 'skpi_jenis', 'nama');
        $crud->display_as('jenis_id', 'Jenis SKPI');
        $crud->set_relation('nim', 'mhs', 'NAMA');
        $crud->display_as('nim', 'Nama Mahasiswa');
        $crud->field_type('status_verifikasi', 'invisible');
        $crud->set_rules('task_id', 'Task', 'callback_cek_task_tersedia');
        $crud->set_field_upload('dokumen', 'assets/uploads/files/');
        $output = $crud->render();
        $output->laporanActive = 'active';
        return $output;
    }
    function organisasi_mhs()
    {
        $crud = new grocery_CRUD();
        $crud->unset_add();
        $crud->unset_delete();
        // $crud->unset_read();
        $crud->unset_edit();
        $crud->set_table('skpi_trans');
        $crud->set_subject('Keikutsertaan Dalam Organisasi');
        $crud->where('status_verifikasi', 'Terverifikasi');
        $crud->where('skpi_trans.nim',$this->session->userdata('skpi_nim'));
        $crud->where('jenis_id', 2);
        $crud->columns('task_id', 'jenis_id', 'nim', 'kegiatan', 'lembaga', 'dokumen', 'tgl_isi');
        $crud->set_relation('task_id', 'skpi_task', 'nama');
        $crud->display_as('task_id', 'Nama Task');
        $crud->set_relation('jenis_id', 'skpi_jenis', 'nama');
        $crud->display_as('jenis_id', 'Jenis SKPI');
        $crud->set_relation('nim', 'mhs', 'NAMA');
        $crud->display_as('nim', 'Nama Mahasiswa');
        $crud->field_type('status_verifikasi', 'invisible');
        $crud->set_rules('task_id', 'Task', 'callback_cek_task_tersedia');
        $crud->set_field_upload('dokumen', 'assets/uploads/files/');
        $output = $crud->render();
        $output->laporanActive = 'active';
        return $output;
    }
    function sertifikat()
    {
        $crud = new grocery_CRUD();
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_read();
        $crud->unset_edit();
        $crud->set_table('skpi_trans');
        $crud->set_subject('Sertifikat Keahlian');
        $crud->where('status_verifikasi', 'Terverifikasi');
        $crud->where('jenis_id', 3);
        $crud->columns('task_id', 'jenis_id', 'nim', 'kegiatan', 'lembaga', 'dokumen', 'tgl_isi');
        $crud->set_relation('task_id', 'skpi_task', 'nama');
        $crud->display_as('task_id', 'Nama Task');
        $crud->set_relation('jenis_id', 'skpi_jenis', 'nama');
        $crud->display_as('jenis_id', 'Jenis SKPI');
        $crud->set_relation('nim', 'mhs', 'NAMA');
        $crud->display_as('nim', 'Nama Mahasiswa');
        $crud->field_type('status_verifikasi', 'invisible');
        $crud->set_rules('task_id', 'Task', 'callback_cek_task_tersedia');
        $crud->set_field_upload('dokumen', 'assets/uploads/files/');
        $output = $crud->render();
        $output->laporanActive = 'active';
        return $output;
    }
    function sertifikat_mhs()
    {
        $crud = new grocery_CRUD();
        $crud->unset_add();
        $crud->unset_delete();
        // $crud->unset_read();
        $crud->unset_edit();
        $crud->set_table('skpi_trans');
        $crud->set_subject('Sertifikat Keahlian');
        $crud->where('status_verifikasi', 'Terverifikasi');
        $crud->where('jenis_id', 3);
        $crud->where('skpi_trans.nim',$this->session->userdata('skpi_nim'));
        $crud->columns('task_id', 'jenis_id', 'nim', 'kegiatan', 'lembaga', 'dokumen', 'tgl_isi');
        $crud->set_relation('task_id', 'skpi_task', 'nama');
        $crud->display_as('task_id', 'Nama Task');
        $crud->set_relation('jenis_id', 'skpi_jenis', 'nama');
        $crud->display_as('jenis_id', 'Jenis SKPI');
        $crud->set_relation('nim', 'mhs', 'NAMA');
        $crud->display_as('nim', 'Nama Mahasiswa');
        $crud->field_type('status_verifikasi', 'invisible');
        $crud->set_rules('task_id', 'Task', 'callback_cek_task_tersedia');
        $crud->set_field_upload('dokumen', 'assets/uploads/files/');
        $output = $crud->render();
        $output->laporanActive = 'active';
        return $output;
    }
    function magang()
    {
        $crud = new grocery_CRUD();
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_read();
        $crud->unset_edit();
        $crud->set_table('skpi_trans');
        $crud->set_subject('Magang');
        $crud->where('status_verifikasi', 'Terverifikasi');
        $crud->where('jenis_id', 4);
        $crud->columns('task_id', 'jenis_id', 'nim', 'kegiatan', 'lembaga', 'dokumen', 'tgl_isi');
        $crud->set_relation('task_id', 'skpi_task', 'nama');
        $crud->display_as('task_id', 'Nama Task');
        $crud->set_relation('jenis_id', 'skpi_jenis', 'nama');
        $crud->display_as('jenis_id', 'Jenis SKPI');
        $crud->set_relation('nim', 'mhs', 'NAMA');
        $crud->display_as('nim', 'Nama Mahasiswa');
        $crud->field_type('status_verifikasi', 'invisible');
        $crud->set_rules('task_id', 'Task', 'callback_cek_task_tersedia');
        $crud->set_field_upload('dokumen', 'assets/uploads/files/');
        $output = $crud->render();
        $output->laporanActive = 'active';
        return $output;
    }
    function magang_mhs()
    {
        $crud = new grocery_CRUD();
        $crud->unset_add();
        $crud->unset_delete();
        // $crud->unset_read();
        $crud->unset_edit();
        $crud->set_table('skpi_trans');
        $crud->set_subject('Magang');
        $crud->where('status_verifikasi', 'Terverifikasi');
        $crud->where('jenis_id', 4);
        $crud->where('skpi_trans.nim',$this->session->userdata('skpi_nim'));
        $crud->columns('task_id', 'jenis_id', 'nim', 'kegiatan', 'lembaga', 'dokumen', 'tgl_isi');
        $crud->set_relation('task_id', 'skpi_task', 'nama');
        $crud->display_as('task_id', 'Nama Task');
        $crud->set_relation('jenis_id', 'skpi_jenis', 'nama');
        $crud->display_as('jenis_id', 'Jenis SKPI');
        $crud->set_relation('nim', 'mhs', 'NAMA');
        $crud->display_as('nim', 'Nama Mahasiswa');
        $crud->field_type('status_verifikasi', 'invisible');
        $crud->set_rules('task_id', 'Task', 'callback_cek_task_tersedia');
        $crud->set_field_upload('dokumen', 'assets/uploads/files/');
        $output = $crud->render();
        $output->laporanActive = 'active';
        return $output;
    }
    function skpi_verified()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('skpi_trans');
        $crud->unset_add();
        $crud->where('status_verifikasi', 'Terverifikasi');
        $crud->columns('task_id', 'jenis_id', 'nim', 'kegiatan', 'lembaga', 'dokumen', 'status_verifikasi', 'tgl_isi', 'tgl_verifikasi');
        $crud->set_subject('SKPI Verified');
        $crud->required_fields("task_id", "jenis_id", "nim", 'kegiatan', 'lembaga');
        // $where = "skpi_tas.batas_akhir <= $hariJamIni";
        $crud->set_relation('task_id', 'skpi_task', 'nama');
        $crud->display_as('task_id', 'Nama Task');
        $crud->set_relation('jenis_id', 'skpi_jenis', 'nama');
        $crud->display_as('jenis_id', 'Jenis SKPI');
        $crud->set_relation('nim', 'mhs', 'NAMA');
        $crud->display_as('nim', 'Nama Mahasiswa');
        $crud->field_type('status_verifikasi', 'invisible');
        $crud->field_type('tgl_verifikasi', 'invisible');
        $crud->set_rules('task_id', 'Task', 'callback_cek_task_tersedia');
        $crud->set_field_upload('dokumen', 'assets/uploads/files/');
        $output = $crud->render();
        $output->transaksiActive = 'active';
        return $output;
    }
    function skpi_pengembalian()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('skpi_trans');
        $crud->unset_add();
        $crud->where("status_verifikasi in ('Pengembalian Ke Mahasiswa','Pengembalian Ke Admin')");
        $crud->columns('task_id', 'jenis_id', 'nim', 'kegiatan', 'lembaga', 'dokumen', 'status_verifikasi', 'keterangan');
        $crud->set_subject('SKPI Pengembalian');
        $crud->required_fields("task_id", "jenis_id", "nim", 'kegiatan', 'lembaga');
        // $where = "skpi_tas.batas_akhir <= $hariJamIni";
        $crud->set_relation('task_id', 'skpi_task', 'nama');
        $crud->display_as('task_id', 'Nama Task');
        $crud->set_relation('jenis_id', 'skpi_jenis', 'nama');
        $crud->display_as('jenis_id', 'Jenis SKPI');
        $crud->set_relation('nim', 'mhs', 'NAMA');
        $crud->display_as('nim', 'Nama Mahasiswa');
        $crud->field_type('status_verifikasi', 'invisible');
        $crud->field_type('tgl_verifikasi', 'invisible');
        $crud->set_rules('task_id', 'Task', 'callback_cek_task_tersedia');
        $crud->set_field_upload('dokumen', 'assets/uploads/files/');
        $output = $crud->render();
        $output->transaksiActive = 'active';
        return $output;
    }
    function tr_skpi()
    {
        $hariJamIni = date('Y-m-d H:i:s');
        $crud = new grocery_CRUD();
        $crud->set_table('skpi_trans');
        $crud->where('status_verifikasi', 'Belum Terverifikasi');
        $crud->columns('task_id', 'jenis_id', 'nim', 'kegiatan', 'lembaga', 'dokumen', 'status_verifikasi', 'tgl_isi');
        $crud->set_subject('Input SKPI');
        $crud->add_action('Verifikasi', '', 'admin/verifikasi', 'fa fa-check', '', 'confirm_type', 'Anda Akan Memverifikasi');
        $crud->add_multi_button('Verifikasi', 'admin/verifikasiBulk', 'fa fa-check', true, 'Verifikasi', 'Anda Akan Memverifikasi', 'default_type');
        $crud->required_fields("task_id", "jenis_id", "nim", 'kegiatan', 'lembaga');
        // $where = "skpi_tas.batas_akhir <= $hariJamIni";
        $crud->set_relation('task_id', 'skpi_task', 'nama', array('skpi_task.batas_akhir >=' => $hariJamIni, false), 'id asc');
        $crud->display_as('task_id', 'Nama Task');
        $crud->set_relation('jenis_id', 'skpi_jenis', 'nama', null, 'id asc');
        $crud->display_as('jenis_id', 'Jenis SKPI');
        $crud->set_relation('nim', 'mhs', 'NAMA');
        $crud->display_as('nim', 'Nama Mahasiswa');
        $crud->field_type('status_verifikasi', 'invisible');
        $crud->field_type('tgl_verifikasi', 'invisible');
        $crud->field_type('tgl_pengembalian_ke_mahasiswa', 'invisible');
        $crud->field_type('tgl_pengembalian_ke_admin', 'invisible');
        $crud->field_type('keterangan', 'invisible');
        $crud->field_type('tgl_isi', 'hidden', $hariJamIni);
        $crud->set_rules('task_id', 'Task', 'callback_cek_task_tersedia');
        $crud->set_field_upload('dokumen', 'assets/uploads/files/');
        $output = $crud->render();
        $output->transaksiActive = 'active';
        return $output;
    }
    
    function set_pengembalian_ke_admin($post_array,$primary_key)
    {
        $data = array(
            "status_verifikasi" => 'Pengembalian Ke Admin',
            "tgl_pengembalian_ke_admin" => date('Y-m-d H:i:s')
        );
    
        $this->db->update('skpi_trans',$data,array('id' => $primary_key));
    
        return true;
    }
    function tr_skpi_mhs()
    {
        $hariJamIni = date('Y-m-d H:i:s');
        $user_id =$this->session->userdata('skpi_nim');
        $crud = new grocery_CRUD();
        // $crud->where('status_verifikasi','Belum Terverifikasi');
        $crud->where("status_verifikasi != 'Terverifikasi'");
        $crud->where('skpi_trans.nim',$user_id);
        $crud->set_table('skpi_trans');
        $crud->columns('task_id', 'jenis_id', 'kegiatan', 'lembaga', 'dokumen', 'status_verifikasi', 'tgl_isi');
        $crud->set_subject('Input SKPI');
        $crud->required_fields("task_id", "jenis_id", 'kegiatan', 'lembaga','dokumen');
        $crud->set_relation('task_id', 'skpi_task', 'nama', array('skpi_task.batas_akhir >=' => $hariJamIni, false), 'id asc');
        $crud->display_as('task_id', 'Nama Task');
        $crud->set_relation('jenis_id', 'skpi_jenis', 'nama', null, 'id asc');
        $crud->display_as('jenis_id', 'Jenis SKPI');
        $crud->field_type('status_verifikasi', 'invisible');
        $crud->field_type('tgl_verifikasi', 'invisible');
        $crud->field_type('tgl_pengembalian_ke_mahasiswa', 'invisible');
        $crud->field_type('tgl_pengembalian_ke_admin', 'invisible');
        $crud->field_type('keterangan', 'invisible');
        $crud->field_type('nim', 'hidden',$user_id);
        $crud->field_type('tgl_isi', 'hidden', $hariJamIni);
        $crud->set_rules('task_id', 'Task', 'callback_cek_task_tersedia');
        $crud->set_rules('jenis_id', 'Kategori', 'callback_cek_jumlah_input');
        $crud->set_field_upload('dokumen', 'assets/uploads/files/');
        $output = $crud->render();
        $output->transaksiActive = 'active';
        return $output;
    }
    function verifikasi($id = null)
    {
        $this->db->set(array('status_verifikasi' => 'Terverifikasi', 'tgl_verifikasi' => date('Y-m-d H:i:s')))->where('id', $id)->update('skpi_trans');
        return array('success' => true);
    }
    function verifikasiBulk()
    {
        $idHilangSlash = $this->master->whereInMultiButton();
        $this->db->where("id in ($idHilangSlash)")->update('skpi_trans', array('status_verifikasi' => 'Terverifikasi', 'tgl_verifikasi' => date('Y-m-d H:i:s')));
        return array('success' => true);
    }
    function cek_jumlah_input($task_id = null, $tgl_isi = null,$nim=null,$jenis_id=null){
        //cek boleh isi banyak tidak
        $getPengaturan = $this->db->get_where('skpi_jenis',array('id'=>$jenis_id,'hanya_satu_isian'=>1))->row();
        if(!empty($getPengaturan)){
            //hanya satu
            $sudahMengisi = $this->db->get_where('skpi_trans',array('nim'=>$nim,'jenis_id'=>$jenis_id))->row();
            if(empty($sudahMengisi)){
                return true;
            }else{
                $this->form_validation->set_message('cek_jumlah_input', 'Anda Telah mengisi Kategori SKPI Ini Sebelumnya');
                return false;
            }
        }else{
            //boleh banyak
            return true;
        }
    }
    function cek_task_tersedia($task_id = null, $tgl_isi = null,$nim=null,$jenis_id=null)
    {
        $getTask = $this->db->where("batas_akhir >= '$tgl_isi'")->get_where('skpi_task', array('id' => $task_id))->row();
        if (!empty($getTask)) {
            //cek yang isian harus cuman satu
           return true;
        } else {
            $this->form_validation->set_message('cek_task_tersedia', 'Task Yang Dipilih Tidak Tersedia');
            return false;
        }

       
    }
    /*
    function generateBatchAttLog($tanggal=null,$pegawai_id=null,$shift_id,$masuk,$keluar,$jenis_presensi_id){
        $no=0;
        if(!empty($tanggal)){
            if(!empty($pegawai_id)){
				$queryBatch = "insert into sipot_log_presensi(tanggal,pegawai_id,shift_id,masuk,keluar,jenis_presensi_id,keterangan,flag) values ";
                foreach($tanggal as $tg){
                    foreach($pegawai_id as $key=> $pg){
						 (!empty($masuk))?$data[$no]['masuk']=$masuk:'';
                         (!empty($keluar))?$data[$no]['keluar']=$keluar:'';
						$queryBatch .= "('$tg->date_dummy','$pg','$shift_id','$masuk','$keluar','$jenis_presensi_id','Input Multi Manual','Input Manual'),";
                        //$data[$no]=array('tanggal'=>$tg->date_dummy,
                                    //  'pegawai_id'=>$pg,
                                    //  'shift_id'=>$shift_id,
                                   //   'jenis_presensi_id'=>$jenis_presensi_id,
                                    //  'keterangan'=>'Input Multi Manual',
                                    //  'flag'=>'Input Manual'
                                   // );
                                  //  $no++;
                    }
                }
				$queryBatchRemove = rtrim($queryBatch,",");
				$queryBatchRemove .=" ON DUPLICATE KEY UPDATE jenis_presensi_id = $jenis_presensi_id";
			
                mysqli_next_result($this->db->conn_id);
                $this->db->query($queryBatchRemove);
               
            }
        }
    }
    function simpanFormAttLog(){
        $tanggal=$this->lp->getInputTanggal('tanggal');
        $pegawai_id = $this->input->post('pegawai_id',true);
        $jadwal_id = $this->input->post('jadwal_id',true);
        $masuk = $this->input->post('masuk',true);
        $keluar = $this->input->post('keluar',true);
        $jenis_presensi_id = $this->input->post('jenis_presensi_id',true);
       $hasil=(!empty($tanggal))?true:false;
       $hasil=(!empty($pegawai_id))?true:false;
       $hasil=(!empty($jadwal_id))?true:false;
       $hasil=(!empty($jenis_presensi_id))?true:false;
        if($hasil){
            $getDetailShift = $this->db->get_where('sipot_shift',array('id'=>$jadwal_id))->row();
            if($getDetailShift->sabtu_wajib_masuk==1){
                //select semua tanggal include sabtu minggu
                $multiTanggal=$this->lp->generateTanggal($tanggal);
                $this->generateBatchAttLog($multiTanggal,$pegawai_id,$jadwal_id,$masuk,$keluar,$jenis_presensi_id);
            }else{
                //select semua tanggal non sabtu minggu
                $multiTanggal=$this->lp->generateTanggalNonWeekend($tanggal);
                $this->generateBatchAttLog($multiTanggal,$pegawai_id,$jadwal_id,$masuk,$keluar,$jenis_presensi_id);
            }
            return array('success'=>true);
        }
    }
    function simpanPasangJadwal()
    {
        $id = $this->input->post('id', true);
        $jadwal_id = $this->input->post('jadwal_id', true);
        $tgl_mulai_berlaku = $this->input->post('tgl_mulai_berlaku', true);
        $asArray = explode(",", $id);
        // $this->general->testPre($asArray);
        // $data = array();
        foreach ($asArray as $key => $val) {
            $data[] = array(
                'pegawai_id' => $val,
                'jadwal_id' => $jadwal_id,
                'tgl_mulai_berlaku' => $tgl_mulai_berlaku
            );
        }

        $this->db->insert_batch('sipot_tr_jadwal', $data);
    }
	function updateLogJadwal()
    {
        // $id = $this->input->post('id', true);
        // $jadwal_id = $this->input->post('jadwal_id', true);
        // $tgl_mulai_berlaku = $this->input->post('tgl_mulai_berlaku', true);
        // $asArray = explode(",", $id);
        $this->general->testPre($asArray);
        $data = array();
        // foreach ($asArray as $key => $val) {
            // $data[] = array(
                // 'pegawai_id' => $val,
                // 'jadwal_id' => $jadwal_id,
                // 'tgl_mulai_berlaku' => $tgl_mulai_berlaku
            // );
        // }

        // $this->db->insert_batch('sipot_tr_jadwal', $data);
    }
    function sisaCuti()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('sipot_sisa_cuti');
        $crud->set_subject('Sisa Cuti');
        $crud->display_as('pegawai_id', 'Pegawai');
        $crud->required_fields('pegawai_id', 'tahun', 'sisa');
        $crud->set_relation('pegawai_id', 'sipot_pegawai', 'nama');
        $crud->add_button_side_add('Atur Jatah Cuti Otomatis', 'admin/configSisaCuti', 'fa fa-gear', true);
        $crud->unset_edit();
        $crud->set_rules('pegawai_id', 'Pegawai', 'callback_cek_sisa_cuti');
        $crud->callback_before_insert(array($this, 'setTahunCuti'));
        $output = $crud->render();
        $output->transaksiActive = 'active';
        return $output;
    }
	
 function hariLibur()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('sipot_hari_libur');
        $crud->set_subject('Hari Libur');
        $crud->required_fields('tanggal', 'keterangan');
        $output = $crud->render();
        $output->transaksiActive = 'active';
        return $output;
    }

    function setTahunCuti($post_array)
    {
        $post_array['tahun'] = substr($post_array['tahun'], 0, 4) . '-01-01';
        return $post_array;
    }

    function cek_sisa_cuti($pin = null, $tahun)
    {
        $operation = $this->uri->segment(3);
        if ($operation != 'update_validation') {
            $tahun = substr($tahun, 0, 4);
            $getCutiExist = $this->db->get_where('sipot_sisa_cuti', array('pegawai_id' => $pin, 'year(tahun)' => $tahun))->row();
            if (empty($getCutiExist)) {
                return true;
            } else {
                $this->form_validation->set_message('cek_sisa_cuti', 'Cuti Pada Tahun ' . $tahun . ' Telah Disetting Untuk Pegawai Yang Bersangkutan');
                return false;
            }
        } else {
            //jika operasi update jangan divalidasi
            return true;
        }
    }
    function configSisaCuti()
    {
        $tahun = date('Y') . '-01-01';
        $this->db->query("insert ignore into sipot_sisa_cuti (select id,'$tahun',12 from sipot_pegawai)");
    }
    function profile_pegawai()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('profile_pegawai');
        $crud->set_primary_key('id');
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_read();
        $crud->unset_edit();
        // $crud->set_primary_key('profil_pegawai','id');
        $output = $crud->render();
        $output->transaksiActive = 'active';
        return $output;
    }
    function durasiMinimum()
    {
        $dataMinimum = $this->db->get_where('sipot_durasi_minimum')->row();
        $content = $this->load->view('pengaturan/detail', compact('dataMinimum'), true);
        $temp = $this->load->view("pluggins/panel_bootstrap", array('headerPanel' => 'Durasi Minimum', 'contentPanel' => $content), true);
        $output = array('pengaturanActive' => 'active', 'output' => $temp);
        return $output;
    }
    function updateDurasiMinimum()
    {
        // $this->general->testPre($_POST);
        if (!empty($this->input->post('is_cut_off_aktif', true))) {
            $is_active = 1;
        } else {
            $is_active = 0;
        }
        if (!empty($this->input->post('log_public', true))) {
            $is_public = 1;
        } else {
            $is_public = 0;
        }
        $id = $this->input->post('id', true);
        $data = array(
            'minim_jam_kerja' => $this->input->post('minim_jam_kerja', true),
            'jam_cut_off' => $this->input->post('jam_cut_off', true),
            'is_cut_off_active' => $is_active,
            'minim_jam_kerja_lembur' => $this->input->post('minim_jam_kerja_lembur', true),
            'minim_jam_lembur' => $this->input->post('minim_jam_lembur', true),
            'aupk'=>$this->input->post('aupk'),
            'okh'=>$this->input->post('okh'),
            'log_public'=>$is_public,
            'durasi_refresh_public'=>$this->input->post('durasi_refresh_public',true)
        );
        $this->db->where('id', $id)->update('sipot_durasi_minimum', $data);
        return array('success' => true, 'msg' => 'Update Pengaturan Berhasil');
    }
    function getTtd(){
       return $ttd = $this->db->query("select nip,nama from sipot_pegawai where id = (select okh from sipot_durasi_minimum limit 1) or id = (select aupk from sipot_durasi_minimum limit 1)")->result();
    }
    function resetPassword($id=null){
        $this->db->set('password',md5('123456'))->where('id',$id)->update('sipot_pegawai');
        return array('success'=>true);
    }
    function resetPasswordBulk(){
       $idHilangSlash=$this->master->whereInMultiButton();
        $this->db->where("id in ($idHilangSlash)")->update('sipot_pegawai',array('password'=>md5('123456')));
        return array('success'=>true);
    }
    */
}
