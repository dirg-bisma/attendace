<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Dinas extends Sximo  {
	
	protected $table = 't_m_dinas';
	protected $primaryKey = 'id_dinas';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT t_m_dinas.* FROM t_m_dinas  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE t_m_dinas.id_dinas IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
