<?php

namespace App\Http\Controllers\Admin;

use Response;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\RatingRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\OrderDetailRepositoryInterface;

class StatisticController extends Controller
{
    protected $userRepository;
    protected $orderRepository;
    protected $ratingRepository;
    protected $productRepository;
    protected $orderDetailRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        OrderRepositoryInterface $orderRepository,
        RatingRepositoryInterface $ratingRepository,
        ProductRepositoryInterface $productRepository,
        OrderDetailRepositoryInterface $orderDetailRepository
    ) {
        $this->userRepository = $userRepository;
        $this->orderRepository = $orderRepository;
        $this->ratingRepository = $ratingRepository;
        $this->productRepository = $productRepository;
        $this->orderDetailRepository = $orderDetailRepository;
    }

    public function index()
    {
        $number_user = $this->userRepository->all()->count();
        $number_rating = $this->ratingRepository->all()->count();
        $number_product = $this->productRepository->all()->count();
        $number_new_order = $this->orderRepository->where('status', config('setting.waiting_for_process'))->get()->count();

        return view('admin.statistic', compact('number_user', 'number_new_order', 'number_product', 'number_rating'));
    }

    public function statisticOrder()
    {
        $range = Carbon::now()->subDays(30);
        $order_statistic = $this->orderDetailRepository->statisticOrder($range);

        return Response::json($order_statistic);
    }
}
