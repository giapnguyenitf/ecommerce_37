<?php
namespace App\Repositories\Contracts;

use App\Repositories\Contracts\RepositoryInterface;

interface ColorProductRepositoryInterface extends RepositoryInterface
{
    public function isExistColor($product_id, $color_id);
}
