<?php

namespace App\Http\Controllers;

use Session;
use Response;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ProductRepositoryInterface;

class SearchController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        $keyword = $request->search;
        $hotProducts = $this->productRepository->findByName($keyword);
        $topNewProducts = $this->productRepository->getTopNew(config('setting.get_top_new_product'));
        $topSellerProducts = $this->productRepository->getTopSeller(config('setting.get_top_seller_product'));
        if (Session::has('recently_viewed')) {
            $ids_viewed = Session::get('recently_viewed');
            $recently_viewed_products = $this->productRepository->getRecentlyViewedProducts($ids_viewed);
        }

        return view('searchResult', compact('products', 'hotProducts', 'topNewProducts', 'topSellerProducts', 'recently_viewed_products'));
    }

    public function liveSearch(Request $request)
    {
        $keyword = $request->keyword;
        $results = $this->productRepository->findByName($keyword);

        return Response::json($results);
    }
}
