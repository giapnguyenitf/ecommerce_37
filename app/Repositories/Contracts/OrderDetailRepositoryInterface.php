<?php
namespace App\Repositories\Contracts;

use App\Repositories\Contracts\RepositoryInterface;

interface OrderDetailRepositoryInterface extends RepositoryInterface
{
    public function deleteOrderDetail($order_id);

    public function statisticOrder($range);
}
