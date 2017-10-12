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
				<li><a href="{{ URL::to('lapgaji?return='.$return) }}">{{ $pageTitle }}</a></li>
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

					{!! Form::open(array('url'=>'lapgaji/save?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ', 'id' => 'lapgaji-form')) !!}
					<div class="col-md-12">
						<fieldset><legend> Laporan Gaji</legend>

							<div class="form-group hidethis " style="display:none;">
								<label for="Id Laporan" class=" control-label col-md-4 text-left"> Id Laporan </label>
								<div class="col-md-6">
									{!! Form::text('id_laporan', $row['id_laporan'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  " >
								<label for="Tgl Awal" class=" control-label col-md-4 text-left"> Tgl Awal </label>
								<div class="col-md-6">

									<div class="input-group m-b" style="width:150px !important;">
										{!! Form::text('tgl_awal', $row['tgl_awal'],array('class'=>'form-control', 'style'=>'width:150px !important;', 'id'=>'tgl_awal', 'readonly')) !!}
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									</div>

								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  " >
								<label for="Tgl Akhir" class=" control-label col-md-4 text-left"> Tgl Akhir </label>
								<div class="col-md-6">

									<div class="input-group m-b" style="width:150px !important;">
										{!! Form::text('tgl_akhir', $row['tgl_akhir'],array('class'=>'form-control', 'style'=>'width:150px !important;', 'id'=>'tgl_akhir', 'readonly')) !!}
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									</div>

								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  " >
								<label for="Pegawai" class=" control-label col-md-4 text-left"> Pegawai </label>
								<div class="col-md-6">
									<select name='id_pegawai' rows='5' id='id_pegawai' class='select2 ' readonly="true"  ></select>
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  " >
								<label for="Pegawai" class=" control-label col-md-4 text-left"> </label>
								<div class="col-md-6">
									<button type="button" name="proses" id="proses" class="btn btn-info btn-sm"><i class="fa  fa-check-circle"></i> Proses</button>
								</div>
								<div class="col-md-2">

								</div>
							</div>

							<div class="form-group  " >
								<label for="Gaji" class=" control-label col-md-4 text-left"> Gaji </label>
								<div class="col-md-6">
									{!! Form::text('gaji', $row['gaji'],array('class'=>'form-control', 'placeholder'=>'', 'readonly', 'id'=>'gaji' )) !!}
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  " >
								<label for="Tunjangan" class=" control-label col-md-4 text-left"> Tunjangan </label>
								<div class="col-md-6">
									{!! Form::text('tunjangan', $row['tunjangan'],array('class'=>'form-control', 'placeholder'=>'', 'id'=>'tunjangan'  )) !!}
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  " >
								<label for="Potongan" class=" control-label col-md-4 text-left"> Potongan </label>
								<div class="col-md-6">
									{!! Form::text('potongan', $row['potongan'],array('class'=>'form-control', 'placeholder'=>'', 'id'=>'potongan'  )) !!}
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  " >
								<label for="Keterangan" class=" control-label col-md-4 text-left"> Keterangan </label>
								<div class="col-md-6">
									  <textarea name='keterangan' rows='5' id='keterangan' class='form-control '
									  >{{ $row['keterangan'] }}</textarea>
								</div>
								<div class="col-md-2">

								</div>
							</div> </fieldset>
					</div>

					<div style="clear:both"></div>
					<div class="form-group">
						<label class="col-sm-4 text-right">&nbsp;</label>
						<div class="col-sm-8">
							<button type="button" id="send-data" name="send-data" class="btn btn-primary btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
							<button type="button" onclick="location.href='{{ URL::to('lapgaji?return='.$return) }}' " class="btn btn-success btn-sm "><i class="fa  fa-arrow-circle-left "></i>  {{ Lang::get('core.sb_cancel') }} </button>
						</div>

					</div>

					{!! Form::close() !!}
				</div>

			</div>
		</div>
	</div>
	<div class="page-content row">
		<div class="page-content-wrapper">
			<div class="sbox">
				<div class="sbox-content">
					<div class="container"><h1>Detail Gaji  </h1></div>
					<div id="exTab1" class="container">
						<ul  class="nav nav-pills">
							<li class="active">
								<a  href="#1a" data-toggle="tab">Absensi</a>
							</li>
							<li><a href="#2a" data-toggle="tab">Lembur</a>
							</li>
							<li><a href="#4a" data-toggle="tab">Potongan</a>
							</li>
							<li><a href="#5a" data-toggle="tab">Tunjangan</a>
							</li>
						</ul>

						<div class="tab-content clearfix">
							<div class="tab-pane active" id="1a">
								<div id="data-absen"></div>
							</div>
							<div class="tab-pane" id="2a">
								<div id="data-lembur"></div>
							</div>
							<div class="tab-pane" id="4a">
								<div class="sbox-content">
									<form class="form-vertical">
										<div class="form-group  " >
											<div class="col-md-11">
												<div class="col-md-5">
													<select name='id_m_potongan' rows='5' id='id_m_potongan' class='select2 ' readonly="true"  ></select>
												</div>
												<div class="col-md-3">
													<button type="button" onclick="add_potongan()" class="btn btn-default">Tambah</button>
												</div>
												<div class="col-md-3">
													<button type="button" onclick="hitung_potongan()" class="btn btn-default">Hitung</button>
												</div>
											</div>
										</div>
									</form>

								</div>

								<br>
								<div class="table" style="min-height:300px;">
									<form id="potongan-form">
										<input type="hidden" id="id_laporan" name="id_laporan" value="{{ $row['id_laporan'] }}">
										<input type="hidden" id="id_pegawai" name="id_pegawai" value="{{ $row["id_pegawai"] }}">
										<table class="table table-striped table-bordered" id="tabel-potongan">
											<thead>
											<tr>
												<td width="100px">Nama</td>
												<td width="20px">nilai</td>
												<td>&nbsp;</td>
												<td>Faktor</td>
												<td>Jumlah</td>
												<td>Ket</td>
												<td>Act</td>
											</tr>
											</thead>
											<tbody>
											@if(count($detail_potongan) > 0)
												@foreach($detail_potongan as $data_pot)
													<?php $l_c_potongan = $c_potongan->getPotongan($data_pot->id_potongan);?>
													<?php $l_var_pot = strtolower(str_replace(" ","",$l_c_potongan->nama_potongan))."_".$l_c_potongan->id_m_potongan; ?>
													<tr>
														<td>{{ $l_c_potongan->nama_potongan }}</td>
														<td><input type="text" id="{{ 'p_nilai_'.$l_var_pot}}" name="{{ 'p_nilai_'.$l_var_pot }}"  value="{{ $data_pot->nilai }}"></td>
														<td>x</td>
														<td><input type="text" id="{{ 'p_fak_'.$l_var_pot }}" name="{{ 'p_fak_'.$l_var_pot }}"  value="{{ $data_pot->faktor }}"></td>
														<td><input type="text" id="{{ "p_hasil_".$l_var_pot }}" name="{{ "p_hasil_".$l_var_pot }}" value="{{ $data_pot->hasil_rp }}"></td>
														<td><input type="text" id="{{ "p_ket_".$l_var_pot }}" name="{{ "p_ket_".$l_var_pot }}" value="{{ $data_pot->keterangan }}"></td>
														<td></td>
													</tr>
												@endforeach
											@else
											@foreach($potongan as $data_potongan)
												<?php $var_pot = strtolower(str_replace(" ","",$data_potongan->nama_potongan))."_".$data_potongan->id_m_potongan;?>
												<tr>
													<td>{{ $data_potongan->nama_potongan }}</td>
													<td><input type="text" id="{{ 'p_nilai_'.$var_pot}}" name="{{ 'p_nilai_'.$var_pot }}" readonly value="{{ $data_potongan->nilai }}"></td>
													<td>x</td>
													<td><input type="text" id="{{ 'p_fak_'.$var_pot }}" name="{{ 'p_fak_'.$var_pot }}" readonly></td>
													<td><input type="text" id="{{ "p_hasil_".$var_pot }}" name="{{ "p_hasil_".$var_pot }}"></td>
													<td><input type="text" id="{{ "p_ket_".$var_pot }}" name="{{ "p_ket_".$var_pot }}"></td>
													<td></td>
												</tr>
											@endforeach
											@endif
											</tbody>
										</table>
									</form>

								</div>
							</div>
							<div class="tab-pane" id="5a">
								<div class="sbox-content">
									<form class="form-vertical">
										<div class="form-group  " >
										<div class="col-md-11">
											<div class="col-md-5">
												<select name='id_tunjangan' rows='5' id='id_tunjangan' class='select2 ' readonly="true"  ></select>
											</div>
											<div class="col-md-3">
												<button type="button" onclick="add_tunjangan()" class="btn btn-default">Tambah</button>
											</div>
											<div class="col-md-3">
												<button type="button" onclick="hitung_tunjangan()" class="btn btn-default">Hitung</button>
											</div>
										</div>
										</div>
									</form>

								</div>

								<br>
								<div class="table" style="min-height:300px;">
									<form id="tunjangan-form">
										<input type="hidden" id="id_laporan" name="id_laporan" value="{{ $row['id_laporan'] }}">
										<input type="hidden" id="id_pegawai" name="id_pegawai" value="{{ $row["id_pegawai"] }}">
										<table class="table table-striped table-bordered" id="tabel-tunjangan">
											<thead>
											<tr>
												<td width="100px">Nama</td>
												<td width="20px">nilai</td>
												<td>&nbsp;</td>
												<td>Faktor</td>
												<td>Jumlah</td>
												<td>Keterangan</td>
												<td>Act</td>
											</tr>
											</thead>
											<tbody>
											@if(count($detail_tunjangan) > 0)
												@foreach($detail_tunjangan as $data_tun)
													<?php $l_c_tunjangan = $c_tunjangan->getTunjangan($data_tun->id_tunjangan);?>
													<?php $l_val_tun = strtolower(str_replace(" ","",$l_c_tunjangan->nama_tunjangan))."_".$l_c_tunjangan->id_tunjangan; ?>
													<?php
													switch($data_tun->id_tunjangan){
														case 1:
															$nilai = $pegawai->uang_makan;
															break;
														case 2:
															$nilai = $pegawai->uang_lembur;
															break;
														case 3:
															$nilai = $pegawai->uang_tunjangan_jabatan;
															break;
														default:
															$nilai = $data_tun->nilai;
													}

													?>
													<tr>
														<td>{{ $l_c_tunjangan->nama_tunjangan }}</td>
														<td><input type="text" id="{{ "t_nilai_".$l_val_tun }}" name="{{ "t_nilai_".$l_val_tun }}" value="{{ $nilai }}" ></td>
														<td>x</td>
														@if($data_tunjangan->id_tunjangan === 3)
															<td><input type="text" id="{{ "t_fak_".$val_tun }}" name="{{ "t_fak_".$val_tun }}" value="1" readonly></td>
														@else
															<td><input type="text" id="{{ "t_fak_".$val_tun }}" name="{{ "t_fak_".$val_tun }}" readonly></td>
														@endif
														<td><input type="text" id="{{ "t_hasil_".$l_val_tun }}" name="{{ "t_hasil_".$l_val_tun }}" value="{{ $data_tun->hasil }}"></td>
														<td><input type="text" id="{{ "t_ket_".$l_val_tun }}" name="{{ "t_ket_".$l_val_tun }}" value="{{ $data_tun->keterangan }}"></td>
														<td></td>
													</tr>
												@endforeach
											@else
											@foreach($tunjangan as $data_tunjangan)
												<?php $val_tun = strtolower(str_replace(" ", "", $data_tunjangan->nama_tunjangan))."_".$data_tunjangan->id_tunjangan;?>
												<?php $l_c_tunjangan = $c_tunjangan->getTunjangan($data_tunjangan->id_tunjangan);?>
												<tr>
													<td>{{ $l_c_tunjangan->nama_tunjangan }}</td>
													<?php
														switch($data_tunjangan->id_tunjangan){
															case 1:
																$nilai = $pegawai->uang_makan;
																break;
															case 2:
																$nilai = $pegawai->uang_lembur;
																break;
															case 3:
																$nilai = $pegawai->uang_tunjangan_jabatan;
																break;
															default:
																$nilai = $data_tunjangan->nilai;
														}

													?>
													<td><input type="text" id="{{ "t_nilai_".$val_tun }}" name="{{ "t_nilai_".$val_tun }}" value="{{ $nilai }}" readonly></td>
													<td>x</td>
													@if($data_tunjangan->id_tunjangan == 3)
														<td><input type="text" id="{{ "t_fak_".$val_tun }}" name="{{ "t_fak_".$val_tun }}" value="1" readonly></td>
													@else
														<td><input type="text" id="{{ "t_fak_".$val_tun }}" name="{{ "t_fak_".$val_tun }}" readonly></td>

													@endif

													<td><input type="text" id="{{ "t_hasil_".$val_tun }}" name="{{ "t_hasil_".$val_tun }}"></td>
													<td><input type="text" id="{{ "t_ket_".$val_tun }}" name="{{ "t_ket_".$val_tun }}"></td>
													<td></td>
												</tr>
											@endforeach
											@endif
											</tbody>
										</table>

									</form>

								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<hr>

	</hr>

	<script type="text/javascript">
		var arr_tunjangan = [
			@foreach($tunjangan as $arr_tunjangan)
					"{{ strtolower(str_replace(" ", "", $arr_tunjangan->nama_tunjangan))."_".$arr_tunjangan->id_tunjangan }}",
			@endforeach
		];

		var arr_potongan = [
			@foreach($potongan as $arr_potongan)
					"{{ strtolower(str_replace(" ", "", $arr_potongan->nama_potongan))."_".$arr_potongan->id_m_potongan }}",
			@endforeach
		];

		function add_tunjangan(){
			var label = $('#id_tunjangan').find('option:selected').text().toLowerCase().replace(" ", "");
			var id_label = $('#id_tunjangan').find('option:selected').val();
			var table_tr = '<tr id="row_'+label.replace(" ", "")+'">'+
			'<td>'+$('#id_tunjangan').find('option:selected').text()+'</td>'+
			'<td><input id="t_nilai_'+removeSpace(label+'_'+id_label)+'" name="val_'+removeSpace(label+'_'+id_label)+'"></td>'+
			'<td>x</td>'+
			'<td><input id="t_fak_'+removeSpace(label+'_'+id_label)+'" name="'+removeSpace(label+'_'+id_label)+'"></td>'+
			'<td><input id="t_hasil_'+removeSpace(label+'_'+id_label)+'" name="hasil_'+removeSpace(label+'_'+id_label)+'"></td>'+
			'<td><input id="t_ket_'+removeSpace(label+'_'+id_label)+'" name="ket_'+removeSpace(label+'_'+id_label)+'"></td>'+
			'<td><button class="btn-mini btn-danger" onclick="delete_row_tunjangan(\'#row_'+label+'\')">-</button></td>'
					'</tr>';
			$('#tabel-tunjangan tr:last').after(table_tr);
			arr_tunjangan.push(removeSpace(label+'_'+id_label));
			$('#t_hasil_'+removeSpace(label+'_'+id_label)).number(true, 0);
		}



		function hitung_tunjangan()
		{
			var jumlah_tunjangan = 0;
			for(i=0; i < arr_tunjangan.length; i++){
				jumlah_tunjangan = jumlah_tunjangan + parseInt($('#t_hasil_'+arr_tunjangan[i]).val());
			}
			$('#tunjangan').val(jumlah_tunjangan);
			$('#tunjangan').number( true, 0)

		}

		function add_potongan(){
			var label = $('#id_m_potongan').find('option:selected').text().toLowerCase().replace(" ", "");
			var id_label = $('#id_m_potongan').find('option:selected').val();
			var table_tr = '<tr id="row_'+label.replace(" ","")+'">'+
					'<td>'+$('#id_m_potongan').find('option:selected').text()+'</td>'+
					'<td><input id="p_nilai_'+removeSpace(label+'_'+id_label)+'" name="val_'+removeSpace(label+'_'+id_label)+'"></td>'+
					'<td>x</td>'+
					'<td><input id="p_fak_'+removeSpace(label+'_'+id_label)+'" name="'+removeSpace(label+'_'+id_label)+'"></td>'+
					'<td><input id="p_hasil_'+removeSpace(label+'_'+id_label)+'" name="hasil_'+removeSpace(label+'_'+id_label)+'"></td>'+
					'<td><input id="p_ket_'+removeSpace(label+'_'+id_label)+'" name="ket_'+removeSpace(label+'_'+id_label)+'"></td>'+
					'<td><button class="btn-mini btn-danger" onclick="delete_row_potongan(\'#row_'+label+'\')">-</button></td>'
			'</tr>';
			$('#tabel-potongan tr:last').after(table_tr);
			arr_potongan.push(removeSpace(label+'_'+id_label));
			$('#t_hasil_'+removeSpace(label+'_'+id_label)).number(true, 0);
		}

		function removeSpace(variable){
			return variable.replace(" ","");
		}

		function hitung_potongan()
		{
			var jumlah_potongan = 0;
			for(i=0; i < arr_potongan.length; i++){
				jumlah_potongan = jumlah_potongan + parseInt($('#p_hasil_'+arr_potongan[i]).val());
			}
			$('#potongan').val(jumlah_potongan);
			$('#potongan').number( true, 0);
		}

		function delete_row_tunjangan(id){
			$(id).remove();

			arr_tunjangan = jQuery.grep(arr_tunjangan, function(value) {
				return value != id.replace("#row_", "");
			});
		}

		function delete_row_potongan(id){
			$(id).remove();

			arr_potongan = jQuery.grep(arr_potongan, function(value) {
				return value != id.replace("#row_", "");;
			});
		}

		$(document).ready(function() {

			$('#gaji').number(true, 0);

			$("#id_pegawai").jCombo("{{ URL::to('lapgaji/comboselect?filter=m_pegawai:id_pegawai:nama_pegawai') }}",
					{  selected_value : '{{ $row["id_pegawai"] }}' });

			$("#id_tunjangan").jCombo("{{ URL::to('lapgaji/comboselect?filter=m_tunjangan:id_tunjangan:nama_tunjangan') }}",
					{  selected_value : '' });

			$("#id_m_potongan").jCombo("{{ URL::to('lapgaji/comboselect?filter=m_potongan:id_m_potongan:nama_potongan') }}",
					{  selected_value : '' });


			$('.removeCurrentFiles').on('click',function(){
				var removeUrl = $(this).attr('href');
				$.get(removeUrl,function(response){});
				$(this).parent('div').empty();
				return false;
			});

			$("#send-data").click(function(){
				$.post("{{ URL::to('lapgaji/simpantunjangan') }}", $("#tunjangan-form").serialize(), function(data) {
					//alert(data);
				});
				$.post("{{ URL::to('lapgaji/simpanpotongan') }}", $("#potongan-form").serialize(), function(data) {
					//alert(data);
				});
				$.post("{{ URL::to('lapgaji/save') }}", $("#lapgaji-form").serialize(), function(data) {
					//alert(data);
					toastr.success("success", "Saved successfully!");
				});
			});

			$("#proses").click(function(){

				$.get("{{ URL::to('lapgaji/datapegawai/') }}",{
					id_pegawai : $('#id_pegawai').val()
				}, function(data){
					$.each(data, function(index, element){
						$('#gaji').val(element.gaji_pokok);
					});
				});

				$.post("{{ URL::to('lapgaji/lemburtable/') }}",{
					tgl_awal : $('#tgl_awal').val(),
					tgl_akhir : $('#tgl_akhir').val(),
					id_pegawai : $('#id_pegawai').val()
				}, function(data){
					$('#data-lembur').html(data)
				});

				$.post("{{ URL::to('lapgaji/absentable/') }}",{
					tgl_awal : $('#tgl_awal').val(),
					tgl_akhir : $('#tgl_akhir').val(),
					id_pegawai : $('#id_pegawai').val()
				}, function(data){
					$('#data-absen').html(data);
					@if(count($detail_tunjangan) == 0)
					//uang makan

					$('#t_fak_uangmakan_1').val($('#masuk_kerja').val());
					$('#t_hasil_uangmakan_1').val(parseInt($('#masuk_kerja').val())*parseInt($('#t_nilai_uangmakan_1').val()));
					$('#t_hasil_uangmakan_1').number( true, 0);
					//lembur
					$('#t_fak_lembur_2').val($('#jumlah_lembur').val());
					var lembur = $('#jumlah_lembur').val();
					var arr_lembur = lembur.split(':');
					var nilai_lembur = (parseInt(arr_lembur[0])*parseInt($('#t_nilai_lembur_2').val()))+(parseInt(arr_lembur[1])/60*parseInt($('#t_nilai_lembur_2').val()));
					$('#t_hasil_lembur_2').val(nilai_lembur);
					$('#t_hasil_lembur_2').number( true, 0);
					//tunjangan jabatan
					var nilai_jabatan = parseInt($('#t_nilai_jabatan_3').val())*1;
					$('#t_hasil_jabatan_3').val(nilai_jabatan);
					$('#t_hasil_jabatan_3').number( true, 0);
					@endif

					@if(count($detail_potongan) == 0)
					//potongan jam
					$('#potonganjam').val($('#potongan_jam_all').val());
					var potongan_jam = $('#potongan_jam_all').val();
					var arr_potongan_jam = potongan_jam.split(':');
					var nilai_potongan_jam = Math.round((parseInt(arr_potongan_jam[0])*parseInt($('#p_nilai_potonganjam_1').val()))+(parseInt(arr_potongan_jam[1])/60*parseInt($('#p_nilai_potonganjam_1').val())));
					$('#p_fak_potonganjam_1').val(potongan_jam);
					$('#p_hasil_potonganjam_1').val(nilai_potongan_jam);
					$('#p_hasil_potonganjam_1').number( true, 0);
					//absen
					$('#absen').val($('#jml_absen').val());
					var absen = $('#jml_absen').val();
					var gaji_pokok = $('#gaji').val();
					var jumlah_hari = $('#jumlah_hari').val();
					var nilai_absen = Math.round(parseInt(gaji_pokok)/parseInt(jumlah_hari));
					$('#p_nilai_absen_2').val(nilai_absen);
					$('#p_fak_absen_2').val(absen);
					$('#p_hasil_absen_2').val(parseInt(absen)*parseInt(nilai_absen));
					$('#p_hasil_absen_2').number( true, 0);

					//jamsostek
					$('#p_fak_jamsostek_3').val(gaji_pokok);
					$('#p_hasil_jamsostek_3').val((parseInt(gaji_pokok)*(parseInt($('#p_nilai_jamsostek_3').val())/100)));
					$('#p_hasil_jamsostek_3').number( true, 0);
					@endif
				});

			});

		});


	</script>
	<script type="text/javascript" src="http://opensource.teamdf.com/number/jquery.number.js"></script>
@stop