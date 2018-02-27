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
        return $this->orderBy('discount', 'desc')->take($number)->get();
    }

    public function getTopSeller($number)
    {
        return $this->with('colorProducts')->get()->sortByDesc('colorProducts.sold')->take($number);
    }

    public function getTopNew($number)
    {
        return $this->orderBy('created_at', 'desc')->take($number)->get();
    }

    public function getDetailProduct($id)
    {
        return $this->where('id', '=', $id)->with('colorProducts')->get()->first();
    }

    public function getRecentlyViewedProducts($array)
    {
        return $this->whereIn('id', $array)->get();
    }
}
