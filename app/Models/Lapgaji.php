<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Lapgaji extends Sximo  {
	
	protected $table = 't_lap_gaji';
	protected $primaryKey = 'id_laporan';
	public $timestamps = false;

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT t_lap_gaji.* FROM t_lap_gaji  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE t_lap_gaji.id_laporan IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
