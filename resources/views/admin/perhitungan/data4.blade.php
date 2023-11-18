@for($i = 0; $i < count($hasils); $i++) <tr>
        <td>{{ ++$j }}</td>
        <td>@php print(Helper::arrayKeyToString($hasils[$j - 1]['standar_deviasi_cuaca'])) @endphp</td>
        <td>@php print(Helper::arrayKeyToString($hasils[$j - 1]['standar_deviasi_luas_lahan'])) @endphp</td>
        <td>@php print(Helper::arrayKeyToString($hasils[$j - 1]['standar_deviasi_pupuk_urea'])) @endphp</td>
        <td>@php print(Helper::arrayKeyToString($hasils[$j - 1]['standar_deviasi_pupuk_npk'])) @endphp</td>
        <td>{{ $hasils[$j - 1]['komoditas_old'] }}</td>
        <td>{{ $hasils[$j - 1]['komoditas'] }}</td>
        </tr>
        @endfor