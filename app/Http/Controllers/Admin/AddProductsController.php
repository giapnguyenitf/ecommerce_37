<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Excel;
use Session;
use Exception;
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

    public function importListProduct(Request $request)
    {
        try
        {
            Excel::load($request->products, function($reader) {
                $result = $reader->get();
                $product = [];
                foreach ($result as $data) {
                    $product['name'] = $data['product'];
                    $category = $this->categoryRepository->where('name', 'like', $data['category'])->get()->first();
                    $product['category_id'] = $category->id;
                    $product['description'] = $data['description'];
                    $product['price'] = $data['price'];
                    $product['discount'] = $data['discount'];
                    $brand = $this->brandRepository->where('name', 'like', $data['brand'])->get()->first();
                    $product['brand_id'] = $brand->id;
                    $product['thumbnail'] = $data['thumbnail'];
                    $this->productRepository->create($product);
                }
            });

            Session::flash('import_product_success', trans('label.import_product_success'));
        } catch(Exception $e) {
            Session::flash('incorrect_file_format', trans('label.incorrect_file_format'));
        }

        return back();
    }

    public function exportListProduct()
    {
        $products = $this->productRepository->all();
        $list = $products->toArray();
        Excel::create('listProducts', function($excel) use($list) {
            $excel->setTitle(trans('label.list_products'));
            $excel->setCreator(trans('label.mail.u-stora'))->setCompany(trans('label.mail.u-stora'));
            $excel->sheet('Sheetname', function($sheet) use ($list) {
                $sheet->fromArray($list);
            });
        })->export('xlsx');

        return back();
    }
}
