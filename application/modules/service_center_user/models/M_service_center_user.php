<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_service_center_user extends Parent_model {

	public function get_new($arrdata){
		$setting = new StdClass();

				foreach ($arrdata as $key => $column_order) {
						$setting->$column_order = '';
				}

				return $setting;
	}


}
