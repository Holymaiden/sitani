@forelse ($data as $key => $v )
<tr>
        <td>{{ ++$i }}</td>
        <td>{{ $v->nama }}</td>
        <td>{{ $v->keterangan }}</td>
        <td>
                <img style="max-width: 150px;max-height: 150px;" class="img-fluid table-avatar" src="{{url('uploads/bantuan/'.$v->gambar)}}" alt="{{ $v->nama }}">
        </td>
        <td>
                <ul class="action">
                        {!! Helper::btn_action(1,1,$v->id) !!}
                </ul>
        </td>
</tr>
@empty
<tr>
        <td colspan="5" class="text-center">Tidak ada data</td>
</tr>
@endforelse