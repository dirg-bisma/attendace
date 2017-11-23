<html>
<head>

    <style>
        .tabel {
            border-collapse: collapse;
            border: 1px solid black;
            text-align: center;

        }

        .tabel td, th {
            border: 1px solid black;
        }
    </style>

</head>

<body onload="print()">
<div align="center">
    <section class="sheet padding-10mm" >
        <div>
            <?php
            $awal = date_create($tgl_awal);
            $akhir = date_create($tgl_akhir);
            ?>
            <h3>
                ABSEN BULAN {{ strtoupper($etc_model->indonesian_date(strtotime($akhir->format('Y').'-'.$akhir->format('m').'-27'), "F", "")) }}
            </h3>
        </div>
        <table class="tabel">
            <thead>
            <tr>
                <th width="150px">Tanggal</th>
                <th width="150px">Hari</th>
                @foreach($jam_setting as $datajamsetting)
                    <th width="125px">{{ $datajamsetting->nama }}</th>
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
                                @if($cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$i, $datajamsetting->id_jam, $id_pegawai, $hari) == "-")
                                    <?php $tidak_absen++;?>
                                    <?php $count_absen++;?>
                                @endif
                            @elseif($datajamsetting->mode == 2)
                                @if($cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$i, $datajamsetting->id_jam, $id_pegawai, $hari) == "-")
                                    <?php $tidak_absen++;?>
                                    <?php $count_absen++;?>
                                @endif
                            @elseif($datajamsetting->mode == 3)
                                @if($cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$i, $datajamsetting->id_jam, $id_pegawai, $hari) != "-")
                                    <?php $cek = $cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari)?>
                                    <?php $tgl_def = $awal->format('Y').'-'.$awal->format('m').'-'.$x." ";?>
                                    <?php $terlambat_lokal = (strtotime($tgl_def.$cek) - strtotime($tgl_def.$datajamsetting->jam_awal));?>
                                    <?php $jam = floor($terlambat_lokal / (60*60));?>
                                    <?php $menit = $terlambat_lokal - $jam * (60*60)?>
                                    @if($terlambat == "")
                                        <?php $terlambat = $jam.":".$menit/60?>
                                    @else
                                        <?php $terlambat = $cek_jam_kerja->TimeAdd($terlambat, $jam.":".$menit/60)?>
                                    @endif
                                @endif
                            @elseif($datajamsetting->mode == 4)
                                @if($cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$i, $datajamsetting->id_jam, $id_pegawai, $hari) != "-")
                                    <?php $cek = $cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari)?>
                                    <?php $tgl_def = $awal->format('Y').'-'.$awal->format('m').'-'.$x." ";?>
                                    <?php $pulangcepat_lokal = (strtotime($tgl_def.$datajamsetting->jam_akhir) - strtotime($tgl_def.$cek));?>
                                    <?php $jam = floor($pulangcepat_lokal / (60*60))?>
                                    <?php $menit = $pulangcepat_lokal - $jam * (60*60)?>
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
                                @if($cek_jam_kerja->Carirawdata($awal->format('Y').'-'.$awal->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari) == "-")
                                    <?php $tidak_absen++;?>
                                    <?php $count_absen++;?>
                                @endif
                            @elseif($datajamsetting->mode == 2)
                                @if($cek_jam_kerja->Carirawdata($awal->format('Y').'-'.$awal->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari) == "-")
                                    <?php $tidak_absen++;?>
                                    <?php $count_absen++;?>
                                @endif
                            @elseif($datajamsetting->mode == 3)
                                @if($cek_jam_kerja->Carirawdata($awal->format('Y').'-'.$awal->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari) != "-")
                                    <?php $cek = $cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari)?>
                                    <?php $tgl_def = $awal->format('Y').'-'.$awal->format('m').'-'.$x." ";?>
                                    <?php $terlambat_lokal = (strtotime($tgl_def.$cek) - strtotime($tgl_def.$datajamsetting->jam_awal));?>
                                    <?php $jam = floor($terlambat_lokal / (60*60));?>
                                    <?php $menit = $terlambat_lokal - $jam * (60*60)?>
                                    @if($terlambat == "")
                                        <?php $terlambat = $jam.":".$menit/60?>
                                    @else
                                        <?php $terlambat = $cek_jam_kerja->TimeAdd($terlambat, $jam.":".$menit/60)?>
                                    @endif
                                @endif
                            @elseif($datajamsetting->mode == 4)
                                @if($cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari) != "-")
                                    <?php $cek = $cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari)?>
                                    <?php $tgl_def = $awal->format('Y').'-'.$awal->format('m').'-'.$x." ";?>
                                    <?php $pulangcepat_lokal = (strtotime($tgl_def.$datajamsetting->jam_akhir) - strtotime($tgl_def.$cek));?>
                                    <?php $jam = floor($pulangcepat_lokal / (60*60))?>
                                    <?php $menit = $pulangcepat_lokal - $jam * (60*60)?>
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
                                @if($cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari) == "-")
                                    <?php $tidak_absen++;?>
                                    <?php $count_absen++;?>
                                @endif
                            @elseif($datajamsetting->mode == 2)
                                @if($cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari) == "-")
                                    <?php $tidak_absen++;?>
                                    <?php $count_absen++;?>
                                @endif
                            @elseif($datajamsetting->mode == 3)

                                @if($cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari) != "-")
                                    <?php $cek = $cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari)?>
                                    <?php $tgl_def = $akhir->format('Y').'-'.$akhir->format('m').'-'.$x." ";?>
                                    <?php $terlambat_lokal = (strtotime($tgl_def.$cek) - strtotime($tgl_def.$datajamsetting->jam_awal));?>
                                    <?php $jam = floor($terlambat_lokal / (60*60));?>
                                    <?php $menit = $terlambat_lokal - $jam * (60*60)?>
                                    @if($terlambat == "")
                                        <?php $terlambat = $jam.":".$menit/60;?>
                                    @else
                                        <?php $terlambat = $cek_jam_kerja->TimeAdd($terlambat, $jam.":".$menit/60)?>
                                    @endif
                                @endif
                            @elseif($datajamsetting->mode == 4)
                                @if($cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari) != "-")
                                    <?php $cek = $cek_jam_kerja->Carirawdata($akhir->format('Y').'-'.$akhir->format('m').'-'.$x, $datajamsetting->id_jam, $id_pegawai, $hari)?>
                                    <?php $tgl_def = $akhir->format('Y').'-'.$akhir->format('m').'-'.$x." ";?>
                                    <?php $pulangcepat_lokal = (strtotime($tgl_def.$datajamsetting->jam_akhir) - strtotime($tgl_def.$cek));?>
                                    <?php $jam = floor($pulangcepat_lokal / (60*60))?>
                                    <?php $menit = $pulangcepat_lokal - $jam * (60*60)?>
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
        <br>
        <div align="left">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $data_pegawai->nama_pegawai }}</td>
                </tr>
                <tr>
                    <td width="200px">Hari Kerja</td>
                    <td width="20px">:</td>
                    <td>{{ $jumlah_hari-$libur }}</td>
                </tr>
                <tr>
                    <td>Terlambat</td>
                    <td>:</td>
                    <td>{{ $terlambat }}</td>
                </tr>
                <tr>
                    <td>Pulang Cepat</td>
                    <td>:</td>
                    <td>{{ $pulangcepat }}</td>
                </tr>
                <tr>
                    <td>Tidak Absen</td>
                    <td>:</td>
                    <td>{{ $tidak_absen-($absen*4) }}</td>
                </tr>
                <tr>
                    <td>Tidak Absen full</td>
                    <td>:</td>
                    <td>{{ $absen }}</td>
                </tr>
                <tr>
                    <td>Masuk Kerja</td>
                    <td>:</td>
                    <td>{{ ($jumlah_hari-$libur)-$absen }}</td>
                </tr>
                <tr>
                    <td>Potongan Jam</td>
                    <td>:</td>
                    <td>{{ @$cek_jam_kerja->TimeAdd($terlambat, $pulangcepat) }}</td>
                </tr>
            </table>
        </div>


    </section>
</div>
</body>
</html>