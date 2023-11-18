@forelse ($data as $key => $v )
<tr>
        <td>{{ ++$i }}</td>
        <td>{{ ucfirst($v->cuaca) }}</td>
        <td>{{ $v->luas_lahan }}</td>
        <td>{{ $v->pupuk_urea }}</td>
        <td>{{ $v->pupuk_npk }}</td>
        <td>{{ $v->komoditas }}</td>
        <td>
                <ul class="action">
                        {!! Helper::btn_action('',1,$v->id) !!}
                </ul>
        </td>
</tr>
@empty
<tr>
        <td colspan="8" class="text-center">Tidak ada data</td>
</tr>
@endforelse