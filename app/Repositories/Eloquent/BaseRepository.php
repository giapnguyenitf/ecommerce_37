<?php
namespace App\Repositories\Eloquent;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container;
use App\Repositories\Contracts\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    protected $app;

    protected $model;

    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    abstract public function getModel();

    public function makeModel()
    {
        $model = $this->app->make($this->getModel());
        if (!$model instanceof Model) {
            throw new Exception('Class ' . $this->model() . ' must be an instance of Illuminate\Database\Eloquent\Model');
        }

        return $this->model = $model;
    }

    public function all($columns = ['*'])
    {
        return $this->model->all($columns);
    }

    public function findOrFail($id, $columns = ['*'])
    {
        return $this->model->findOrFail($id);
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $perPage = $limit ? $limit : config('setting.paginate');
        $model = $this->model->paginate($perPage, $columns);
        $this->makeModel();

        return $model;
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);;
    }

    public function update($id, array $attributes)
    {
        return $this->model->where('id', $id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->model-$columns = ['*']>destroy($id);
    }

    public function findByField($field, $value)
    {
        $model = $this->model->where($field, '=', $value);

        return $model;
    }

    public function get($columns = ['*'])
    {
        $model = $this->model->get($columns);
        $this->makeModel();

        return $model;
    }

    public function with($relations)
    {
        $this->model = $this->model->with($relations);

        return $this;
    }

    public function where($column, $operator, $condition)
    {
        $this->model = $this->model->where($column, $operator, $condition);

        return $this;
    }

    public function orderBy($column, $sortBy)
    {
        $this->model = $this->model->orderBy($column, $sortBy);

        return $this;
    }

    public function count()
    {
        return $this->model->count();
    }

    public function take($number)
    {
        $this->model = $this->model->take($number);

        return $this;
    }

    public function createMany($array)
    {
        return $this->model->createMany($array);
    }

    public function __call($method, $args)
    {
        $model = $this->model;
        if ($method == head($args)) {
            $this->model = call_user_func_array([$model, $method], array_diff($args, [head($args)]));
            return $this;
        }
        if (!$model instanceof Model) {
            $model = $model->first();
            if (!$model) {
                throw new ModelNotFoundException();
            }
        }
        $this->model = call_user_func_array([$model, $method], $args);

        return $this;
    }

    public function createByRelationship($method, $inputs, $option = false)
    {
        $inputs = is_array($inputs) ? $inputs : [$inputs];
        if (!empty($inputs['model'])) {
            $this->model = $inputs['model'];
            $inputs = array_except($inputs, ['model']);
        }
        if (empty($inputs['attribute'])) {
            throw new Exception('No input field to create model');
        }
        $this->__call($method, []);
        return !$option
            ? $this->model->create($inputs['attribute'])
            : $this->model->createMany($inputs['attribute']);
    }
}
