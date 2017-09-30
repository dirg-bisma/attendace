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
		<li><a href="{{ URL::to('tunjanganmaster?return='.$return) }}">{{ $pageTitle }}</a></li>
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

		 {!! Form::open(array('url'=>'tunjanganmaster/save?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
<div class="col-md-12">
						<fieldset><legend> Tunjangan</legend>
									
								  <div class="form-group hidethis " style="display:none;">
									<label for="ID" class=" control-label col-md-4 text-left"> ID </label>
									<div class="col-md-6">
									  {!! Form::text('id_tunjangan', $row['id_tunjangan'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Nama" class=" control-label col-md-4 text-left"> Nama </label>
									<div class="col-md-6">
									  {!! Form::text('nama_tunjangan', $row['nama_tunjangan'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Nilai" class=" control-label col-md-4 text-left"> Nilai </label>
									<div class="col-md-6">
									  {!! Form::text('nilai', $row['nilai'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Jenis" class=" control-label col-md-4 text-left"> Jenis </label>
									<div class="col-md-6">
									  
					<?php $jenis_tunjangan = explode(',',$row['jenis_tunjangan']);
					$jenis_tunjangan_opt = array( 'fix' => 'FIX' ,  'rate' => 'RATE' , ); ?>
					<select name='jenis_tunjangan' rows='5'   class='select2 '  > 
						<?php 
						foreach($jenis_tunjangan_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['jenis_tunjangan'] == $key ? " selected='selected' " : '' ).">$val</option>"; 						
						}						
						?></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Base" class=" control-label col-md-4 text-left"> Base </label>
									<div class="col-md-6">
									  
					<?php $base = explode(',',$row['base']);
					$base_opt = array( 'gaji' => 'GAJI' ,  'none' => 'NONE' ,  'absen' => 'ABSEN' , ); ?>
					<select name='base' rows='5'   class='select2 '  > 
						<?php 
						foreach($base_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['base'] == $key ? " selected='selected' " : '' ).">$val</option>"; 						
						}						
						?></select> 
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
					<button type="button" onclick="location.href='{{ URL::to('tunjanganmaster?return='.$return) }}' " class="btn btn-success btn-sm "><i class="fa  fa-arrow-circle-left "></i>  {{ Lang::get('core.sb_cancel') }} </button>
					</div>	  
			
				  </div> 
		 
		 {!! Form::close() !!}
	</div>
</div>		 
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop