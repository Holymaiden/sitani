<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\DataLatih;
use Illuminate\Http\Request;

class NaiveBayesController extends Controller
{
    protected  $response, $title;

    public function __construct()
    {
        $this->title = 'naive-bayes';
    }

    public function _error($e)
    {
        $this->response = [
            'message' => $e->getMessage() . ' in file :' . $e->getFile() . ' line: ' . $e->getLine()
        ];
        return view('errors.message', ['message' => $this->response]);
    }

    public function index()
    {
        try {
            $title = $this->title;

            $totalData = DataLatih::count();
            $akurasi = $this->akurasi();

            return view('admin.' . $title . '.index', compact('title', 'totalData', 'akurasi'));
        } catch (\Exception $e) {
            return $this->_error($e);
        }
    }

    public function store(Request $request)
    {
        try {
            $data_uji[0]['cuaca'] = $request->cuaca;
            $data_uji[0]['luas_lahan'] = $request->luas_lahan;
            $data_uji[0]['pupuk_urea'] = $request->pupuk_urea;
            $data_uji[0]['pupuk_npk'] = $request->pupuk_npk;

            $hasil = $this->naivebayes($data_uji);

            DataLatih::create([
                'komoditas' => $hasil[0]['komoditas'],
                'cuaca' => $hasil[0]['cuaca'],
                'luas_lahan' => $hasil[0]['luas_lahan'],
                'pupuk_urea' => $hasil[0]['pupuk_urea'],
                'pupuk_npk' => $hasil[0]['pupuk_npk'],
            ]);

            return response()->json($hasil[0]);
        } catch (\Exception $e) {
            $message = $e->getMessage() . ' in file :' . $e->getFile() . ' line: ' . $e->getLine();
            return response()->json($message);
        }
    }

