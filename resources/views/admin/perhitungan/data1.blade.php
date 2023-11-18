@for ($i = 0; $i < count($data_probabilitas_mean); $i++) <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $key[$i] }}</td>
        <td>{{ $data_probabilitas_mean[$key[$i]]['mean_cuaca'] }}</td>
        <td>{{ $data_probabilitas_mean[$key[$i]]['mean_luas_lahan'] }}</td>
        <td>{{ $data_probabilitas_mean[$key[$i]]['mean_pupuk_urea'] }}</td>
        <td>{{ $data_probabilitas_mean[$key[$i]]['mean_pupuk_npk'] }}</td>
        <td>{{ $data_probabilitas_mean[$key[$i]]['probabilitas'] }}</td>
        </tr>
        @endfor