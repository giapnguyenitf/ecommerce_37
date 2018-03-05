<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Response;
use Illuminate\Http\Request;
use App\Http\Requests\AddCartRequest;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\OrderDetailRepositoryInterface;


class ShoppingCartController extends Controller
{
    protected $productRepository;
    protected $orderRepository;
    protected $orderDetailRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        OrderRepositoryInterface $orderRepository,
        OrderDetailRepositoryInterface $orderDetailRepository
    ) {
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;

    }

    public function show()
    {
        if (Session::has('shopping-cart')) {
            $shopping_cart = Session::get('shopping-cart');
            $data = $this->getTotalMoney($shopping_cart);
            $carts = $data['carts'];
            $total_money = $data['total_money'];

            return view('cart', compact('carts', 'total_money'));
        }

        return view('cart');
    }

    public function addCart(AddCartRequest $request)
    {
        if ($request->ajax()) {
            $data = $request->only([
                'product_id',
                'quantity',
                'color_id',
            ]);
            Session::push('shopping-cart', $data);

            return Response::json([
                'status' => 200,
            ]);
        }

        return Response::json([
                'status' => 404,
        ]);
    }

    public function removeCart(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->only([
                'session_key',
            ]);
            Session::forget('shopping-cart.'.$data['session_key']);
            $shopping_cart = Session::get('shopping-cart');

            return Response::json($shopping_cart);
        }

        return Response::json([
                'status' => 404,
        ]);
    }

    public function changeQuantity(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->only([
                'session_id',
                'quantity',
            ]);
            $shopping_cart = Session::get('shopping-cart');
            $cart = $shopping_cart[$data['session_id']];
            $cart['quantity'] = $data['quantity'];
            Session::forget('shopping-cart.'.$data['session_id']);
            Session::push('shopping-cart', $cart);

            return Response::json([
                'status' => 200,
            ]);
        }

        return Response::json([
                'status' => 404,
        ]);
    }

    public function changeColor(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->only([
                'session_id',
                'color_id',
            ]);
            $shopping_cart = Session::get('shopping-cart');
            $cart = $shopping_cart[$data['session_id']];
            $cart['color_id'] = $data['color_id'];
            Session::forget('shopping-cart.'.$data['session_id']);
            Session::push('shopping-cart', $cart);
            $new_session_id = Session::get('shopping-cart');

            return Response::json([
                'status' => 200,
            ]);
        }

        return Response::json([
                'status' => 404,
        ]);
    }

    public function order()
    {
        try
        {
            if (Session::has('shopping-cart')) {
                $shopping_cart = Session::get('shopping-cart');
                $user_id = Auth::user()->id;
                $order = $this->createOrder($user_id, $shopping_cart);
                $order_detail = $this->createOrderDetail($order, $shopping_cart);
                Session::forget('shopping-cart');
            }
            Session::flash('add_order_success', trans('label.add_order_success'));
        } catch(Exception $e) {
            Session::flash('add_order_fail', trans('label.add_order_fail'));
        }

        return redirect()->route('user.listOrder');
    }

    public function getTotalMoney($shopping_cart)
    {   $data = $shopping_cart;
        $carts = collect();
        $total_money = 0;
        foreach ($data as $key => $item) {
            $cart = $this->productRepository->where('id', '=', $item['product_id'])->with('colorProducts')->get();
            $cart->put('color_id', $item['color_id']);
            $cart->put('quantity', $item['quantity']);
            $cart->put('total', $cart->first()->last_price * $item['quantity']);
            $cart->put('session_id', $key);
            $carts->push($cart);
            $total_money += $cart->first()->last_price * $item['quantity'];
        }

        return ['total_money' => $total_money, 'carts' => $carts];
    }

    public function createOrder($user_id, $shopping_cart)
    {
        $order['user_id'] = $user_id;
        $total = 0;
        foreach ($shopping_cart as $cart) {
            $order['product_id'] = $cart['product_id'];
            $order['number'] = $cart['quantity'];
            $order['color_id'] = $cart['color_id'];
            $product = $this->productRepository->where('id', '=', $cart['product_id'])->with('colorProducts')->get()->first();
            $total += $product->last_price * $cart['quantity'];
            $order['total_money'] = $total;
            $order['payment_id'] = Session::get('payment-method');
        }
        $order = $this->orderRepository->create($order);

        return $order;
    }

    public function createOrderDetail($order, $shopping_cart)
    {
        $order_details = [];
        foreach ($shopping_cart as $cart) {
            $order_detail['order_id'] = $order->id;
            $order_detail['product_id'] = $cart['product_id'];
            $order_detail['color_id'] = $cart['color_id'];
            $order_detail['quantity'] = $cart['quantity'];
            array_push($order_details, $order_detail);
        }
        $this->orderRepository->createByRelationship('orderDetails', ['model' => $order, 'attribute' => $order_details], true);
    }
}
