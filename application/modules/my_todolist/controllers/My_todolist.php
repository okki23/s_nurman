<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_todolist extends Parent_controller {

  var $parsing_form_input = array('id','id_claim','id_pic','priority','status','date_assign','note');
  var $tablename = 'trans_assign';

    public function __construct() {
        parent::__construct();
        $this->load->model('m_my_todolist','mat');

        if ($this->session->userdata('username') == '') {
            redirect(base_url('login'));
        }
    }


    public function index() {
        $data['judul'] = $this->data['judul'];
        $data['parse_view'] = 'my_todolist/my_todolist_view';
        $usersess = $this->session->userdata('user_id');
        $data['listing'] = $this->mat->list_my_todolist($usersess);

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

          $data['parse_view'] = 'my_todolist/my_todolist_store';
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
               window.location='" . base_url('my_todolist') . "';
                   </script>";
      }else{
            echo "<script language=javascript>
             alert('Gagal Simpan Data');
             window.location='" . base_url('my_todolist') . "';
                 </script>";
      }


    }

    public function update(){

      $datapos = array('id'=>$this->input->post('id'),
                       'id_pic'=>$this->input->post('id_pic'),
                       'status'=>$this->input->post('status'),
                       'date_after_assign'=>$this->input->post('date_after_assign'),
                       'note_after_assign'=>$this->input->post('note_after_assign'),
                       'photo_before_assign'=>$this->input->post('photo_before_assign'),
                       'photo_after_assign'=>$this->input->post('photo_after_assign'));
      /*
      var_dump($datapos);
      exit();
      */
      $save =  $this->db->query("update trans_assign set status = '$datapos[status]', date_after_assign = '$datapos[date_after_assign]', note_after_assign = '$datapos[note_after_assign]', photo_before_assign = '$datapos[photo_before_assign]', photo_after_assign = '$datapos[photo_after_assign]' where id = '$datapos[id]' and id_pic = '$datapos[id_pic]' ");
      //echo "update trans_assign set status = '$datapos[status]', date_after_assign = '$datapos[date_after_assign]', note_after_assign = '$datapos[note_after_assign]', photo_before_assign = '$datapos[photo_before_assign]', photo_after_assign = '$datapos[photo_after_assign]' where id = '$datapos[id]' and id_pic = '$datapos[id_pic]' ";
      //exit();
      /*  $id = isset($datapos['id']) ? $datapos['id'] : '';
        $save = $this->mat->save($datapos,$id,$this->tablename);*/


        $config['upload_path'] = "uploads/";
        $config['allowed_types'] = 'gif|bmp|jpg|jpeg|png';
        $config['max_size'] = 5000;
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($datapos['photo_before_assign'] != '') {
            $this->upload->do_upload('photo_before_assignx');
        }
        if ($datapos['photo_after_assign'] != '') {
            $this->upload->do_upload('photo_after_assignx');
        }

      if($save){
              echo "<script language=javascript>
               alert('Simpan Data Berhasil');
               window.location='" . base_url('my_todolist') . "';
                   </script>";
      }else{
            echo "<script language=javascript>
             alert('Gagal Simpan Data');
             window.location='" . base_url('my_todolist') . "';
                 </script>";
      }


    }



    public function delete(){
      $idpost = $this->uri->segment(3);
      $del = $this->mat->delete($idpost,$this->tablename);

      if($del){
        echo "<script language=javascript>
         alert('Hapus Data Berhasil');
         window.location='" . base_url('my_todolist') . "';
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
