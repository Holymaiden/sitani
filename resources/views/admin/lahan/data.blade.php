@forelse ($data as $key => $v )
<tr>
        <td>{{ ++$i }}</td>
        <td>{{ $v->anggota->nama }}</td>
        <td>{{ $v->luas_lahan }} {{$v->satuan_lahan}}</td>
        <td>{{ $v->jenis_lahan }}</td>
        <td>{{ $v->pupuk }}</td>
        <td>
                <ul class="action">
                        {!! Helper::btn_action(1,1,$v->id) !!}
                </ul>
        </td>
</tr>
@empty
<tr>
        <td colspan="6" class="text-center">Tidak ada data</td>
</tr>
@endforelse