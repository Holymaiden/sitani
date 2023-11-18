<?php

namespace App\Services;

use App\Models\DataLatih;
use App\Services\BaseRepository;
use App\Services\Contracts\DataLatihContract;


class DataLatihService extends BaseRepository implements DataLatihContract
{
    /**
     * @var
     */
    protected $model;

    public function __construct(DataLatih $model)
    {
        $this->model = $model->whereNotNull('id');
    }

    public function paginated(array $criteria)
    {
        $perPage = $criteria['jml'] ?? 5;
        $search = $criteria['cari'] ?? '';
        return $this->model->when($search, function ($query) use ($search) {
            $query->where('cuaca', 'like', "%{$search}%")
                ->orWhere("komoditas", "like", "%{$search}%");
        })
            ->orderBy('id', 'desc')
            ->paginate($perPage);
    }
}
