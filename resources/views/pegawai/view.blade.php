@extends('layouts.app')

@section('content')
<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('pegawai?return='.$return) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper m-t">   

<div class="sbox animated fadeInRight">
	<div class="sbox-title"> 
   		<a href="{{ URL::to('pegawai?return='.$return) }}" class="tips btn btn-xs btn-default pull-right" title="{{ Lang::get('core.btn_back') }}"><i class="fa fa-arrow-circle-left"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
		@if($access['is_add'] ==1)
   		<a href="{{ URL::to('pegawai/update/'.$id.'?return='.$return) }}" class="tips btn btn-xs btn-primary pull-right" title="{{ Lang::get('core.btn_edit') }}"><i class="fa fa-edit"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
		@endif 
	</div>
	<div class="sbox-content" style="background:#fff;"> 	

		<table class="table table-striped table-bordered" >
			<tbody>	
		
					<tr>
						<td width='30%' class='label-view text-right'>Nama</td>
						<td>{{ $row->nama_pegawai }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Jabatan</td>
						<td>{!! SiteHelpers::gridDisplayView($row->id_jabatan,'id_jabatan','1:m_jabatan:id_jabatan:nama_jabatan') !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Gaji Pokok</td>
						<td>{{ $row->gaji_pokok }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>No Telp</td>
						<td>{{ $row->no_telp }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Upload</td>
						<td>{{ $row->upload }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Active</td>
						<td>{{ $row->active }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Lembur</td>
						<td>{{ $row->lembur }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Uang Makan</td>
						<td>{{ $row->uang_makan }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Uang Tunjangan Jabatan</td>
						<td>{{ $row->uang_tunjangan_jabatan }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Jamsostek</td>
						<td>{{ $row->jamsostek }} </td>
						
					</tr>
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	

	</div>
</div>
	  
@stop