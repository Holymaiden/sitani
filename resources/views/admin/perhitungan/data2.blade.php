@for($i = 0; $i < count($data_latih); $i++) <tr>
        <td>{{ ++$j }}</td>
        <td>@php print(Helper::arrayKeyToString($data_latih[$j - 1]['standar_deviasi_cuaca'])) @endphp</td>
        <td>@php print(Helper::arrayKeyToString($data_latih[$j - 1]['standar_deviasi_luas_lahan'])) @endphp</td>
        <td>@php print(Helper::arrayKeyToString($data_latih[$j - 1]['standar_deviasi_pupuk_urea'])) @endphp</td>
        <td>@php print(Helper::arrayKeyToString($data_latih[$j - 1]['standar_deviasi_pupuk_npk'])) @endphp</td>
        </tr>
        @endfor