    public function naivebayes($data_uji)
    {
        // Data Latih
        $data_latih = DataLatih::all();

        $jumlahData = count($data_latih);

        // Kelompokkan Data Latih Berdasarkan Komoditas
        $data_kelompok = [];
        foreach ($data_latih as $key => $value) {
            // Jumlah Data
            $data_kelompok[$value->komoditas]['jumlah_data'] = isset($data_kelompok[$value->komoditas]['jumlah_data']) ? $data_kelompok[$value->komoditas]['jumlah_data'] + 1 : 1;

            $value->cuaca = (float) Helper::cuacaToValue($value->cuaca);

            // Sum Data
            $data_kelompok[$value->komoditas]['sum_cuaca'] = isset($data_kelompok[$value->komoditas]['sum_cuaca']) ? $data_kelompok[$value->komoditas]['sum_cuaca'] + $value->cuaca : $value->cuaca;
            $data_kelompok[$value->komoditas]['sum_luas_lahan'] = isset($data_kelompok[$value->komoditas]['sum_luas_lahan']) ? $data_kelompok[$value->komoditas]['sum_luas_lahan'] + $value->luas_lahan : $value->luas_lahan;
            $data_kelompok[$value->komoditas]['sum_pupuk_urea'] = isset($data_kelompok[$value->komoditas]['sum_pupuk_urea']) ? $data_kelompok[$value->komoditas]['sum_pupuk_urea'] + $value->pupuk_urea : $value->pupuk_urea;
            $data_kelompok[$value->komoditas]['sum_pupuk_npk'] = isset($data_kelompok[$value->komoditas]['sum_pupuk_npk']) ? $data_kelompok[$value->komoditas]['sum_pupuk_npk'] + $value->pupuk_npk : $value->pupuk_npk;
        }

        // Hitung Probabilitas dan Mean
        $data_probabilitas_mean = [];
        foreach ($data_kelompok as $key => $value) {
            // Probabilitas
            $data_probabilitas_mean[$key]['probabilitas'] = $value['jumlah_data'] / $jumlahData;

            // Mean
            $data_probabilitas_mean[$key]['mean_cuaca'] = $value['sum_cuaca'] / $value['jumlah_data'];
            $data_probabilitas_mean[$key]['mean_luas_lahan'] = $value['sum_luas_lahan'] / $value['jumlah_data'];
            $data_probabilitas_mean[$key]['mean_pupuk_urea'] = $value['sum_pupuk_urea'] / $value['jumlah_data'];
            $data_probabilitas_mean[$key]['mean_pupuk_npk'] = $value['sum_pupuk_npk'] / $value['jumlah_data'];
        }

        $data_latih = $data_latih->toArray();
        // Standar Deviasi
        foreach ($data_latih as $i => $latih) {
            foreach ($data_kelompok as $key => $value) {
                if ($latih['komoditas'] == $key) {
                    $data_latih[$i]['standar_deviasi_cuaca'][$key] = pow((float) Helper::cuacaToValue($latih['cuaca']) - $data_probabilitas_mean[$key]['mean_cuaca'], 2);
                    $data_latih[$i]['standar_deviasi_luas_lahan'][$key] = pow($latih['luas_lahan'] - $data_probabilitas_mean[$key]['mean_luas_lahan'], 2);
                    $data_latih[$i]['standar_deviasi_pupuk_urea'][$key] = pow($latih['pupuk_urea'] - $data_probabilitas_mean[$key]['mean_pupuk_urea'], 2);
                    $data_latih[$i]['standar_deviasi_pupuk_npk'][$key] = pow($latih['pupuk_npk'] - $data_probabilitas_mean[$key]['mean_pupuk_npk'], 2);
                } else {
                    $data_latih[$i]['standar_deviasi_cuaca'][$key] = 0;
                    $data_latih[$i]['standar_deviasi_luas_lahan'][$key] = 0;
                    $data_latih[$i]['standar_deviasi_pupuk_urea'][$key] = 0;
                    $data_latih[$i]['standar_deviasi_pupuk_npk'][$key] = 0;
                }
            }
        }

        $data_standar_deviasi = [];
        foreach ($data_kelompok as $key => $kelompok) {
            $data_standar_deviasi['standar_deviasi_cuaca'][$key] = sqrt(array_sum(array_column(array_column($data_latih, 'standar_deviasi_cuaca'), $key)) / ($kelompok['jumlah_data'] - 1));
            $data_standar_deviasi['standar_deviasi_luas_lahan'][$key] = sqrt(array_sum(array_column(array_column($data_latih, 'standar_deviasi_luas_lahan'), $key)) / ($kelompok['jumlah_data'] - 1));
            $data_standar_deviasi['standar_deviasi_pupuk_urea'][$key] =  sqrt(array_sum(array_column(array_column($data_latih, 'standar_deviasi_pupuk_urea'), $key)) / ($kelompok['jumlah_data'] - 1));
            $data_standar_deviasi['standar_deviasi_pupuk_npk'][$key] =  sqrt(array_sum(array_column(array_column($data_latih, 'standar_deviasi_pupuk_npk'), $key)) / ($kelompok['jumlah_data'] - 1));
        }

        $hasils = [];

        foreach ($data_uji as $uji) {
            // Hitung Probabilitas Data Uji
            $data_probabilitas = [];
            foreach ($data_kelompok as $key => $value) {
                $data_probabilitas[$key] = (1 / sqrt(2 * M_PI) * $data_standar_deviasi['standar_deviasi_cuaca'][$key] * (exp((pow(- ((float) Helper::cuacaToValue($uji['cuaca']) - $data_probabilitas_mean[$key]['mean_cuaca']), 2) / (2 * pow($data_standar_deviasi['standar_deviasi_cuaca'][$key], 2))))))
                    * (1 / sqrt(2 * M_PI) * $data_standar_deviasi['standar_deviasi_luas_lahan'][$key] * (exp((pow(- ($uji['luas_lahan'] - $data_probabilitas_mean[$key]['mean_luas_lahan']), 2) / (2 * pow($data_standar_deviasi['standar_deviasi_luas_lahan'][$key], 2))))))
                    * (1 / sqrt(2 * M_PI) * $data_standar_deviasi['standar_deviasi_pupuk_urea'][$key] * (exp((pow(- ($uji['pupuk_urea'] - $data_probabilitas_mean[$key]['mean_pupuk_urea']), 2) / (2 * pow($data_standar_deviasi['standar_deviasi_pupuk_urea'][$key], 2))))))
                    * (1 / sqrt(2 * M_PI) * $data_standar_deviasi['standar_deviasi_pupuk_npk'][$key] * (exp((pow(- ($uji['pupuk_npk'] - $data_probabilitas_mean[$key]['mean_pupuk_npk']), 2) / (2 * pow($data_standar_deviasi['standar_deviasi_pupuk_npk'][$key], 2))))))
                    * $data_probabilitas_mean[$key]['probabilitas'];
            }

            // Hitung Hasil Data Uji
            $hasil = ['komoditas' => '', 'probabilitas' => 0, 'cuaca' => $uji['cuaca'], 'luas_lahan' => $uji['luas_lahan'], 'pupuk_urea' => $uji['pupuk_urea'], 'pupuk_npk' => $uji['pupuk_npk']];
            foreach ($data_probabilitas as $key => $value) {
                if ($value > $hasil['probabilitas']) {
                    $hasil['komoditas'] = $key;
                    $hasil['probabilitas'] = $value;
                    $hasil['standar_deviasi_cuaca'][$key] = $data_standar_deviasi['standar_deviasi_cuaca'][$key];
                    $hasil['standar_deviasi_luas_lahan'][$key] = $data_standar_deviasi['standar_deviasi_luas_lahan'][$key];
                    $hasil['standar_deviasi_pupuk_urea'][$key] = $data_standar_deviasi['standar_deviasi_pupuk_urea'][$key];
                    $hasil['standar_deviasi_pupuk_npk'][$key] = $data_standar_deviasi['standar_deviasi_pupuk_npk'][$key];
                }
            }
            $hasils[] = $hasil;
        }

        return $hasils;
    }

