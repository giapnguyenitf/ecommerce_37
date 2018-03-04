<?php

namespace App\Http\Controllers;

use Session;
use Response;
use Illuminate\Http\Request;
use App\Http\Requests\AddCartRequest;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ShoppingCartController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function show()
    {
        if (Session::has('shopping-cart')) {
            $data = Session::get('shopping-cart');
            $carts = collect();
            foreach ($data as $key => $item) {
                $cart = $this->productRepository->where('id', $item['product_id'])->with('colorProducts')->get();
                $cart->put('color_id', $item['color_id']);
                $cart->put('quantity', $item['quantity']);
                $cart->put('total', $cart->first()->last_price * $item['quantity']);
                $cart->put('session_id', $key);
                $carts->push($cart);
            }

            return view('cart', compact('carts'));
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
            Session::forget('shopping-cart.' . $data['session_id']);
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
            Session::forget('shopping-cart.' . $data['session_id']);
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
}
