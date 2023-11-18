<?php

namespace App\Services;

use App\Models\Panen;
use App\Services\BaseRepository;
use App\Services\Contracts\PanenContract;
use App\Traits\Uploadable;
use Illuminate\Database\Eloquent\Model;

class PanenService extends BaseRepository implements PanenContract
{
    use Uploadable;
    /**
     * @var
     */
    protected $model;
    protected $image_path = 'uploads/panen';

    public function __construct(Panen $model)
    {
        $this->model = $model->whereNotNull('id');
    }

    public function paginated(array $criteria)
    {
        $perPage = $criteria['jml'] ?? 5;
        $search = $criteria['cari'] ?? '';
        return $this->model->when($search, function ($query) use ($search) {
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere("keterangan", "like", "%{$search}%");
        })
            ->orderBy('id', 'desc')
            ->paginate($perPage);
    }

    public function imageUpload($request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $image_name = pathinfo($image, PATHINFO_FILENAME);
            $image_name = $this->uploadFile($request->file('image'), $this->image_path, '');
            return $image_name;
        }
        return "";
    }

    public function updateImage($request, $id)
    {
        $dataOld = $request->all();
        if ($request->hasFile('image')) {
            $this->deleteFile($dataOld['image_old'], $this->image_path);
            $image = $request->file('image')->getClientOriginalName();
            $image_name = pathinfo($image, PATHINFO_FILENAME);
            $image_name = $this->uploadFile($request->file('image'), $this->image_path, '');
            return $image_name;
        }
        return $dataOld['image_old'];
    }

    public function find($id): Model
    {
        return $this->model->with('lahanAnggota')->with('masukBantuan')->findOrFail($id);
    }
}
