<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class entryabsen extends Sximo  {
	
	protected $table = 't_absen';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT t_absen.* FROM t_absen  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE t_absen.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
