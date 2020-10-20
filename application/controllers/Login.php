<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    var $is_login;
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('General_model', 'general', true);
        $this->load->model('Laporan_model', 'lp', true);
        $this->load->helper(array('Form', 'Cookie', 'String'));
    }

    function template_login()
    {
        $this->load->view('login');
    }

    function index()
    {
        $cookie = get_cookie('indonesiaraya');
        if ($this->access->is_login()) {
            $this->general->redirectSkpi();
        } else if ($cookie <> '') {
            // cek cookie
            $row = $this->access->get_by_cookie($cookie)->row();
            if ($row) {
                $this->access->set_session($row);
                $this->general->redirectSkpi();
            } else {
                $this->showLogin();
            }
        } else {
            $this->showLogin();
        }
    }

    function masuk()
    {
        if ($this->access->is_login()) {
            $this->general->redirectSkpi();
        } else {
            $this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->template_login();
            } else {
                $this->general->redirectSkpi();
            }
        }
    }


    function username_check()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $login_as = $this->input->post('login_as', true);
        $dataUser = $this->access->login($username, $password, $login_as);

        if ($dataUser) {
            return true;
        } else {
            $this->form_validation->set_message('username_check', 'Username dan Password Salah');
            return false;
        }
    }

    function showLogin()
    {
        $this->template_login();
    }

    function keluar()
    {
        $this->access->logout();
        $this->showLogin();
    }
}