    public function akurasi()
    {
        $data_uji = DataLatih::all();
        $hasil = $this->naivebayes($data_uji);

        $sama = 0;
        $tidak_sama = 0;
        foreach ($hasil as $key => $value) {
            if ($value['komoditas'] == $data_uji[$key]->komoditas) {
                $sama++;
            } else {
                $tidak_sama++;
            }
        }


        $akhir = [
            'sama' => $sama,
            'tidak_sama' => $tidak_sama,
            'akurasi' => $sama / count($hasil) * 100
        ];

        return $akhir;
    }

    public function index_perhitungan()
    {
        try {
            $title = 'perhitungan';

            return view('admin.perhitungan.index', compact('title'));
        } catch (\Exception $e) {
            return $this->_error($e);
        }
    }

    public function data_perhitungan(Request $request)
    {
        try {
            $title = 'perhitungan';

            $perPage = $request->jml == '' ? 5 : $request->jml;
            $page = $request->page == '' ? 1 : $request->page;
            $perPage2 = $request->jml2 == '' ? 5 : $request->jml2;
            $page2 = $request->page2 == '' ? 1 : $request->page2;

            // Data Latih
            $data_latih = DataLatih::all();

            $data_uji = $data_latih;

            $jumlahData = count($data_latih);

            // Kelompokkan Data Latih Berdasarkan Komoditas
            $data_kelompok = [];
            foreach ($data_latih as $key => $value) {
                // Jumlah Data
                $data_kelompok[$value->komoditas]['jumlah_data'] = isset($data_kelompok[$value->komoditas]['jumlah_data']) ? $data_kelompok[$value->komoditas]['jumlah_data'] + 1 : 1;

                $value->cuaca = (float) Helper::cuacaToValue($value->cuaca);

                // Sum Data
                $data_kelompok[$value->komoditas]['sum_cuaca'] = isset($data_kelompok[$value->komoditas]['sum_cuaca']) ? $data_kelompok[$value->komoditas]['sum_cuaca'] + $value->cuaca : $value->cuaca;
                $data_kelompok[$value->komoditas]['sum_luas_lahan'] = isset($data_kelompok[$value->komoditas]['sum_luas_lahan']) ? $data_kelompok[$value->komoditas]['sum_luas_lahan'] + $value->luas_lahan : $value->luas_lahan;
                $data_kelompok[$value->komoditas]['sum_pupuk_urea'] = isset($data_kelompok[$value->komoditas]['sum_pupuk_urea']) ? $data_kelompok[$value->komoditas]['sum_pupuk_urea'] + $value->pupuk_urea : $value->pupuk_urea;
                $data_kelompok[$value->komoditas]['sum_pupuk_npk'] = isset($data_kelompok[$value->komoditas]['sum_pupuk_npk']) ? $data_kelompok[$value->komoditas]['sum_pupuk_npk'] + $value->pupuk_npk : $value->pupuk_npk;
            }


            // Hitung Probabilitas dan Mean
            $data_probabilitas_mean = [];
            foreach ($data_kelompok as $key => $value) {
                // Probabilitas
                $data_probabilitas_mean[$key]['probabilitas'] = $value['jumlah_data'] / $jumlahData;

                // Mean
                $data_probabilitas_mean[$key]['mean_cuaca'] = $value['sum_cuaca'] / $value['jumlah_data'];
                $data_probabilitas_mean[$key]['mean_luas_lahan'] = $value['sum_luas_lahan'] / $value['jumlah_data'];
                $data_probabilitas_mean[$key]['mean_pupuk_urea'] = $value['sum_pupuk_urea'] / $value['jumlah_data'];
                $data_probabilitas_mean[$key]['mean_pupuk_npk'] = $value['sum_pupuk_npk'] / $value['jumlah_data'];
            }

            $data_latih = $data_latih->toArray();
            // Standar Deviasi
            foreach ($data_latih as $i => $latih) {
                foreach ($data_kelompok as $key => $value) {
                    if ($latih['komoditas'] == $key) {
                        $data_latih[$i]['standar_deviasi_cuaca'][$key] = pow((float) Helper::cuacaToValue($latih['cuaca']) - $data_probabilitas_mean[$key]['mean_cuaca'], 2);
                        $data_latih[$i]['standar_deviasi_luas_lahan'][$key] = pow($latih['luas_lahan'] - $data_probabilitas_mean[$key]['mean_luas_lahan'], 2);
                        $data_latih[$i]['standar_deviasi_pupuk_urea'][$key] = pow($latih['pupuk_urea'] - $data_probabilitas_mean[$key]['mean_pupuk_urea'], 2);
                        $data_latih[$i]['standar_deviasi_pupuk_npk'][$key] = pow($latih['pupuk_npk'] - $data_probabilitas_mean[$key]['mean_pupuk_npk'], 2);
                    } else {
                        $data_latih[$i]['standar_deviasi_cuaca'][$key] = 0;
                        $data_latih[$i]['standar_deviasi_luas_lahan'][$key] = 0;
                        $data_latih[$i]['standar_deviasi_pupuk_urea'][$key] = 0;
                        $data_latih[$i]['standar_deviasi_pupuk_npk'][$key] = 0;
                    }
                }
            }

            $data_standar_deviasi = [];
            foreach ($data_kelompok as $key => $kelompok) {
                $data_standar_deviasi['standar_deviasi_cuaca'][$key] = sqrt(array_sum(array_column(array_column($data_latih, 'standar_deviasi_cuaca'), $key)) / ($kelompok['jumlah_data'] - 1));
                $data_standar_deviasi['standar_deviasi_luas_lahan'][$key] = sqrt(array_sum(array_column(array_column($data_latih, 'standar_deviasi_luas_lahan'), $key)) / ($kelompok['jumlah_data'] - 1));
                $data_standar_deviasi['standar_deviasi_pupuk_urea'][$key] =  sqrt(array_sum(array_column(array_column($data_latih, 'standar_deviasi_pupuk_urea'), $key)) / ($kelompok['jumlah_data'] - 1));
                $data_standar_deviasi['standar_deviasi_pupuk_npk'][$key] =  sqrt(array_sum(array_column(array_column($data_latih, 'standar_deviasi_pupuk_npk'), $key)) / ($kelompok['jumlah_data'] - 1));
            }

            $hasils = [];

            foreach ($data_uji as $uji) {
                // Hitung Probabilitas Data Uji
                $data_probabilitas = [];
                foreach ($data_kelompok as $key => $value) {
                    $data_probabilitas[$key] = (1 / sqrt(2 * M_PI) * $data_standar_deviasi['standar_deviasi_cuaca'][$key] * (exp((pow(- ((float) Helper::cuacaToValue($uji['cuaca']) - $data_probabilitas_mean[$key]['mean_cuaca']), 2) / (2 * pow($data_standar_deviasi['standar_deviasi_cuaca'][$key], 2))))))
                        * (1 / sqrt(2 * M_PI) * $data_standar_deviasi['standar_deviasi_luas_lahan'][$key] * (exp((pow(- ($uji['luas_lahan'] - $data_probabilitas_mean[$key]['mean_luas_lahan']), 2) / (2 * pow($data_standar_deviasi['standar_deviasi_luas_lahan'][$key], 2))))))
                        * (1 / sqrt(2 * M_PI) * $data_standar_deviasi['standar_deviasi_pupuk_urea'][$key] * (exp((pow(- ($uji['pupuk_urea'] - $data_probabilitas_mean[$key]['mean_pupuk_urea']), 2) / (2 * pow($data_standar_deviasi['standar_deviasi_pupuk_urea'][$key], 2))))))
                        * (1 / sqrt(2 * M_PI) * $data_standar_deviasi['standar_deviasi_pupuk_npk'][$key] * (exp((pow(- ($uji['pupuk_npk'] - $data_probabilitas_mean[$key]['mean_pupuk_npk']), 2) / (2 * pow($data_standar_deviasi['standar_deviasi_pupuk_npk'][$key], 2))))))
                        * $data_probabilitas_mean[$key]['probabilitas'];
                }

                // Hitung Hasil Data Uji
                $hasil = ['komoditas' => '', 'probabilitas' => 0, 'cuaca' => $uji['cuaca'], 'luas_lahan' => $uji['luas_lahan'], 'pupuk_urea' => $uji['pupuk_urea'], 'pupuk_npk' => $uji['pupuk_npk']];
                foreach ($data_probabilitas as $key => $value) {
                    if ($value > $hasil['probabilitas']) {
                        $hasil['komoditas_old'] = $uji['komoditas'];
                        $hasil['komoditas'] = $key;
                        $hasil['probabilitas'] = $value;
                        $hasil['standar_deviasi_cuaca'][$key] = $data_standar_deviasi['standar_deviasi_cuaca'][$key];
                        $hasil['standar_deviasi_luas_lahan'][$key] = $data_standar_deviasi['standar_deviasi_luas_lahan'][$key];
                        $hasil['standar_deviasi_pupuk_urea'][$key] = $data_standar_deviasi['standar_deviasi_pupuk_urea'][$key];
                        $hasil['standar_deviasi_pupuk_npk'][$key] = $data_standar_deviasi['standar_deviasi_pupuk_npk'][$key];
                    }
                }
                $hasils[] = $hasil;
            }

            $sama = 0;
            $tidak_sama = 0;

            $data_uji = $data_uji->toArray();
            foreach ($hasils as $key => $value) {
                if ($value['komoditas'] == $data_uji[$key]['komoditas']) {
                    $sama++;
                } else {
                    $tidak_sama++;
                }
            }

            $akhir = [
                'sama' => $sama,
                'tidak_sama' => $tidak_sama,
                'akurasi' => $sama / count($hasils) * 100
            ];


            // Pagination Data
            $data_latih_old = collect($data_latih);
            $data_latih = collect($data_latih)->forPage($page, $perPage)->toArray();

            $hasil_latih_old = collect($hasils);
            $hasils = collect($hasils)->forPage($page2, $perPage2)->toArray();

            $view = view('admin.perhitungan.data', compact('data_kelompok'))->with('key', (array_keys($data_kelompok)))->render();
            $view1 = view('admin.perhitungan.data1', compact('data_probabilitas_mean'))->with('key', (array_keys($data_probabilitas_mean)))->render();
            $view2 = view('admin.perhitungan.data2', compact('data_latih'))->with('j', (($page - 1) * $perPage))->render();
            $view3 = view('admin.perhitungan.data3', compact('data_standar_deviasi'))->with(['key' => (array_keys($data_probabilitas_mean)), 'key2' => array_keys($data_standar_deviasi)])->render();
            $view4 = view('admin.perhitungan.data4', compact('hasils'))->with('j', (($page2 - 1) * $perPage2))->render();
            $view5 = view('admin.perhitungan.data5', compact('akhir'))->render();

            return response()->json([
                "html_1"       => $view,
                "html_2"       => $view1,
                "html_3"       => $view2,
                "html_4"       => $view3,
                "html_5"       => $view4,
                "html_6"       => $view5,
                "total_page_1"  => ceil(count($data_latih_old) / $perPage),
                "total_data_1" =>  count($data_latih_old),
                "total_page_2"  => ceil(count($hasil_latih_old) / $perPage2),
                "total_data_2" =>  count($hasil_latih_old),
            ]);
        } catch (\Exception $e) {
            return $this->_error($e);
        }
    }
}
