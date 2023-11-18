<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bantuan;
use App\Models\JadwalPenyuluhan;
use App\Models\Kelompok;
use App\Models\Panen;
use App\Models\Saran;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $response, $title;

    public function __construct()
    {
        $this->title = 'home';
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
            $kelompok = Kelompok::limit(7)->get();
            $panen = Panen::limit(4)->get();
            return view('user.' . $title . '.index', compact('title', 'kelompok', 'panen'));
        } catch (\Exception $e) {
            return $this->_error($e);
        }
    }

    public function kelompok_tani()
    {
        try {
            $title = $this->title;
            $kelompok = Kelompok::paginate(6);
            return view('user.kelompok-tani.index', compact('title', 'kelompok'));
        } catch (\Exception $e) {
            return $this->_error($e);
        }
    }

    public function bantuan()
    {
        try {
            $title = $this->title;
            $bantuan = Bantuan::paginate(6);
            return view('user.bantuan.index', compact('title', 'bantuan'));
        } catch (\Exception $e) {
            return $this->_error($e);
        }
    }

    public function panen()
    {
        try {
            $title = $this->title;
            $panen = Panen::paginate(6);
            return view('user.panen.index', compact('title', 'panen'));
        } catch (\Exception $e) {
            return $this->_error($e);
        }
    }

    public function jadwal_penyuluhan()
    {
        try {
            $title = $this->title;
            $jadwal = JadwalPenyuluhan::paginate(6);
            return view('user.jadwal-penyuluhan.index', compact('title', 'jadwal'));
        } catch (\Exception $e) {
            return $this->_error($e);
        }
    }

    public function kritik_saran()
    {
        try {
            $title = $this->title;
            return view('user.kritik-saran.index', compact('title'));
        } catch (\Exception $e) {
            return $this->_error($e);
        }
    }

    public function kritik_saran_store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'isi' => 'required',
                'hp' => 'required',
                'desa_id' => 'required',
            ]);
            $data = $request->all();
            $create = Saran::create($data);

            return redirect()->back()->with('success', 'Kritik dan Saran berhasil dikirim');
        } catch (\Exception $e) {
            return $this->_error($e);
        }
    }
}
