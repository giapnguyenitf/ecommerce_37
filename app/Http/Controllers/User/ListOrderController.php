<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\OrderDetailRepositoryInterface;

class ListOrderController extends Controller
{
    protected $orderRepository;
    protected $orderDetailRepository;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        OrderDetailRepositoryInterface $orderDetailRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
    }

    public function index()
    {
        $orders = $this->orderDetailRepository->paginate();

        return view('user.listOrder', compact('orders'));
    }
}
