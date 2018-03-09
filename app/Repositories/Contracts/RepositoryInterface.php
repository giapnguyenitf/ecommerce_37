<?php
namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    public function all($columns = ['*']);

    public function findOrFail($id, $column = ['*']);

    public function paginate($limit = null, $column = ['*']);

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function destroy($id);

    public function findByField($field, $value);

    public function get($columns = ['*']);

    public function with($relations);

    public function where($column, $operator, $condition);

    public function orderBy($column, $keyword);

    public function count();

    public function take($number);

    public function createMany($array);

    public function createByRelationship($method, $inputs, $option = false);

    public function whereIn($column, $values);

    public function delete();

}
