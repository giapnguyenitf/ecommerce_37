<?php
namespace App\Repositories\Eloquent;

use App\Models\ColorProduct;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Contracts\ColorProductRepositoryInterface;

class ColorProductRepository extends BaseRepository implements ColorProductRepositoryInterface
{
    public function getModel()
    {
        return ColorProduct::class;
    }

    public function isExistColor($product_id, $color_id)
    {
        return $this->model
            ->where('product_id', $product_id)
            ->where('color_id', $color_id)
            ->count();
    }

    public function getDetailColorProduct($id)
    {
        return $this->model->where('id', $id)->with('images')->get()->first();
    }
}
