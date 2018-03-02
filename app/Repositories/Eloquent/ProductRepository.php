<?php
namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function getModel()
    {
        return Product::class;
    }

    public function getHotProducts($number)
    {
        return $this->model->orderBy('discount', 'desc')->take($number)->get();
    }

    public function getTopSeller($number)
    {
        return $this->model->with('colorProducts')->get()->sortByDesc('colorProducts.sold')->take($number);
    }

    public function getTopNew($number)
    {
        return $this->model->orderBy('created_at', 'desc')->take($number)->get();
    }

    public function getDetailProduct($id)
    {
        return $this->model->where('id', '=', $id)->with('colorProducts')->get()->first();
    }

    public function getRecentlyViewedProducts($array)
    {
        return $this->model->whereIn('id', $array)->get();
    }

    public function findByName($name)
    {
        return $this->model->where('name', 'like', '%'.$name.'%')->get();
    }
}
