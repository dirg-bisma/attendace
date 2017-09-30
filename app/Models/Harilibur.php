<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Harilibur extends Sximo  {
	
	protected $table = 'm_hari_libur';
	protected $primaryKey = 'id_hari_libur';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT m_hari_libur.* FROM m_hari_libur  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE m_hari_libur.id_hari_libur IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
