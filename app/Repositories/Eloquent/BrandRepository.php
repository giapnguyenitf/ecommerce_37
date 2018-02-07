<?php
namespace App\Repositories\Eloquent;

use App\Models\Brand;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Contracts\BrandRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;

class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{
    public function getModel()
    {
        return Brand::class;
    }
}
