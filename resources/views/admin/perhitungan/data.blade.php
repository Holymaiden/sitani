@for ($i = 0; $i < count($data_kelompok); $i++) <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $key[$i] }}</td>
        <td>{{ $data_kelompok[$key[$i]]['sum_cuaca'] }}</td>
        <td>{{ $data_kelompok[$key[$i]]['sum_luas_lahan'] }}</td>
        <td>{{ $data_kelompok[$key[$i]]['sum_pupuk_urea'] }}</td>
        <td>{{ $data_kelompok[$key[$i]]['sum_pupuk_npk'] }}</td>
        <td>{{ $data_kelompok[$key[$i]]['jumlah_data'] }}</td>
        </tr>
        @endfor