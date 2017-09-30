<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Potonganmaster extends Sximo  {
	
	protected $table = 'm_potongan';
	protected $primaryKey = 'id_m_potongan';

	public function __construct() {
		parent::__construct();
		
	}

	public function getPotongan($id){
		return $this->where('id_m_potongan', $id)->first();
	}

	public static function querySelect(  ){
		
		return "  SELECT m_potongan.* FROM m_potongan  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE m_potongan.id_m_potongan IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
