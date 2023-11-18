<?php

namespace App\Services;

use App\Models\Bantuan;
use App\Services\BaseRepository;
use App\Services\Contracts\BantuanContract;
use App\Traits\Uploadable;

class BantuanService extends BaseRepository implements BantuanContract
{
    use Uploadable;
    /**
     * @var
     */
    protected $model;
    protected $image_path = 'uploads/bantuan';

    public function __construct(Bantuan $model)
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
}
