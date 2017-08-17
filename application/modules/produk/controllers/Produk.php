<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class produk extends Parent_controller {

  var $parsing_form_input = array('id','kode_produk','nama_produk','foto_produk');
  var $tablename = 'm_product';

    public function __construct() {
        parent::__construct();
        $this->load->model('m_produk');

        if ($this->session->userdata('username') == '') {
            redirect(base_url('login'));
        }
    }

    public function index() {
        $data['judul'] = $this->data['judul'];

        $data['parse_view'] = 'produk/produk_view';
        $data['listing'] = $this->m_produk->get_all($id=NULL,$this->tablename);

        //session
        $data['username'] = $this->session->userdata('username');
        $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
        $data['produk_id'] = $this->session->userdata('produk_id');

        $this->load->view('template', $data);
    }



    public function store(){
        $id = $this->uri->segment(3);
        $data['judul'] = $this->data['judul'];
          if($id == '' || empty($id) || $id == NULL){
            $data['parseform'] = $this->m_produk->get_new($this->parsing_form_input);
          }else{
            $data['parseform'] = $this->m_produk->get_all($id,$this->tablename)->row();
          }

          $data['parse_view'] = 'produk/produk_store';
          //session
          $data['username'] = $this->session->userdata('username');
          $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
          $data['produk_id'] = $this->session->userdata('produk_id');
          $this->load->view('template', $data);
    }


    public function save(){
      $posfile = $this->input->post('foto_produk');
      $datapos = $this->m_produk->input_array($this->parsing_form_input);
      $id = isset($datapos['id']) ? $datapos['id'] : '';
      $save = $this->m_produk->save($datapos,$id,$this->tablename);

      $config['upload_path'] = "uploads/";
      $config['allowed_types'] = 'gif|bmp|jpg|jpeg|png';
      $config['max_size'] = 5000;
      $config['remove_spaces'] = TRUE;
      $this->load->library('upload');
      $this->upload->initialize($config);
      if ($posfile != '') {
          $this->upload->do_upload('foto_produkx');
      }

      if($save){
        echo "<script language=javascript>
         alert('Simpan Data Berhasil');
         window.location='" . base_url('produk') . "';
             </script>";
      }

    }

    public function delete(){
      $idpost = $this->uri->segment(3);
      $get = $this->db->query("select * from m_product where id = '$idpost'")->row();
      if($get->foto_produk != '' || $get->foto_produk == NULL){
          unlink("uploads/".str_replace(" ","_",$get->foto_produk));
      }
      $del = $this->m_produk->delete($idpost,$this->tablename);





      if($del){
        echo "<script language=javascript>
         alert('Hapus Data Berhasil');
         window.location='" . base_url('produk') . "';
             </script>";
      }
    }





}
