<?php
namespace App\Repositories\Eloquent;

use App\Models\OrderDetail;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Contracts\OrderDetailRepositoryInterface;

class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface
{
    public function getModel()
    {
        return OrderDetail::class;
    }

    public function deleteOrderDetail($order_id)
    {
        return $this->model->where('order_id', $order_id)->delete();
    }
}
