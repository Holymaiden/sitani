<?php

namespace App\Services\Contracts;

interface DataLatihContract
{
        public function paginated(array $request);

        public function store(array $request);

        public function find($id);

        public function update(array $data, $id);

        public function delete($id);
}
