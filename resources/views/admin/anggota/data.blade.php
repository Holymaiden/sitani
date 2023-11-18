@forelse ($data as $key => $v )
<tr>
        <td>{{ ++$i }}</td>
        <td>{{ $v->kelompok->nama }}</td>
        <td>{{ $v->nama }}</td>
        <td>{{ $v->status }}</td>
        <td>{{ $v->jenis_kelamin }}</td>
        <td>{{ $v->no_tlp }}</td>
        <td>{{ $v->alamat }}</td>
        <td>
                <ul class="action">
                        {!! Helper::btn_action(1,1,$v->id) !!}
                </ul>
        </td>
</tr>
@empty
<tr>
        <td colspan="8" class="text-center">Tidak ada data</td>
</tr>
@endforelse