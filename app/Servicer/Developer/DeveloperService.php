<?php


namespace App\Servicer\Developer;


use App\Models\Developer;

class DeveloperService
{
    private $repository;

    public function __construct(Developer $repository)
    {
        $this->repository = $repository;
    }

    public function find(array $filters = [])
    {
        $query = $this->repository;
        $searchLike = ['name', 'hobby'];
        foreach ($filters as $key => $filter) {
            if (in_array($key, $searchLike)) {
                $query = $query->where($key, 'like','%' . $filter . '%');
                continue;
            }
            $query = $query->where($key, '=', $filter);
        }
        return $query;
    }

    public function create(array $attributes): Developer
    {
        return $this->repository->create($attributes);
    }

    public function update(array $attributes, int $id): bool
    {
        $developer = $this->repository->findOrFail($id);

        return $developer->update($attributes);
    }

    public function delete(int $id): bool
    {
        $developer = $this->repository->findOrFail($id);

        return $developer->delete();
    }
}
