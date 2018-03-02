<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BrandRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class AddProductsController extends Controller
{
    protected $productRepository;
    protected $brandRepository;
    protected $categoryRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        BrandRepositoryInterface $brandRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->productRepository = $productRepository;
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getParentCategories()->pluck('name', 'id');
        $brands = $this->brandRepository->all()->pluck('name', 'id');

        return view('admin.addProduct', compact('brands', 'categories'));
    }
}
