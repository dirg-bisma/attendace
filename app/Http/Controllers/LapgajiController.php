<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Etc;
use App\Models\Lapgaji;
use App\Models\Potonganmaster;
use App\Models\TdetailPotongan;
use App\Models\TdetailTunjangan;
use App\Models\Tunjanganmaster;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ;
use App\Models\Harinonaktif as harinonaktif;
use App\Models\Jamkerja as jam_kerja;
use App\Models\Cekjamkerja as cek_jam_kerja;
use App\Models\Lemburjam as Lemburjam;
use App\Models\Pegawai as Pegawai;
use App\Models\DetailLaporan as DetailLap;
use App\Models\Jabatan as Jabatan;


class LapgajiController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'lapgaji';
	static $per_page	= '10';

	public function __construct()
	{
		
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new Lapgaji();
		
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);
	
		$this->data = array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'lapgaji',
			'return'	=> self::returnUrl()
			
		);
		
	}

	public function getIndex( Request $request )
	{

		if($this->access['is_view'] ==0) 
			return Redirect::to('dashboard')
				->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus','error');

		$sort = (!is_null($request->input('sort')) ? $request->input('sort') : 'id_laporan'); 
		$order = (!is_null($request->input('order')) ? $request->input('order') : 'asc');
		// End Filter sort and order for query 
		// Filter Search for query		
		$filter = (!is_null($request->input('search')) ? $this->buildSearch() : '');

		
		$page = $request->input('page', 1);
		$params = array(
			'page'		=> $page ,
			'limit'		=> (!is_null($request->input('rows')) ? filter_var($request->input('rows'),FILTER_VALIDATE_INT) : static::$per_page ) ,
			'sort'		=> $sort ,
			'order'		=> $order,
			'params'	=> $filter,
			'global'	=> (isset($this->access['is_global']) ? $this->access['is_global'] : 0 )
		);
		// Get Query 
		$results = $this->model->getRows( $params );		
		
		// Build pagination setting
		$page = $page >= 1 && filter_var($page, FILTER_VALIDATE_INT) !== false ? $page : 1;	
		$pagination = new Paginator($results['rows'], $results['total'], $params['limit']);	
		$pagination->setPath('lapgaji');
		
		$this->data['rowData']		= $results['rows'];
		// Build Pagination 
		$this->data['pagination']	= $pagination;
		// Build pager number and append current param GET
		$this->data['pager'] 		= $this->injectPaginate();	
		// Row grid Number 
		$this->data['i']			= ($page * $params['limit'])- $params['limit']; 
		// Grid Configuration 
		$this->data['tableGrid'] 	= $this->info['config']['grid'];
		$this->data['tableForm'] 	= $this->info['config']['forms'];
		$this->data['colspan'] 		= \SiteHelpers::viewColSpan($this->info['config']['grid']);		
		// Group users permission
		$this->data['access']		= $this->access;
		// Detail from master if any
		
		// Master detail link if any 
		$this->data['subgrid']	= (isset($this->info['config']['subgrid']) ? $this->info['config']['subgrid'] : array()); 
		// Render into template
		return view('lapgaji.index',$this->data);
	}	


	function getProsesform()
	{
		return view('lapgaji.proses', $this->data);
	}

	function postProses(Request $request)
	{
		$pegawai = new Pegawai();
		$data_pegawai = $pegawai->all();

		foreach($data_pegawai as $data){
			$cek = $this->model
				->where('bulan', $request->input('bulan'))
				->where('tahun', $request->input('tahun'))
				->where('id_pegawai', $data->id_pegawai)
				->first();

			if(count($cek) == 0){
				$lap = new Lapgaji();
				$lap->tgl_awal = $request->input('tahun').'-'.$request->input('bulan').'-01';
				$jumlah_hari = cal_days_in_month(CAL_GREGORIAN, $request->input('bulan'), $request->input('tahun'));
				$lap->tgl_akhir = $request->input('tahun').'-'.$request->input('bulan').'-'.$jumlah_hari;
				$lap->id_pegawai = $data->id_pegawai;
				$lap->gaji = $data->gaji_pokok;
				$lap->bulan = $request->input('bulan');
				$lap->tahun = $request->input('tahun');
				$lap->save();
			}

		}

		return Redirect::to('lapgaji')->with('messagetext',\Lang::get('core.note_success'))->with('msgstatus','success');
	}

	function getUpdate(Request $request, $id = null)
	{

		$t_detail_potongan = new TdetailPotongan();
		$t_detail_tunjangan = new TdetailTunjangan();


		if($id =='')
		{
			if($this->access['is_add'] ==0 )
			return Redirect::to('dashboard')->with('messagetext',\Lang::get('core.note_restric'))->with('msgstatus','error');
		}	
		
		if($id !='')
		{
			if($this->access['is_edit'] ==0 )
			return Redirect::to('dashboard')->with('messagetext',\Lang::get('core.note_restric'))->with('msgstatus','error');
		}				
				
		$row = $this->model->find($id);
		if($row)
		{
			$this->data['row'] =  $row;
		} else {
			$this->data['row'] = $this->model->getColumnTable('t_lap_gaji'); 
		}
		$this->data['fields'] 		=  \SiteHelpers::fieldLang($this->info['config']['forms']);
		
		$this->data['id'] = $id;
		$tunjangan = new Tunjanganmaster();
		$potongan = new Potonganmaster();

		$this->data['tunjangan'] = $tunjangan->where('default', 'y')->get();
		$this->data['potongan'] = $potongan->where('default', 'y')->get();
		$this->data['detail_potongan'] = $t_detail_potongan->where('id_t_lap_gaji', $id)->get();
		$this->data['detail_tunjangan'] = $t_detail_tunjangan->where('id_t_lap_gaji', $id)->get();
		$this->data['c_tunjangan'] = new Tunjanganmaster();
		$this->data['c_potongan'] = new Potonganmaster();

		return view('lapgaji.form',$this->data);
	}	

	public function getShow( $id = null)
	{
		$t_detail_potongan = new TdetailPotongan();
		$t_detail_tunjangan = new TdetailTunjangan();
		if($this->access['is_detail'] ==0) 
			return Redirect::to('dashboard')
				->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus','error');
					
		$row = $this->model->getRow($id);
		if($row)
		{
			$this->data['row'] =  $row;
		} else {
			$this->data['row'] = $this->model->getColumnTable('t_lap_gaji'); 
		}
		$this->data['fields'] 		=  \SiteHelpers::fieldLang($this->info['config']['grid']);
		
		$this->data['id'] = $id;
		$this->data['access']		= $this->access;
		$this->data['detail_potongan'] = $t_detail_potongan->where('id_t_lap_gaji', $id)->get();
		$this->data['detail_tunjangan'] = $t_detail_tunjangan->where('id_t_lap_gaji', $id)->get();
		$this->data['pegawai'] = new Pegawai();
		$this->data['jabatan'] = new Jabatan();
		$this->data['etc'] = new Etc();
		$this->data['m_tunjangan'] = new Tunjanganmaster();
		$this->data['m_potongan'] = new Potonganmaster();
		return view('lapgaji.struk',$this->data);
	}	


	function postSimpantunjangan(Request $request)
	{
		$detaillap = new DetailLap();
		return $detaillap->SimpanTunjangan($request);
	}

	function postSimpanpotongan(Request $request)
	{
		$detaillap = new DetailLap();
		return $detaillap->SimpanPotongan($request);
	}

	function postSave( Request $request)
	{
		
		$rules = $this->validateForm();
		$validator = Validator::make($request->all(), $rules);	
		if ($validator->passes()) {
			$data = $this->validatePost('tb_lapgaji');
				
			$id = $this->model->insertRow($data , $request->input('id_laporan'));
			
			if(!is_null($request->input('apply')))
			{
				$return = 'lapgaji/update/'.$id.'?return='.self::returnUrl();
			} else {
				$return = 'lapgaji?return='.self::returnUrl();
			}

			// Insert logs into database
			if($request->input('id_laporan') =='')
			{
				\SiteHelpers::auditTrail( $request , 'New Data with ID '.$id.' Has been Inserted !');
			} else {
				\SiteHelpers::auditTrail($request ,'Data with ID '.$id.' Has been Updated !');
			}

			//return Redirect::to($return)->with('messagetext',\Lang::get('core.note_success'))->with('msgstatus','success');
			
		} else {

			//return Redirect::to('lapgaji/update/'.$id)->with('messagetext',\Lang::get('core.note_error'))->with('msgstatus','error')
			//->withErrors($validator)->withInput();
		}	
	
	}	

	public function postDelete( Request $request)
	{
		
		if($this->access['is_remove'] ==0) 
			return Redirect::to('dashboard')
				->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus','error');
		// delete multipe rows 
		if(count($request->input('ids')) >=1)
		{
			$this->model->destroy($request->input('ids'));
			
			\SiteHelpers::auditTrail( $request , "ID : ".implode(",",$request->input('ids'))."  , Has Been Removed Successfull");
			// redirect
			return Redirect::to('lapgaji')
        		->with('messagetext', \Lang::get('core.note_success_delete'))->with('msgstatus','success'); 
	
		} else {
			return Redirect::to('lapgaji')
        		->with('messagetext','No Item Deleted')->with('msgstatus','error');				
		}

	}

	public function getTestdata()
	{
		return view("lapgaji.test");
	}

	public function postAbsentable(Request $request)
	{
		$tgl_awal = $request->input('tgl_awal');
		$tgl_akhir = $request->input('tgl_akhir');
		$id_pegawai = $request->input('id_pegawai');

		$model_lap = $this->model;
		$etc_model = new etc();
		$harinonaktif = new harinonaktif();
		$cek_jam_kerja = new cek_jam_kerja();
		$harinon = $harinonaktif->all();
		$dataharianarray = array();
		$jam_kerja = new jam_kerja();
		$jamsetting = $jam_kerja->where('global', 'y')->get();
		foreach($harinon as $dataharinon){
			array_push($dataharianarray,$dataharinon->hari );
		}
		return view("lapgaji.table", [
			"model_lap" => $model_lap,
			"etc_model" => $etc_model,
			'harinon' => $dataharianarray,
			'jam_setting' => $jamsetting,
			'cek_jam_kerja' => $cek_jam_kerja,
			'tgl_awal' => $tgl_awal,
			'tgl_akhir' => $tgl_akhir,
			'id_pegawai' => $id_pegawai
		]);

	}

	public function postLemburtable(Request $request)
	{
		$tgl_awal = $request->input('tgl_awal');
		$tgl_akhir = $request->input('tgl_akhir');
		$id_pegawai = $request->input('id_pegawai');

		$model_lap = $this->model;
		$etc_model = new etc();
		$harinonaktif = new Harinonaktif();
		$cek_jam_kerja = new cek_jam_kerja();
		$harinon = $harinonaktif->all();
		$dataharianarray = array();
		$lemburjam = new lemburjam();
		$jamlembur = $lemburjam->where('global', 'y')->get();
		foreach($harinon as $dataharinon){
			array_push($dataharianarray,$dataharinon->hari );
		}
		return view("lapgaji.lembur", [
			"model_lap" => $model_lap,
			"etc_model" => $etc_model,
			'harinon' => $dataharianarray,
			'jamlembur' => $jamlembur,
			'cek_jam_kerja' => $cek_jam_kerja,
			'tgl_awal' => $tgl_awal,
			'tgl_akhir' => $tgl_akhir,
			'id_pegawai' => $id_pegawai
		]);
	}

	public function getDatapegawai(Request $request)
	{
		$id_pegawai = $request->input('id_pegawai');
		$pegawai = new pegawai();
		$data_pegawai = $pegawai->where('id_pegawai', $id_pegawai)->first();
		return array($data_pegawai);

	}


}