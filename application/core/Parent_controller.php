<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parent_controller extends CI_Controller {

		public function __construct(){
			  parent::__construct();
				$this->data['judul'] = 'Program Aplikasi CRM pada PT.LG';
				$this->load->helper('crm');

		}



}
