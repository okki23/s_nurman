<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class service_center extends Parent_controller {

  var $parsing_form_input = array('id','kode_sc','nama_sc','alamat_sc','pic_sc','telp_sc','email_sc','foto_sc');
  var $tablename = 'm_service_center';

    public function __construct() {
        parent::__construct();
        $this->load->model('m_service_center');

        if ($this->session->userdata('username') == '') {
            redirect(base_url('login'));
        }
    }

    public function index() {
        $data['judul'] = $this->data['judul'];

        $data['parse_view'] = 'service_center/service_center_view';
        $data['listing'] = $this->m_service_center->get_all($id=NULL,$this->tablename);

        //session
        $data['username'] = $this->session->userdata('username');
        $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
        $data['user_id'] = $this->session->userdata('user_id');

        $this->load->view('template', $data);
    }



    public function store(){
        $id = $this->uri->segment(3);
        $data['judul'] = $this->data['judul'];
          if($id == '' || empty($id) || $id == NULL){
            $data['parseform'] = $this->m_service_center->get_new($this->parsing_form_input);
          }else{
            $data['parseform'] = $this->m_service_center->get_all($id,$this->tablename)->row();
          }

          $data['parse_view'] = 'service_center/service_center_store';
          $data['opt_pegawai'] = $this->m_service_center->opt_pegawai();
          //session
          $data['username'] = $this->session->userdata('username');
          $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
          $data['user_id'] = $this->session->userdata('user_id');
          $this->load->view('template', $data);
    }


    public function save(){
      $posfile = $this->input->post('foto_sc');
      $datapos = $this->m_service_center->input_array($this->parsing_form_input);
      $id = isset($datapos['id']) ? $datapos['id'] : '';
      $save = $this->m_service_center->save($datapos,$id,$this->tablename);

      $config['upload_path'] = "uploads/";
      $config['allowed_types'] = 'gif|bmp|jpg|jpeg|png';
      $config['max_size'] = 5000;
      $config['remove_spaces'] = TRUE;
      $this->load->library('upload');
      $this->upload->initialize($config);
      if ($posfile != '') {
          $this->upload->do_upload('foto_scx');
      }

      if($save){
        echo "<script language=javascript>
         alert('Simpan Data Berhasil');
         window.location='" . base_url('service_center') . "';
             </script>";
      }

    }

    public function delete(){
      $idpost = $this->uri->segment(3);
      $get = $this->db->query("select * from m_service_center where id = '$idpost'")->row();
      if($get->foto_sc != '' || $get->foto_sc == NULL){
          unlink("uploads/".str_replace(" ","_",$get->foto_sc));
      }
      $del = $this->m_service_center->delete($idpost,$this->tablename);





      if($del){
        echo "<script language=javascript>
         alert('Hapus Data Berhasil');
         window.location='" . base_url('service_center') . "';
             </script>";
      }
    }





}
