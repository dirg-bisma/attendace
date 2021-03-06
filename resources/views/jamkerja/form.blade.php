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
        <li class="active">{{ Lang::get('core.addedit') }} </li>
      </ul>
	  	  
    </div>
 
 	<div class="page-content-wrapper">

		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
<div class="sbox animated fadeInRight">
	<div class="sbox-title"> <h4> <i class="fa fa-table"></i> </h4></div>
	<div class="sbox-content"> 	

		 {!! Form::open(array('url'=>'jamkerja/save?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
<div class="col-md-12">
						<fieldset><legend> Jam Kerja</legend>
									
								  <div class="form-group hidethis " style="display:none;">
									<label for="ID" class=" control-label col-md-4 text-left"> ID </label>
									<div class="col-md-6">
									  {!! Form::text('id_jam', $row['id_jam'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Nama" class=" control-label col-md-4 text-left"> Nama </label>
									<div class="col-md-6">
									  {!! Form::text('nama', $row['nama'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Urutan" class=" control-label col-md-4 text-left"> Urutan </label>
									<div class="col-md-6">
									  {!! Form::text('urutan', $row['urutan'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Jam Awal" class=" control-label col-md-4 text-left"> Jam Awal </label>
									<div class="col-md-6">
									  {!! Form::text('jam_awal', $row['jam_awal'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Jam Akhir" class=" control-label col-md-4 text-left"> Jam Akhir </label>
									<div class="col-md-6">
									  {!! Form::text('jam_akhir', $row['jam_akhir'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Hari" class=" control-label col-md-4 text-left"> Hari </label>
									<div class="col-md-6">
									  
					<?php $hari = explode(',',$row['hari']);
					$hari_opt = array( '' => '-' ,  'selasa' => 'SELASA' ,  'rabu' => 'RABU' ,  'kamis' => 'KAMIS' ,  'jumat' => 'JUMAT' ,  'sabtu' => 'SABTU' ,  'minggu' => 'MINGGU' ,  'senin' => 'SENIN' , ); ?>
					<select name='hari' rows='5'   class='select2 '  > 
						<?php 
						foreach($hari_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['hari'] == $key ? " selected='selected' " : '' ).">$val</option>"; 						
						}						
						?></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Global" class=" control-label col-md-4 text-left"> Global </label>
									<div class="col-md-6">
									  
					<?php $global = explode(',',$row['global']);
					$global_opt = array( 'Y' => 'YA' ,  'T' => 'TIDAK' , ); ?>
					<select name='global' rows='5'   class='select2 '  > 
						<?php 
						foreach($global_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['global'] == $key ? " selected='selected' " : '' ).">$val</option>"; 						
						}						
						?></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Parent" class=" control-label col-md-4 text-left"> Parent </label>
									<div class="col-md-6">
									  <select name='parent' rows='5' id='parent' class='select2 '   ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Mode" class=" control-label col-md-4 text-left"> Mode </label>
									<div class="col-md-6">
									  <select name='mode' rows='5' id='mode' class='select2 '   ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> </fieldset>
			</div>
			
			

		
			<div style="clear:both"></div>	
				
					
				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">	
					<button type="submit" name="apply" class="btn btn-info btn-sm" ><i class="fa  fa-check-circle"></i> {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-primary btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
					<button type="button" onclick="location.href='{{ URL::to('jamkerja?return='.$return) }}' " class="btn btn-success btn-sm "><i class="fa  fa-arrow-circle-left "></i>  {{ Lang::get('core.sb_cancel') }} </button>
					</div>	  
			
				  </div> 
		 
		 {!! Form::close() !!}
	</div>
</div>		 
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		
		$("#parent").jCombo("{{ URL::to('jamkerja/comboselect?filter=m_setting_jam:id_jam:id_jam|nama') }}&parent=global:Y:",
		{  parent: '#global:Y', selected_value : '{{ $row["parent"] }}' });
		
		$("#mode").jCombo("{{ URL::to('jamkerja/comboselect?filter=m_mode_jam:kode:ket_mode') }}",
		{  selected_value : '{{ $row["mode"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop