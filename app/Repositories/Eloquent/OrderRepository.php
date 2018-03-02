<?php
namespace App\Repositories\Eloquent;

use App\Models\Order;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Contracts\OrderRepositoryInterface;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function getModel()
    {
        return Order::class;
    }

    public function getNewOrders()
    {
        return $this->model->where('status', config('setting.waiting_for_process'))->orderBy('created_at', 'desc')->paginate();
    }
}
