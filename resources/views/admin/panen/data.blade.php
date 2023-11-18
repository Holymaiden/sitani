@forelse ($data as $key => $v )
<tr>
        <td>{{ ++$i }}</td>
        <td>{{ $v->lahan->anggota->nama }}</td>
        <td>{{ $v->masuk->bantuan->nama }}</td>
        <td>{{ $v->masuk->jumlah }} {{$v->masuk->satuan}}</td>
        <td>{{ date('d M Y',strtotime($v->tanggal_tanam)) }}</td>
        <td>{{ date('d M Y',strtotime($v->tanggal_panen)) }}</td>
        <td>
                <ul class="action">
                        <li style="margin-right: 5px;"> <a onclick="showForm('{{$v->id}}')"><i class="icon-eye" style="color: purple"></i></a></li>
                        {!! Helper::btn_action(1,1,$v->id) !!}
                </ul>
        </td>
</tr>
@empty
<tr>
        <td colspan="11" class="text-center">Tidak ada data</td>
</tr>
@endforelse