<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\ProductRepository;

class HomeController extends Controller
{
    protected $productRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->all();
        $hotProducts = $this->productRepository->getHotProducts(config('setting.get_4_product_discount'));

        return view('home', compact('products', 'hotProducts'));
    }
}
