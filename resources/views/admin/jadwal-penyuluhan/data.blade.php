@forelse ($data as $key => $v )
<tr>
        <td>{{ ++$i }}</td>
        <td>{{ $v->penyuluh->nama }}</td>
        <td>{{ $v->tanggal }}</td>
        <td>{{ $v->waktu }}</td>
        <td>{{ $v->tempat }}</td>
        <td>{{ $v->keterangan }}</td>
        <td>
                <ul class="action">
                        {!! Helper::btn_action(1,1,$v->id) !!}
                </ul>
        </td>
</tr>
@empty
<tr>
        <td colspan="7" class="text-center">Tidak ada data</td>
</tr>
@endforelse