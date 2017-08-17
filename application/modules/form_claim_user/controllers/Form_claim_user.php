<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Form_claim_user extends Parent_controller {

  var $parsing_form_input = array('id','no_registrasi','nama_pelanggan','alamat_pelanggan','telp_pelanggan','email_pelanggan','id_product','jenis_keluhan','jenis_keluhan_other','foto_keluhan','catatan','date_insert');
  var $tablename = 'trans_claim';

    public function __construct() {
        parent::__construct();
        $this->load->model("m_form_claim_user","mfcu");
    }

    public function index() {
        $data['judul'] = $this->data['judul'];

        $data['list_barang'] = $this->mfcu->list_barang();
        $data['parse_view'] = 'form_claim_user/form_claim_user_view';

        $data['last_id'] = $this->transaksi_id();

        $this->load->view('template_user', $data);
    }

    public function store(){
        $data['judul'] = $this->data['judul'];

        $id = $this->uri->segment(3);

        if($id == '' || empty($id) || $id == NULL){
          $data['parseform'] = $this->m_form_claim_user->get_new($this->parsing_form_input);

        }else{
          $data['parseform'] = $this->m_form_claim_user->get_all($id,$this->tablename)->row();

        }
        $data['parse_view'] = 'form_claim_user/form_claim_user_store';

        //session
        $data['username'] = $this->session->userdata('username');
        $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
        $data['user_id'] = $this->session->userdata('user_id');
        $this->load->view('template', $data);
    }


    public function save(){
      $posfile = $this->input->post('foto_keluhanx');
      $datapos = $this->mfcu->input_array($this->parsing_form_input);
      $id = isset($datapos['id']) ? $datapos['id'] : '';
      $save = $this->mfcu->save($datapos,$id,$this->tablename);

      $config['upload_path'] = "uploads/";
      $config['allowed_types'] = 'gif|bmp|jpg|jpeg|png';
      $config['max_size'] = 5000;
      $config['remove_spaces'] = TRUE;
      $this->load->library('upload');
      $this->upload->initialize($config);
      if ($posfile != '') {
          $this->upload->do_upload('foto_keluhan');
      }

      //get_included_files

      $this->load->library('email');

     $this->email->to('okkisetyawan@gmail.com');
     $this->email->from($datapos['email_pelanggan']);
     $this->email->subject('New Customer Claim/Service From : '.$datapos['nama_pelanggan']);
     $this->email->message('Information of Customer : <br>
     Nomor Registrasi Pelanggan : "'.$datapos['no_registrasi'].'" <br>
     Tanggal Pengaduan : "'.$datapos['date_insert'].'" <br>
     Nama Pelanggan : "'.$datapos['nama_pelanggan'].'" <br>
     Alamat Pelanggan : "'.$datapos['alamat_pelanggan'].'" <br>
     Telp Pelanggan : "'.$datapos['telp_pelanggan'].'" <br>
     Email Pelanggan : "'.$datapos['email_pelanggan'].'" <br>
     Produk Pelanggan : "'.$datapos['id_product'].'" <br>
     Keluhan Pelanggan : "'.$datapos['jenis_keluhan'].'" <br>
     Keluhan Pelanggan Lainnya : "'.$datapos['jenis_keluhan_other'].'" <br>
     Catatan Pelanggan : "'.$datapos['catatan'].'" <br>');


     $this->email->send();
     $this->email->clear();


      if($save){
        echo "<script language=javascript>
         alert('Pengaduan Berhasil');
         window.location='" . base_url('form_claim_user') . "';
             </script>";
      }

    }

    public function delete(){
      $idpost = $this->uri->segment(3);
      $del = $this->m_form_claim_user->delete($idpost,$this->tablename);

      if($del){
        echo "<script language=javascript>
         alert('Hapus Data Berhasil');
         window.location='" . base_url('form_claim_user') . "';
             </script>";
      }
    }

    public function transaksi_id($param = '') {
        $data = $this->mfcu->get_no();
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

  
    public function get_val_peg() {
        $data = $this->input->post('valpeg');
        $this->db->where('id', $data);
        $data = $this->db->get('tb_form_claim_user')->row();
        echo json_encode($data);
    }





}
