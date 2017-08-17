<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_my_todolist extends Parent_model {
/*select a.*,b.no_registrasi,c.nama from trans_assign a
left join trans_claim b on b.id = a.id_claim
left join m_employee c on c.id = a.id_pic
*/
	public function get_new($arrdata){
		$setting = new StdClass();

				foreach ($arrdata as $key => $column_order) {
						$setting->$column_order = '';
				}

				return $setting;
	}

  public function opt_pic(){
	 return	$this->db->get('m_employee')->result();
	}

	public function opt_claim(){
	 return	$this->db->get('trans_claim')->result();
	}

	public function list_my_todolist($usersess){
		return $this->db->query("select a.*,b.no_registrasi,c.nama from trans_assign a
		left join trans_claim b on b.id = a.id_claim
		left join m_employee c on c.id = a.id_pic where c.id = '$usersess' ")->result();
	}

	public function get_no(){
		$query = $this->db->query("SELECT SUBSTR(MAX(no_po),-7) AS id  FROM trans_assign");
					//$query = $this->db->query("select max(personnel_id) as id from human_pa_md_emp_personal");

		return $query;
	}

}
