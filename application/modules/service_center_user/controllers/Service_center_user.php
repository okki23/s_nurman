<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Service_center_user extends Parent_controller {
  var $parsing_form_input = array('id','kode_sc','nama_sc','alamat_sc','pic_sc','telp_sc','email_sc','foto_sc');
  var $tablename = 'm_service_center';


    public function __construct() {
        parent::__construct();
        $this->load->model('m_service_center_user','mssu');
    }

    public function index() {
        $data['judul'] = $this->data['judul'];

        $data['listing'] = $this->mssu->get_all($id=NULL,$this->tablename)->result();

        $data['parse_view'] = 'service_center_user/service_center_user_view';

        $this->load->view('template_user', $data);
    }



}
