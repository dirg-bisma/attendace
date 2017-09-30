<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Harinonaktif extends Sximo  {
	
	protected $table = 'm_hari_non_aktif';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT m_hari_non_aktif.* FROM m_hari_non_aktif  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE m_hari_non_aktif.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
