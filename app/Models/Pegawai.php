<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Sximo  {
	
	protected $table = 'm_pegawai';
	protected $primaryKey = 'id_pegawai';

	public function __construct() {
		parent::__construct();
	}

	public static function querySelect(  ){
		
		return "  SELECT m_pegawai.* FROM m_pegawai  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE m_pegawai.id_pegawai IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
