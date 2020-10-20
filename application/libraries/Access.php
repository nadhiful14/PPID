<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Access
{

    function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('general_model', 'general', true);
        $this->general = &$this->CI->general;
    }

    public function get_by_cookie($cookie)
    {
        $this->CI->db->where('cookie', $cookie);
        return $this->CI->db->get('user');
    }

    function login($username, $password, $remember)
    {
        $result = $this->general->getLogin($username);
        if ($result) {
            if ($result->password == md5($password)) {
                $this->set_session($result, $remember);
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
    function set_session($result = null, $remember = null)
    {

        $data = array(
            'foto' => (empty($result->foto)) ? 'default.png' : $result->foto,
            'admin_id' => $result->id,
            'admin_nama' => $result->fullname,
            'is_login_admin' => true,
            'is_login' => true
        );
        if (!empty($remember)) {
            $key = random_string('alnum', 64);
            set_cookie('indonesiaraya', $key, 3600 * 24 * 30); // set expired 30 hari kedepan
            // simpan key di database
            $data['cookie'] = $key;
            $this->updateCookieDb($key, $result->id);
        }
        $this->CI->session->set_userdata($data);
    }

    function updateCookieDb($key = null, $id = null)
    {
        return $this->CI->db->set('cookie', $key)->where('id', $id)->update('user');
    }

    function is_login()
    {
        return (($this->CI->session->has_userdata('is_login_admin')) ? true : false);
    }


    function logout()
    {
        set_cookie('indonesiaraya', '');
        $this->CI->db->set('cookie', '')->where('id', $this->CI->session->userdata('admin_id'))->update('user');
        $data = array(
            'foto' => '', 'admin_id' => '', 'admin_nama' => '', 'is_login_admin' => '', 'is_login' => '',
            'nim' => '', 'nama' => '', 'prodi' => '', 'is_login_mhs' => '', 'is_login' => ''
        );
        $this->CI->session->unset_userdata($data);
        $this->CI->session->sess_destroy();
    }

    //==================================================================== akhir untuk dosen			
}
