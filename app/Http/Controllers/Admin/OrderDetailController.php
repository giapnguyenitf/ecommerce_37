<?php

namespace App\Http\Controllers\Admin;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\OrderDetailRepositoryInterface;

class OrderDetailController extends Controller
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

    public function updateOrderStatus($id, $status)
    {
        $orderDetail = $this->orderDetailRepository->findOrFail($id);
        $orderAccept = $orderDetail->toArray();
        $orderAccept['status'] = $status;
        $this->orderDetailRepository->update($id, $orderAccept);
    }

    public function deliveringOrder($id)
    {
        try
        {
            $this->updateOrderStatus($id, config('setting.delivering'));
            Session::flash('order_status_changed', trans('label.order_status_changed'));
        } catch(Exception $e) {
            Session::flash('order_not_found', trans('label.order_not_found'));
        }

        return back();
    }

    public function cancelOrder($id)
    {
        try
        {
            $this->updateOrderStatus($id, config('setting.cancel'));
            Session::flash('order_status_changed', trans('label.order_status_changed'));
        } catch(Exception $e) {
            Session::flash('order_not_found', trans('label.order_not_found'));
        }

        return back();
    }

    public function doneOrder($id)
    {
        try
        {
            $this->updateOrderStatus($id, config('setting.done'));
            Session::flash('order_status_changed', trans('label.order_status_changed'));
        } catch(Exception $e) {
            Session::flash('order_not_found', trans('label.order_not_found'));
        }

        return back();
    }

    public function showOrderDelivering()
    {
        $ordersDelivering = $this->orderDetailRepository->where('status', config('setting.delivering'))->get();

        return view('admin.orderDelivering', compact('ordersDelivering'));
    }

    public function showNewOrder()
    {
        $newOrders = $this->orderDetailRepository->where('status', config('setting.waiting_for_process'))->get();

        return view('admin.newOrders', compact('newOrders'));
    }

    public function showDoneOrder()
    {
        $doneOrders = $this->orderDetailRepository->where('status', config('setting.done'))->get();

        return view('admin.doneOrders', compact('doneOrders'));
    }

    public function showCancelledOrder()
    {

        $cancelledOrders = $this->orderDetailRepository->where('status', config('setting.cancel'))->get();

        return view('admin.cancelledOrder', compact('cancelledOrders'));
    }
}
