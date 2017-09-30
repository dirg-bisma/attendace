<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Sximo  {
	
	protected $table = 'm_jabatan';
	protected $primaryKey = 'id_jabatan';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT m_jabatan.* FROM m_jabatan  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE m_jabatan.id_jabatan IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
