<?php

namespace App\Services;

use App\Models\Saran;
use App\Services\BaseRepository;
use App\Services\Contracts\SaranContract;


class SaranService extends BaseRepository implements SaranContract
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Saran $model)
    {
        $this->model = $model->whereNotNull('id');
    }

    public function paginated(array $criteria)
    {
        $perPage = $criteria['jml'] ?? 5;
        $search = $criteria['cari'] ?? '';
        return $this->model->when($search, function ($query) use ($search) {
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere("status", "like", "%{$search}%")
                ->orWhere("jenis_kelamin", "like", "%{$search}%")
                ->orWhere("no_tlp", "like", "%{$search}%")
                ->orWhere("alamat", "like", "%{$search}%");
        })
            ->orderBy('id', 'desc')
            ->paginate($perPage);
    }
}
