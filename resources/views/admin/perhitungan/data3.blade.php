<table class="table table-bordernone">
        <thead>
                <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        @for ($i = 0; $i < count($key); $i++) <th>{{ $key[$i] }}</th>@endfor
                </tr>
        </thead>
        <tbody>
                @for ($i = 0; $i < count($data_standar_deviasi); $i++) <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ ucfirst(str_replace("_"," ",str_replace("standar_deviasi_","",$key2[$i]))) }}</td>
                        @for ($j = 0; $j < count($key); $j++) <td>{{ $data_standar_deviasi[$key2[$i]][$key[$j]] }}</td>@endfor
                                </tr>
                                @endfor
        </tbody>
        <tfoot>
                <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        @for ($i = 0; $i < count($key); $i++) <th>{{ $key[$i] }}</th>@endfor
                </tr>
        </tfoot>
</table>