<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_user extends Parent_controller {


    public function __construct() {
        parent::__construct();

    }

    public function index() {
        $data['judul'] = $this->data['judul'];

        $data['parse_view'] = 'dashboard_user/dashboard_user_view';

        $this->load->view('template_user', $data);
    }



}
