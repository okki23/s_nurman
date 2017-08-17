<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends Parent_controller {

  var $parsing_form_input = array('id','nik','nama','alamat','no_telp','email');
  var $tablename = 'm_employee';

    public function __construct() {
        parent::__construct();
        $this->load->model('m_pegawai');

        if ($this->session->userdata('username') == '') {
            redirect(base_url('login'));
        }
    }

    public function index() {
        $data['judul'] = $this->data['judul'];

        $data['parse_view'] = 'pegawai/pegawai_view';
        $data['listing'] = $this->m_pegawai->get_all($id=NULL,$this->tablename);

        //session
        $data['username'] = $this->session->userdata('username');
        $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
        $data['pegawai_id'] = $this->session->userdata('pegawai_id');

        $this->load->view('template', $data);
    }



    public function store(){
        $id = $this->uri->segment(3);
        $data['judul'] = $this->data['judul'];
          if($id == '' || empty($id) || $id == NULL){
            $data['parseform'] = $this->m_pegawai->get_new($this->parsing_form_input);
          }else{
            $data['parseform'] = $this->m_pegawai->get_all($id,$this->tablename)->row();
          }

          $data['parse_view'] = 'pegawai/pegawai_store';
          //session
          $data['username'] = $this->session->userdata('username');
          $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
          $data['pegawai_id'] = $this->session->userdata('pegawai_id');
          $this->load->view('template', $data);
    }


    public function save(){

      $datapos = $this->m_pegawai->input_array($this->parsing_form_input);
      $id = isset($datapos['id']) ? $datapos['id'] : '';
      $save = $this->m_pegawai->save($datapos,$id,$this->tablename);

      if($save){
        echo "<script language=javascript>
         alert('Simpan Data Berhasil');
         window.location='" . base_url('pegawai') . "';
             </script>";
      }

    }

    public function delete(){
      $idpost = $this->uri->segment(3);
      $del = $this->m_pegawai->delete($idpost,$this->tablename);

      if($del){
        echo "<script language=javascript>
         alert('Hapus Data Berhasil');
         window.location='" . base_url('pegawai') . "';
             </script>";
      }
    }





}
