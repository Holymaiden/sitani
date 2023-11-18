@forelse ($data as $key => $v )
<tr>
        <td>{{ ++$i }}</td>
        <td>{{ $v->bantuan->nama }}</td>
        <td>{{ date('d M Y',strtotime($v->tanggal)) }}</td>
        <td>{{ $v->jumlah }} {{$v->satuan}}</td>
        <td>{{ $v->pemberi }}</td>
        <td>
                <img style="max-width: 150px;max-height: 150px;" class="img-fluid table-avatar" src="{{url('uploads/masuk/'.$v->gambar)}}" alt="{{ $v->nama }}">
        </td>
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