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
		<li><a href="{{ URL::to('jamkerja?return='.$return) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper m-t">   

<div class="sbox animated fadeInRight">
	<div class="sbox-title"> 
   		<a href="{{ URL::to('jamkerja?return='.$return) }}" class="tips btn btn-xs btn-default pull-right" title="{{ Lang::get('core.btn_back') }}"><i class="fa fa-arrow-circle-left"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
		@if($access['is_add'] ==1)
   		<a href="{{ URL::to('jamkerja/update/'.$id.'?return='.$return) }}" class="tips btn btn-xs btn-primary pull-right" title="{{ Lang::get('core.btn_edit') }}"><i class="fa fa-edit"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
		@endif 
	</div>
	<div class="sbox-content" style="background:#fff;"> 	

		<table class="table table-striped table-bordered" >
			<tbody>	
		
					<tr>
						<td width='30%' class='label-view text-right'>ID</td>
						<td>{{ $row->id_jam }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Nama</td>
						<td>{{ $row->nama }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Urutan</td>
						<td>{{ $row->urutan }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Jam Awal</td>
						<td>{{ $row->jam_awal }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Jam Akhir</td>
						<td>{{ $row->jam_akhir }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Hari</td>
						<td>{{ $row->hari }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Global</td>
						<td>{{ $row->global }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Parent</td>
						<td>{{ $row->parent }} </td>
						
					</tr>
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	

	</div>
</div>
	  
@stop