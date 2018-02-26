<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\ProductRepositoryInterface;

class HomeController extends Controller
{
    protected $productRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductRepositoryInterface $productRepository)
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
        $topNewProducts = $this->productRepository->getTopNew(config('setting.get_top_new_product'));
        $topSellerProducts = $this->productRepository->getTopSeller(config('setting.get_top_seller_product'));

        return view('home', compact('products', 'hotProducts', 'topNewProducts', 'topSellerProducts'));
    }
}
