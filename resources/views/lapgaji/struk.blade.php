<html>
<header>

</header>
<body>
<table>
    <tr>
        <td style="text-align: center"><h3>PT. Dewi Permata Mandiri</h3></td>
    </tr>
    <tr>
        <td style="text-align: center"><h4>Jl. Langsep I / 26  Tlp. (0331) 424080  Jember 68111</h4></td>
    </tr>
</table>
<table>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td>{{ $pegawai->where('id_pegawai', $row->id_pegawai)->first()->nama_pegawai }}</td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td>{{ $jabatan->where('id_jabatan',$pegawai->where('id_pegawai', $row->id_pegawai)->first()->id_jabatan)->first()->nama_jabatan }}</td>
    </tr>
    <tr>
        <td>Gaji</td>
        <td>:</td>
        <td>{{ $etc->indonesian_date('01-'.$row->bulan.'-'.$row->tahun, 'F - Y', '') }}</td>
    </tr>
</table>
<table>
    <tr>
        <td>&nbsp;</td>
        <td>Penerimaan</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>1</td>
        <td>Gaji Pokok</td>
        <td>:</td>
        <td>Rp</td>
        <td>{{ number_format($row->gaji) }}</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Total Tunjangan</td>
        <td>:</td>
        <td>Rp</td>
        <td>{{ number_format($row->tunjangan) }}</td>
    </tr>
    <tr>
        <td>3</td>
        <td>Total Potongan</td>
        <td>:</td>
        <td>Rp</td>
        <td><u>{{ number_format($row->potongan) }}</u> +</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><strong>Gaji Bersih</strong></td>
        <td>:</td>
        <td><strong>Rp</strong></td>
        <td><strong>{{ number_format(($row->gaji+$row->tunjangan)-$row->potongan) }}</strong></td>
    </tr>

</table>
<table>
    <tr>
        <td>&nbsp;</td>
        <td>Terbilang</td>
        <td>:</td>
        <td></td>
        <td>{{ strtoupper($etc->terbilang(($row->gaji+$row->tunjangan)-$row->potongan)) }} RUPIAH</td>
    </tr>
</table>
<br>
<table>
    <tr>
        <td>&nbsp;</td>
        <td>Rincian Tunjangan</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <?php $t_i = 1?>
    <?php $total_tunjangan = 0?>
    @foreach($detail_tunjangan as $data_tunjangan)
    <tr>
        <td>{{ $t_i }}</td>
        <td>{{ $m_tunjangan->where('id_tunjangan', $data_tunjangan->id_tunjangan)->first()->nama_tunjangan }}</td>
        <td>:</td>
        <td>{{ $data_tunjangan->nilai }}</td>
        <td>x</td>
        <td>{{ $data_tunjangan->faktor }}</td>
        <td>=</td>
        @if(count($detail_tunjangan) === $t_i)
            <td><u>{{ number_format($data_tunjangan->hasil) }}&nbsp;&nbsp;</u> +</td>
            <td>{{ $data_tunjangan->keterangan }}</td>
        @else
            <td>{{ number_format($data_tunjangan->hasil) }}</td>
            <td>{{ $data_tunjangan->keterangan }}</td>
        @endif
        <?php $total_tunjangan = $total_tunjangan + $data_tunjangan->hasil;?>
    </tr>
    <?php $t_i++;?>
    @endforeach
    <tr>
        <td>&nbsp;</td>
        <td><strong>Total</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><strong>{{ number_format($total_tunjangan) }}</strong></td>
        <td>&nbsp;</td>
    </tr>
</table>
<br>
<table>
    <tr>
        <td>&nbsp;</td>
        <td>Rincian Potongan</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <?php $p_i = 1;?>
    <?php $total_potongan = 0;?>
    @foreach($detail_potongan as $data_potongan)
    <tr>
        <td>{{ $p_i }}</td>
        <td>{{ $m_potongan->where('id_m_potongan', $data_potongan->id_potongan)->first()->nama_potongan }}</td>
        <td>:</td>
        <td>{{ $data_potongan->nilai }}</td>
        <td>x</td>
        <td>{{ $data_potongan->faktor }}</td>
        <td>=</td>
        @if(count($detail_potongan) === $p_i)
            <td><u>{{ number_format($data_potongan->hasil_rp) }}&nbsp;&nbsp;</u> +</td>
            <td>{{ $data_potongan->keterangan }}</td>
        @else
            <td>{{ number_format($data_potongan->hasil_rp) }}</td>
            <td>{{ $data_potongan->keterangan }}</td>
        @endif
    </tr>
    <?php $total_potongan = $total_potongan + $data_potongan->hasil_rp; ?>
    <?php $p_i++;?>
    @endforeach
    <tr>
        <td>&nbsp;</td>
        <td><strong>Total</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><strong>{{ number_format($total_potongan) }}</strong></td>
        <td>&nbsp;</td>
    </tr>
</table>
</body>
</html>