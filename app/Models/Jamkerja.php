<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Jamkerja extends Sximo  {
	
	protected $table = 'm_setting_jam';
	protected $primaryKey = 'id_jam';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT m_setting_jam.* FROM m_setting_jam  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE m_setting_jam.id_jam IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
