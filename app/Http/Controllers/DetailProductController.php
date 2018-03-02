<?php

namespace App\Http\Controllers;

use Session;
use Response;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\ColorProductRepositoryInterface;

class DetailProductController extends Controller
{
    protected $productRepository;
    protected $colorProductRepository;
    protected $imageRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        ColorProductRepositoryInterface $colorProductRepository
    ) {
        $this->productRepository = $productRepository;
        $this->colorProductRepository = $colorProductRepository;
    }

    public function show($id)
    {
        $product = $this->productRepository->getDetailProduct($id);
        if (Session::has('recently_viewed')) {
            $ids_viewed = Session::get('recently_viewed');
            if (!in_array($id, $ids_viewed)) {
                Session::push('recently_viewed', $id);
            }
        } else {
            Session::push('recently_viewed', $id);
        }

        $ids_viewed = Session::get('recently_viewed');
        $recently_viewed_products = $this->productRepository->getRecentlyViewedProducts($ids_viewed);

        return view('detailProduct', compact('product', 'recently_viewed_products'));
    }

    public function getDetailColorProduct($colorProductId)
    {
        $colorProductDetail = $this->colorProductRepository->getDetailColorProduct($colorProductId);

        return Response::json($colorProductDetail);
    }
}
