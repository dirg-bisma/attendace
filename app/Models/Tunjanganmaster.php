<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Tunjanganmaster extends Sximo  {
	
	protected $table = 'm_tunjangan';
	protected $primaryKey = 'id_tunjangan';

	public function __construct() {
		parent::__construct();
		
	}

	public function getTunjangan($id)
	{
		return $this->where('id_tunjangan', $id)->first();
	}

	public static function querySelect(  ){
		
		return "  SELECT m_tunjangan.* FROM m_tunjangan  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE m_tunjangan.id_tunjangan IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
