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

    public function find($id, $columns = ['*'])
    {
        return $this->model->find($id);
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = $limit ? config('setting.paginate') : $limit;
        $model = $this->model->paginate($limit, $columns);
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
}
?>
