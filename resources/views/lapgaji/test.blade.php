<table border="1">
    <tr>
        <td>id_pegawai</td>
        <td>tgl</td>
        <td>id_finger</td>
    </tr>
    @for($i=1; $i<30;$i++)
    <tr>
        <td>1</td>
        <td>2017-08-{{ $i }} 6:26</td>
        <td>3</td>
    </tr>
    <tr>
        <td>2</td>
        <td>2017-08-{{ $i }} 6:23</td>
        <td>4</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2017-08-{{ $i }} 12:05</td>
        <td>3</td>
    </tr>
    <tr>
        <td>2</td>
        <td>2017-08-{{ $i }} 12:10</td>
        <td>4</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2017-08-{{ $i }} 12:45</td>
        <td>3</td>
    </tr>
    <tr>
        <td>2</td>
        <td>2017-08-{{ $i }} 12:46</td>
        <td>4</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2017-08-{{ $i }} 17:05</td>
        <td>3</td>
    </tr>
    <tr>
        <td>2</td>
        <td>2017-08-{{ $i }} 17:16</td>
        <td>4</td>
    </tr>
    @endfor
</table>