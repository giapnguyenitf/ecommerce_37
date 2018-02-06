<?php
namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    public function all($columns = ['*']);

    public function find($id, $column = ['*']);

    public function paginate($limit = null, $column = ['*']);

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function delete($id);

    public function findByField($field, $value);

    public function get($columns = ['*']);

    public function with($relations);

    public function where($column, $operator, $condition);
}
