<?php

namespace App\Services;

use App\Models\Lahan;
use App\Services\BaseRepository;
use App\Services\Contracts\LahanContract;


class LahanService extends BaseRepository implements LahanContract
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Lahan $model)
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
