<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Assign_task extends Parent_controller {

  var $parsing_form_input = array('id','id_claim','id_pic','priority','status','date_assign','note');
  var $tablename = 'trans_assign';

    public function __construct() {
        parent::__construct();
        $this->load->model('m_assign_task','mat');

        if ($this->session->userdata('username') == '') {
            redirect(base_url('login'));
        }
    }


    public function index() {
        $data['judul'] = $this->data['judul'];
        $data['parse_view'] = 'assign_task/assign_task_view';
        $data['listing'] = $this->mat->list_assign_task();

        //session
        $data['username'] = $this->session->userdata('username');
        $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
        $data['user_id'] = $this->session->userdata('user_id');

        $this->load->view('template', $data);
    }



    public function store(){
    $data['judul'] = $this->data['judul'];
     $id = $this->uri->segment(3);

          if($id == '' || empty($id) || $id == NULL){
            $data['parseform'] = $this->mat->get_new($this->parsing_form_input);
          }else{
            $data['parseform'] = $this->mat->get_all($id,$this->tablename)->row();
          }


          $data['opt_claim'] = $this->mat->opt_claim();
          $data['opt_pic'] = $this->mat->opt_pic();

          $data['parse_view'] = 'assign_task/assign_task_store';
          //session
          $data['username'] = $this->session->userdata('username');
          $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
          $data['user_id'] = $this->session->userdata('user_id');

          $this->load->view('template', $data);
    }


    public function save(){

      $datapos = $this->mat->input_array($this->parsing_form_input);
      $id = isset($datapos['id']) ? $datapos['id'] : '';
      $save = $this->mat->save($datapos,$id,$this->tablename);


      if($save){
              echo "<script language=javascript>
               alert('Simpan Data Berhasil');
               window.location='" . base_url('assign_task') . "';
                   </script>";
      }else{
            echo "<script language=javascript>
             alert('Gagal Simpan Data');
             window.location='" . base_url('assign_task') . "';
                 </script>";
      }

     
    }

    public function delete(){
      $idpost = $this->uri->segment(3);
      $del = $this->mat->delete($idpost,$this->tablename);

      if($del){
        echo "<script language=javascript>
         alert('Hapus Data Berhasil');
         window.location='" . base_url('assign_task') . "';
             </script>";
      }
    }


    public function transaksi_id($param = '') {
        $data = $this->mat->get_no();
        $lastid = $data->row();
        $idnya = $lastid->id;


        if ($idnya == '') { // bila data kosong
            $ID = $param . "0000001";
            //00000001
        } else {
            $MaksID = $idnya;
            $MaksID++;
            if ($MaksID < 10)
                $ID = $param . "000000" . $MaksID;
            else if ($MaksID < 100)
                $ID = $param . "00000" . $MaksID;
            else if ($MaksID < 1000)
                $ID = $param . "0000" . $MaksID;
            else if ($MaksID < 10000)
                $ID = $param . "000" . $MaksID;
            else if ($MaksID < 100000)
                $ID = $param . "00" . $MaksID;
            else if ($MaksID < 1000000)
                $ID = $param . "0" . $MaksID;
            else
                $ID = $MaksID;
        }

        return $ID;
    }



}
