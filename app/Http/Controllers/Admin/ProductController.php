<?php

namespace App\Http\Controllers\Admin;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UploadProductRequest;
use App\Repositories\Contracts\ColorRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductController extends Controller
{
    protected $productRepository;
    protected $colorRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        ColorRepositoryInterface $colorRepository
    ) {
        $this->productRepository = $productRepository;
        $this->colorRepository = $colorRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->with('colorProducts')->paginate();

        return view('admin.listProducts', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadProductRequest $request)
    {
      try
      {
        $data = $request->only([
            'category_id',
            'name',
            'description',
            'price',
            'brand_id',
        ]);
        $thumbnail_path = $request->thumbnail->store(config('setting.folder_thumbnails'));
        $data['thumbnail'] = explode('/', $thumbnail_path)[2];
        $data['discount'] = $request->discount/100;
        $product = $this->productRepository->create($data);
        $colors = $this->colorRepository->all();
        Session::flash('add_product_success', trans('label.add_product_success'));

        return redirect()->route('update-detail.show', $product->id);
      } catch(Exception $e) {
        Session::flash('add_product_fail', trans('label.add_product_fail'));

        return back();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
