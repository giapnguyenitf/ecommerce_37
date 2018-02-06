<?php
namespace App\Repositories\Contracts;

use App\Repositories\Contracts\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function getHotProducts($number);
}
