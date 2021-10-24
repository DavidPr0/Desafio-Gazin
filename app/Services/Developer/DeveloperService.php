<?php


namespace App\Services\Developer;


use App\Exceptions\NotFoundDeveloperException;
use App\Models\Developer;

class DeveloperService
{
    private $repository;

    public function __construct(Developer $repository)
    {
        $this->repository = $repository;
    }

    public function all(array $filters = [])
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

    public function find(int $id): Developer
    {
        $developer = $this->repository->find($id);

        throw_unless($developer, NotFoundDeveloperException::class);

        return $developer;
    }

    public function create(array $attributes): Developer
    {
        return $this->repository->create($attributes);
    }

    public function update(array $attributes, int $id): Developer
    {
        $developer = $this->find($id);

        $developer->update($attributes);

        return $developer->fresh();
    }

    public function delete(int $id): bool
    {
        $developer = $this->find($id);

        return $developer->delete();
    }
}
