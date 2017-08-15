<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_form_claim_user extends Parent_model {

	public function get_new($arrdata){
		$setting = new StdClass();

				foreach ($arrdata as $key => $column_order) {
						$setting->$column_order = '';
				}

				return $setting;
	}


		public function get_no(){
			$query = $this->db->query("SELECT SUBSTR(MAX(no_registrasi),-7) AS id  FROM trans_claim");
						//$query = $this->db->query("select max(personnel_id) as id from human_pa_md_emp_personal");

			return $query;
		}

		public function list_barang(){
			return $this->db->get('m_product')->result();
		}


}
