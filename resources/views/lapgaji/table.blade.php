
    <div class="page-content row">
        <div class="page-content-wrapper">
            <div class="sbox">
                <div class="sbox-content">
                    <div class="table-responsive" style="min-height:300px;">
                        <table class="table table-striped ">
                            <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Hari</th>
                                @foreach($jam_setting as $datajamsetting)
                                    <th>{{ $datajamsetting->nama }}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                    $awal = date_create($tgl_awal);
                                    $akhir = date_create($tgl_akhir);
                                    $libur = 0;
                                    $terlambat = "";
                                    $tes_telat = "00:00";
                                    $pulangcepat = "";
                                    $ijin = 0;
                                    $tidak_absen = 0;
                                    $absen = 0;
                                    $jumlah_hari = 0;
                                    $count_terlambat = 0;
                                    $count_pulcepat = 0;
                            ?>

                            <?php if($awal->format('n') == $akhir->format('n')){?>
                                <?php $jumlah_hari = cal_days_in_month(CAL_GREGORIAN, $awal->format('n'), $akhir->format('Y')) ?>
                                @for($i=$awal->format('j');$i<=$akhir->format('j');$i++)
                                    <?php $hari = strtolower($etc_model->indonesian_date(strtotime($awal->format('Y').'-'.$awal->format('m').'-'.$i), "l", ""));?>
                                    <?php if($i < 10){?>
                                        <?php $x = sprintf("%02d", $i)?>
                                    <?php }else{ $x= $i;}?>
                                    <tr>
                                        @if($etc_model->CariArray($hari, $harinon))
                                            <td style="color: red">{{ $awal->format('Y').'-'.$awal->format('m').'-'.$x }}</td>
                                            <td style="color: red">{{ strtolower($etc_model->indonesian_date(strtotime($awal->format('Y').'-'.$awal->format('m').'-'.$x), "l", "")) }}</td>
                                            <?php $libur++; ?>
                                            @foreach($jam_setting as $datajamsetting)
                                                <td>{{ "-" }}</td>
                                            @endforeach
                                        @elseif(in_array($awal->format('Y').'-'.$awal->format('m').'-'.$x, $hari_libur))
                                            <td style="color: red">{{ $awal->format('Y').'-'.$awal->format('m').'-'.$x }}</td>
                                            <td style="color: red">{{ strtolower($etc_model->indonesian_date(strtotime($awal->format('Y').'-'.$awal->format('m').'-'.$x), "l", "")) }}</td>
                                            @if(!$etc_model->CariArray($hari, $harinon))
                                            <?php $libur++; ?>
                                            @endif
                                            @foreach($jam_setting as $datajamsetting)
                                                <td>{{ "-" }}</td>
                                            @endforeach
                                        @else
                                            <td>{{ $awal->format('Y').'-'.$awal->format('m').'-'.$i }}</td>
                                            <td>{{ strtolower($etc_model->indonesian_date(strtotime($awal->format('Y').'-'.$awal->format('m').'-'.$x), "l", "")) }}</td>
                                            <?php $count_absen = 0;?>
                                            @foreach($jam_setting as $datajamsetting)

                                                <td>{{ $cek_jam_kerja->Carirawdata($awal->format('Y').'-'.$awal->format('m').'-'.$i, $datajamsetting->id_jam, $id_pegawai, $hari) }}</td>
                                                @if($datajamsetting->mode == 1)
                                                    @if($cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$i, $datajamsetting->id_jam, $id_pegawai, $hari) == "-#-")
                                                        <?php $tidak_absen++;?>
                                                        <?php $count_absen++;?>
                                                    @endif
                                                @elseif($datajamsetting->mode == 2)
                                                    @if($cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$i, $datajamsetting->id_jam, $id_pegawai, $hari) == "-#-")
                                                        <?php $tidak_absen++;?>
                                                        <?php $count_absen++;?>
                                                    @endif
                                                @elseif($datajamsetting->mode == 3)
                                                    @if($cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$i, $datajamsetting->id_jam, $id_pegawai, $hari) != "-#-")
                                                        <?php $cek = $cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari)?>
                                                        <?php $tgl_def = $awal->format('Y').'-'.$awal->format('m').'-'.$x." ";?>
                                                        <?php $terlambat_lokal = (strtotime($tgl_def." ".$cek) - strtotime($tgl_def." ".$datajamsetting->jam_awal));?>
                                                        <?php $jam = floor($terlambat_lokal / (60*60));?>
                                                        <?php $menit = $terlambat_lokal - ($jam * (60*60));?>
                                                        <?php $count_terlambat++;?>
                                                        @if($terlambat == "")
                                                            <?php $terlambat = $jam.":".$menit/60?>
                                                        @else
                                                            <?php $terlambat = $cek_jam_kerja->TimeAdd($terlambat, $jam.":".$menit/60)?>
                                                        @endif
                                                    @endif
                                                @elseif($datajamsetting->mode == 4)
                                                    @if($cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$i, $datajamsetting->id_jam, $id_pegawai, $hari) != "-#-")
                                                        <?php $cek = $cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari)?>
                                                        <?php $tgl_def = $awal->format('Y').'-'.$awal->format('m').'-'.$x." ";?>
                                                        <?php $pulangcepat_lokal = (strtotime($tgl_def." ".$datajamsetting->jam_akhir) - strtotime($tgl_def." ".$cek));?>
                                                        <?php $jam = floor($pulangcepat_lokal / (60*60))?>
                                                        <?php $menit = $pulangcepat_lokal - $jam * (60*60)?>
                                                        <?php $count_pulcepat++;?>
                                                        @if($pulangcepat == "")
                                                            <?php $pulangcepat = $jam.":".$menit/60?>
                                                        @else
                                                            <?php $pulangcepat = $cek_jam_kerja->TimeAdd($pulangcepat, $jam.":".$menit/60)?>
                                                        @endif
                                                    @endif
                                                @endif
                                                @if($count_absen == 4)
                                                    <?php $absen++;?>
                                                    <?php $count_absen = 0;?>
                                                @endif
                                            @endforeach
                                        @endif
                                    </tr>
                                @endfor
                            <?php }else{ ?>
                                <?php $jumlah_hari_awal = cal_days_in_month(CAL_GREGORIAN, $awal->format('n'), $awal->format('Y')); ?>
                                <?php $jumlah_hari = $jumlah_hari_awal - $awal->format('D');?>
                                @for($i=$awal->format('j');$i<= $jumlah_hari_awal; $i++)
                                    <?php $hari = strtolower($etc_model->indonesian_date(strtotime($awal->format('Y').'-'.$awal->format('m').'-'.$i), "l", ""))?>
                                    <?php if($i < 10){?>
                                        <?php $x = sprintf("%02d", $i)?>
                                    <?php }else{ $x= $i;}?>
                                    <tr>
                                        @if($etc_model->CariArray($hari, $harinon))
                                            <td style="color: red">{{ $awal->format('Y').'-'.$awal->format('m').'-'.$x }}</td>
                                            <td style="color: red">{{ strtolower($etc_model->indonesian_date(strtotime($awal->format('Y').'-'.$awal->format('m').'-'.$x), "l", "")) }}</td>
                                            <?php $libur++; ?>
                                            @foreach($jam_setting as $datajamsetting)
                                                <td>{{ "-" }}</td>
                                            @endforeach
                                        @elseif(in_array($awal->format('Y').'-'.$awal->format('m').'-'.$x, $hari_libur))
                                            <td style="color: red">{{ $awal->format('Y').'-'.$awal->format('m').'-'.$x }}</td>
                                            <td style="color: red">{{ strtolower($etc_model->indonesian_date(strtotime($awal->format('Y').'-'.$awal->format('m').'-'.$x), "l", "")) }}</td>
                                            @if(!$etc_model->CariArray($hari, $harinon))
                                                <?php $libur++; ?>
                                            @endif
                                            @foreach($jam_setting as $datajamsetting)
                                                <td>{{ "-" }}</td>
                                            @endforeach
                                        @else
                                            <td>{{ $awal->format('Y').'-'.$awal->format('m').'-'.$x }}</td>
                                            <td>{{ strtolower($etc_model->indonesian_date(strtotime($awal->format('Y').'-'.$awal->format('m').'-'.$x), "l", "")) }}</td>
                                            <?php $count_absen = 0;?>
                                            @foreach($jam_setting as $datajamsetting)

                                                <td>{{ $cek_jam_kerja->Carirawdata($awal->format('Y').'-'.$awal->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari) }}</td>
                                                @if($datajamsetting->mode == 1)
                                                    @if($cek_jam_kerja->Carirawdata($awal->format('Y').'-'.$awal->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari) == "-#-")
                                                        <?php $tidak_absen++;?>
                                                        <?php $count_absen++;?>
                                                    @endif
                                                @elseif($datajamsetting->mode == 2)
                                                    @if($cek_jam_kerja->Carirawdata($awal->format('Y').'-'.$awal->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari) == "-#-")
                                                        <?php $tidak_absen++;?>
                                                        <?php $count_absen++;?>
                                                    @endif
                                                @elseif($datajamsetting->mode == 3)
                                                    @if($cek_jam_kerja->Carirawdata($awal->format('Y').'-'.$awal->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari) != "-#-")
                                                        <?php $cek = $cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari)?>
                                                        <?php $tgl_def = $awal->format('Y').'-'.$awal->format('m').'-'.$x." ";?>
                                                        <?php $terlambat_lokal = (strtotime($tgl_def." ".$cek) - strtotime($tgl_def." ".$datajamsetting->jam_awal));?>
                                                        <?php $jam = floor($terlambat_lokal / (60*60));?>
                                                        <?php $menit = $terlambat_lokal - $jam * (60*60)?>
                                                        <?php $count_terlambat++;?>
                                                        @if($terlambat == "")
                                                            <?php $terlambat = $jam.":".$menit/60?>
                                                        @else
                                                            <?php $terlambat = $cek_jam_kerja->TimeAdd($terlambat, $jam.":".$menit/60)?>
                                                        @endif
                                                    @endif
                                                @elseif($datajamsetting->mode == 4)
                                                    @if($cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari) != "-#-")
                                                        <?php $cek = $cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari)?>
                                                        <?php $tgl_def = $awal->format('Y').'-'.$awal->format('m').'-'.$x." ";?>
                                                        <?php $pulangcepat_lokal = (strtotime($tgl_def." ".$datajamsetting->jam_akhir) - strtotime($tgl_def." ".$cek));?>
                                                        <?php $jam = floor($pulangcepat_lokal / (60*60))?>
                                                        <?php $menit = $pulangcepat_lokal - $jam * (60*60)?>
                                                        <?php $count_pulcepat++;?>
                                                        @if($pulangcepat == "")
                                                            <?php $pulangcepat = $jam.":".$menit/60?>
                                                        @else
                                                            <?php $pulangcepat = $cek_jam_kerja->TimeAdd($pulangcepat, $jam.":".$menit/60)?>
                                                        @endif
                                                    @endif
                                                @endif
                                                @if($count_absen == 4)
                                                    <?php $absen++;?>
                                                    <?php $count_absen = 0;?>
                                                @endif
                                            @endforeach
                                        @endif

                                    </tr>
                                @endfor
                                <?php $jumlah_hari_akhir = cal_days_in_month(CAL_GREGORIAN, $akhir->format('n'), $akhir->format('Y')); ?>
                                <?php $jumlah_hari = $jumlah_hari + $akhir->format('D');?>
                                @for($i=1;$i<= $akhir->format('j'); $i++)
                                    <?php if($i < 10){?>
                                        <?php $x = sprintf("%02d", $i)?>
                                    <?php }else{ $x= $i;}?>
                                    <?php $hari = strtolower($etc_model->indonesian_date(strtotime($akhir->format('Y').'-'.$akhir->format('m').'-'.$x), "l", ""))?>

                                    <tr>
                                        @if($etc_model->CariArray($hari, $harinon))
                                            <td style="color: red">{{ $akhir->format('Y').'-'.$akhir->format('m').'-'.$x }}</td>
                                            <td style="color: red">{{ strtolower($etc_model->indonesian_date(strtotime($akhir->format('Y').'-'.$akhir->format('m').'-'.$x), "l", "")) }}</td>
                                            <?php $libur++; ?>
                                            @foreach($jam_setting as $datajamsetting)
                                                <td>{{ "-" }}</td>
                                            @endforeach
                                        @elseif(in_array($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $hari_libur))
                                            <td style="color: red">{{ $akhir->format('Y').'-'.$akhir->format('m').'-'.$x }}</td>
                                            <td style="color: red">{{ strtolower($etc_model->indonesian_date(strtotime($akhir->format('Y').'-'.$akhir->format('m').'-'.$x), "l", "")) }}</td>
                                            @if(!$etc_model->CariArray($hari, $harinon))
                                                <?php $libur++; ?>
                                            @endif
                                            @foreach($jam_setting as $datajamsetting)
                                                <td>{{ "-" }}</td>
                                            @endforeach
                                        @else
                                            <td>{{ $akhir->format('Y').'-'.$akhir->format('m').'-'.$x }}</td>
                                            <td>{{ strtolower($etc_model->indonesian_date(strtotime($akhir->format('Y').'-'.$akhir->format('m').'-'.$x), "l", "")) }}</td>
                                            <?php $count_absen = 0;?>
                                            @foreach($jam_setting as $datajamsetting)

                                                <td>{{ $cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari) }}</td>
                                                @if($datajamsetting->mode == 1)
                                                    @if($cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari) == "-#-")
                                                        <?php $tidak_absen++;?>
                                                        <?php $count_absen++;?>
                                                    @endif
                                                @elseif($datajamsetting->mode == 2)
                                                    @if($cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari) == "-#-")
                                                        <?php $tidak_absen++;?>
                                                        <?php $count_absen++;?>
                                                    @endif
                                                @elseif($datajamsetting->mode == 3)

                                                    @if($cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari) != "-#-")
                                                        <?php $cek = $cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari)?>
                                                        <?php $tgl_def = $akhir->format('Y').'-'.$akhir->format('m').'-'.$x." ";?>
                                                        <?php $terlambat_lokal = (strtotime($tgl_def." ".$cek) - strtotime($tgl_def." ".$datajamsetting->jam_awal));?>
                                                        <?php $jam = floor($terlambat_lokal / (60*60));?>
                                                        <?php $menit = ($terlambat_lokal - $jam) * (60*60)?>
                                                        <?php $count_terlambat++;?>
                                                        @if($terlambat == "")
                                                            <?php $terlambat = $jam.":".$menit/60;?>
                                                        @else
                                                            <?php $terlambat = $cek_jam_kerja->TimeAdd($terlambat, $jam.":".$menit/60)?>
                                                        @endif
                                                    @endif
                                                @elseif($datajamsetting->mode == 4)
                                                    @if($cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari) != "-#-")
                                                        <?php $cek = $cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari)?>
                                                        <?php $tgl_def = $akhir->format('Y').'-'.$akhir->format('m').'-'.$x." ";?>
                                                        <?php $pulangcepat_lokal = (strtotime($tgl_def." ".$datajamsetting->jam_akhir) - strtotime($tgl_def." ".$cek));?>
                                                        <?php $jam = floor($pulangcepat_lokal / (60*60))?>
                                                        <?php $menit = $pulangcepat_lokal - $jam * (60*60)?>
                                                        <?php $count_pulcepat++;?>
                                                            @if($pulangcepat == "")
                                                                <?php $pulangcepat = $jam.":".$menit/60?>
                                                            @else
                                                                <?php $pulangcepat = $cek_jam_kerja->TimeAdd($pulangcepat, $jam.":".$menit/60)?>
                                                            @endif
                                                    @endif
                                                @endif
                                                @if($count_absen == 4)
                                                    <?php $absen++;?>
                                                    <?php $count_absen = 0;?>
                                                @endif
                                            @endforeach
                                        @endif
                                    </tr>
                                @endfor
                            <?php }?>
                            </tbody>
                        </table>


                    </div>
                </div>
                <div class="table" style="min-height:300px;">
                    <table class="table table-striped ">
                        <tr>
                            <td width="200px"><h3>Hari Kerja</h3></td>
                            <td width="20px"><h3>:</h3></td>
                            <td><h3>{{ $jumlah_hari-$libur }}</h3></td>
                        </tr>
                        <tr>
                            <td><h3>Terlambat</h3></td>
                            <td><h3>:</h3></td>
                            <td><h3>{{ $terlambat }}</h3></td>
                        </tr>
                        <tr>
                            <td><h3>Pulang Cepat</h3></td>
                            <td><h3>:</h3></td>
                            <td><h3>{{ $pulangcepat }}</h3></td>
                        </tr>
                        <tr>
                            <td><h3>Tidak Absen</h3></td>
                            <td><h3>:</h3></td>
                            <td><h3>{{ ($tidak_absen-($count_terlambat+$count_pulcepat)) }}</h3></td>
                        </tr>
                        <tr>
                            <td><h3>Terlambat/Pulang Cepat</h3></td>
                            <td><h3>:</h3></td>
                            <td><h3>{{ $count_terlambat."/".$count_pulcepat }}</h3></td>
                        </tr>
                        <tr>
                            <td><h3>Tidak Absen full</h3></td>
                            <td><h3>:</h3></td>
                            <td><h3>{{ $absen }}</h3></td>
                        </tr>
                        <tr>
                            <td><h3>Masuk Kerja</h3></td>
                            <td><h3>:</h3></td>
                            <td><h3>{{ ($jumlah_hari-$libur)-$absen }}</h3></td>
                        </tr>
                        <tr>
                            <td><h3>Potongan Jam</h3></td>
                            <td><h3>:</h3></td>
                            <td><h3>{{ @$cek_jam_kerja->TimeAdd($terlambat, $pulangcepat) }}</h3></td>
                        </tr>
                    </table>

                </div>
            <form>
                <input type="hidden" id="jumlah_hari" name="jumlah_hari" value="{{ $jumlah_hari-$libur }}">
                <input type="hidden" id="terlambat" name="terlambat" value="{{ $terlambat }}">
                <input type="hidden" id="pulangcepat" name="pulangcepat" value="{{ $pulangcepat }}">
                <input type="hidden" id="potongan_jam_all" name="potongan_jam_all" value="{{ @$cek_jam_kerja->TimeAdd($terlambat, $pulangcepat) }}">
                <input type="hidden" id="jml_absen" name="jml_absen" value="{{ $absen }}">
                <input type="hidden" id="tidak_finger" name="tidak_finger" value="{{ $tidak_absen-($absen*4) }}" >
                <input type="hidden" id="masuk_kerja" name="masuk_kerja" value="{{ ($jumlah_hari-$libur)-$absen }}" >
            </form>
            </div>
        </div>
    </div>
