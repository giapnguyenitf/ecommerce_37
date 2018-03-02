<?php
namespace App\Repositories\Contracts;

use App\Repositories\Contracts\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function getHotProducts($number);

    public function getTopSeller($number);

    public function getTopNew($number);

    public function getDetailProduct($id);

    public function getRecentlyViewedProducts($array);

    public function findByName($name);
}
