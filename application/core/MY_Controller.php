<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->CI = &get_instance();

        if (!$this->access->is_login()) {
            redirect('login');
        }
    }
}


class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }
}
