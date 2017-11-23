<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Absendinas extends Sximo  {
	
	protected $table = 't_dinas';
	protected $primaryKey = 'id';
	public $timestamps = false;

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT t_dinas.* FROM t_dinas  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE t_dinas.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
