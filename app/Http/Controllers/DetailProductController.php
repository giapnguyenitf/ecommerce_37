<?php

namespace App\Http\Controllers;

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

        return view('detailProduct', compact('product'));
    }

    public function getDetailColorProduct($colorProductId)
    {
        $colorProductDetail = $this->colorProductRepository->getDetailColorProduct($colorProductId);

        return Response::json($colorProductDetail);
    }
}
