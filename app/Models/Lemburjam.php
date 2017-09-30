<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Lemburjam extends Sximo  {
	
	protected $table = 'm_setting_lembur';
	protected $primaryKey = 'id_setting_lembur';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT m_setting_lembur.* FROM m_setting_lembur  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE m_setting_lembur.id_setting_lembur IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
