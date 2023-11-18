@forelse ($data as $key => $v )
<tr>
        <td>{{ ++$i }}</td>
        <td>{{ $v->desa_id == 0 ? 'Luar Desa' : $v->desa->nama }}</td>
        <td>{{ $v->nama }}</td>
        <td>{{ $v->hp }}</td>
        <td>{{ $v->isi }}</td>
        <td>
                <ul class="action">
                        {!! Helper::btn_action(1,'',$v->id) !!}
                </ul>
        </td>
</tr>
@empty
<tr>
        <td colspan="7" class="text-center">Tidak ada data</td>
</tr>
@endforelse