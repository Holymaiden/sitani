@forelse ($data as $key => $v )
<tr>
        <td>{{ ++$i }}</td>
        <td>{{ $v->desa->nama }}</td>
        <td>{{ $v->nama }}</td>
        <td>{{ $v->jenis_kelamin }}</td>
        <td>{{ $v->hp }}</td>
        <td>{{ $v->alamat }}</td>
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