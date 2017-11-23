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
                LEMBUR BULAN {{ strtoupper($etc_model->indonesian_date(strtotime($akhir->format('Y').'-'.$akhir->format('m').'-27'), "F", "")) }}
            </h3>
        </div>

        <table class="tabel">
            <thead>
            <tr>
                <th width="200px">Tanggal</th>
                <th width="200px">Hari</th>
                <th width="200px">Lembur</th>
            </tr>
            </thead>
            <?php
            $awal = date_create($tgl_awal);
            $akhir = date_create($tgl_akhir);
            $lembur = null;
            ?>
            <tbody>
            @if($awal->format('n') == $akhir->format('n'))

                @for($i=$awal->format('j');$i<=$akhir->format('j');$i++)
                    <?php $hari = strtolower($etc_model->indonesian_date(strtotime($awal->format('Y').'-'.$awal->format('m').'-'.$i),"l", ""))?>
                    <tr>
                        @if($etc_model->CariArray($hari, $harinon))
                            <td style="color: red">{{ $awal->format('Y').'-'.$awal->format('m').'-'.$i }}</td>
                            <td style="color: red">{{ $hari }}</td>
                            <td>{{ $cek_jam_kerja->Carirawdatalembur($awal->format('Y').'-'.$awal->format('m').'-'.$i, $id_pegawai, $hari) }}</td>
                            @if($cek_jam_kerja->Carirawdatalembur($awal->format('Y').'-'.$awal->format('m').'-'.$i, $id_pegawai, $hari) != "-")
                                <?php $cek = $cek_jam_kerja->Carirawdatalembur($awal->format('Y').'-'.$awal->format('m').'-'.$i, $id_pegawai, $hari) ?>
                                @if($lembur == null)
                                    <?php $lembur = $cek_jam_kerja->TimeAdd("00:00", $cek)?>
                                @else
                                    <?php $lembur = $cek_jam_kerja->TimeAdd($lembur, $cek)?>
                                @endif
                            @endif
                        @else
                            <td>{{ $awal->format('Y').'-'.$awal->format('m').'-'.$i }}</td>
                            <td>{{ $hari }}</td>
                            <td>{{ $cek_jam_kerja->Carirawdatalembur($awal->format('Y').'-'.$awal->format('m').'-'.$i, $id_pegawai, $hari) }}</td>
                            @if($cek_jam_kerja->Carirawdatalembur($awal->format('Y').'-'.$awal->format('m').'-'.$i, $id_pegawai, $hari) != "-")
                                <?php $cek = $cek_jam_kerja->Carirawdatalembur($awal->format('Y').'-'.$awal->format('m').'-'.$i, $id_pegawai, $hari) ?>
                                @if($lembur == null)
                                    <?php $lembur = $cek_jam_kerja->TimeAdd("00:00", $cek)?>
                                @else
                                    <?php $lembur = $cek_jam_kerja->TimeAdd($lembur, $cek)?>
                                @endif
                            @endif
                        @endif
                    </tr>
                @endfor
            @else
                <?php $jumlah_hari_akhir = cal_days_in_month(CAL_GREGORIAN, $awal->format('n'), $akhir->format('Y')) ?>
                @for($i=$awal->format('j');$i<=$jumlah_hari_akhir;$i++)
                    <?php $hari = strtolower($etc_model->indonesian_date(strtotime($awal->format('Y').'-'.$awal->format('m').'-'.$i),"l", ""))?>
                    <tr>
                        @if($etc_model->CariArray($hari, $harinon))
                            <td style="color: red">{{ $awal->format('Y').'-'.$awal->format('m').'-'.$i }}</td>
                            <td style="color: red">{{ $hari }}</td>
                            <td>{{ $cek_jam_kerja->Carirawdatalembur($awal->format('Y').'-'.$awal->format('m').'-'.$i, $id_pegawai, $hari) }}</td>
                            @if($cek_jam_kerja->Carirawdatalembur($awal->format('Y').'-'.$awal->format('m').'-'.$i, $id_pegawai, $hari) != "-")
                                <?php $cek = $cek_jam_kerja->Carirawdatalembur($awal->format('Y').'-'.$awal->format('m').'-'.$i, $id_pegawai, $hari) ?>
                                @if($lembur == null)
                                    <?php $lembur = $cek_jam_kerja->TimeAdd("00:00", $cek)?>
                                @else
                                    <?php $lembur = $cek_jam_kerja->TimeAdd($lembur, $cek)?>
                                @endif
                            @endif
                        @else
                            <td>{{ $awal->format('Y').'-'.$awal->format('m').'-'.$i }}</td>
                            <td>{{ $hari }}</td>
                            <td>{{ $cek_jam_kerja->Carirawdatalembur($awal->format('Y').'-'.$awal->format('m').'-'.$i, $id_pegawai, $hari) }}</td>
                            @if($cek_jam_kerja->Carirawdatalembur($awal->format('Y').'-'.$awal->format('m').'-'.$i, $id_pegawai, $hari) != "-")
                                <?php $cek = $cek_jam_kerja->Carirawdatalembur($awal->format('Y').'-'.$awal->format('m').'-'.$i, $id_pegawai, $hari) ?>
                                @if($lembur == null)
                                    <?php $lembur = $cek_jam_kerja->TimeAdd("00:00", $cek)?>
                                @else
                                    <?php $lembur = $cek_jam_kerja->TimeAdd($lembur, $cek)?>
                                @endif
                            @endif
                        @endif
                    </tr>
                @endfor

                @for($i=1;$i<=$akhir->format('j');$i++)
                    <?php $hari = strtolower($etc_model->indonesian_date(strtotime($akhir->format('Y').'-'.$akhir->format('m').'-'.$i),"l", ""))?>
                    <tr>
                        @if($etc_model->CariArray($hari, $harinon))
                            <td style="color: red">{{ $akhir->format('Y').'-'.$akhir->format('m').'-'.$i }}</td>
                            <td style="color: red">{{ $hari }}</td>
                            <td>{{ $cek_jam_kerja->Carirawdatalembur($akhir->format('Y').'-'.$akhir->format('m').'-'.$i, $id_pegawai, $hari) }}</td>
                            @if($cek_jam_kerja->Carirawdatalembur($awal->format('Y').'-'.$awal->format('m').'-'.$i, $id_pegawai, $hari) != "-")
                                <?php $cek = $cek_jam_kerja->Carirawdatalembur($awal->format('Y').'-'.$awal->format('m').'-'.$i, $id_pegawai, $hari) ?>
                                @if($lembur == null)
                                    <?php $lembur = $cek_jam_kerja->TimeAdd("00:00", $cek)?>
                                @else
                                    <?php $lembur = $cek_jam_kerja->TimeAdd($lembur, $cek)?>
                                @endif
                            @endif
                        @else
                            <td>{{ $awal->format('Y').'-'.$akhir->format('m').'-'.$i }}</td>
                            <td>{{ $hari }}</td>
                            <td>{{ $cek_jam_kerja->Carirawdatalembur($akhir->format('Y').'-'.$akhir->format('m').'-'.$i, $id_pegawai, $hari) }}</td>
                            @if($cek_jam_kerja->Carirawdatalembur($awal->format('Y').'-'.$awal->format('m').'-'.$i, $id_pegawai, $hari) != "-")
                                <?php $cek = $cek_jam_kerja->Carirawdatalembur($awal->format('Y').'-'.$awal->format('m').'-'.$i, $id_pegawai, $hari) ?>
                                @if($lembur == null)
                                    <?php $lembur = $cek_jam_kerja->TimeAdd("00:00", $cek)?>
                                @else
                                    <?php $lembur = $cek_jam_kerja->TimeAdd($lembur, $cek)?>
                                @endif
                            @endif
                        @endif
                    </tr>
                @endfor
            @endif
            </tbody>
        </table>
<br>
        <div class="table" style="min-height:300px;">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $data_pegawai->nama_pegawai }}</td>
                </tr>
                <tr>
                    <td width="100px" ><h3>Lembur</h3></td>
                    <td width="20px"><h3>:</h3></td>
                    <td><h3>{{ $lembur != "" ? $lembur : "0" }}</h3></td>
                </tr>
            </table>
        </div>
        <br>
    </section>
</div>
</body>
</html>