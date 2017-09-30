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

                    {!! Form::open(array('url'=>'lapgaji/proses', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
                    <div class="col-md-12">
                        <fieldset><legend> Proses Laporan Gaji</legend>


                            <div class="form-group  " >
                                <label for="Tgl Awal" class=" control-label col-md-4 text-left"> Pilih Bulan </label>
                                <div class="col-md-6">
                                        <select name='bulan' rows='3' id='bulan' class='select2 '   >
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                </div>
                                <div class="col-md-2">

                                </div>
                            </div>
                            <div class="form-group  " >
                                <label for="Gaji" class=" control-label col-md-4 text-left"> Tahun </label>
                                <div class="col-md-6">
                                    {!! Form::text('tahun', date('Y'),array('class'=>'form-control', 'placeholder'=>'',  'id'=>'tahun' )) !!}
                                </div>
                                <div class="col-md-2">

                                </div>
                            </div>
                        </fieldset>
                    </div>




                    <div style="clear:both"></div>


                    <div class="form-group">
                        <label class="col-sm-4 text-right">&nbsp;</label>
                        <div class="col-sm-8">
                            <button type="submit" name="submit" class="btn btn-primary btn-sm" ><i class="fa  fa-save "></i> PROSES</button>
                            <button type="button" onclick="location.href='{{ URL::to('lapgaji?return='.$return) }}' " class="btn btn-success btn-sm "><i class="fa  fa-arrow-circle-left "></i>  {{ Lang::get('core.sb_cancel') }} </button>
                        </div>

                    </div>

                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {



        });


    </script>
@stop