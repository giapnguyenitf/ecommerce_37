<?php

namespace App\Http\Controllers\Admin;

use Session;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UploadImagesRequest;
use App\Repositories\Contracts\ImageRepositoryInterface;
use App\Repositories\Contracts\ColorRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\ColorProductRepositoryInterface;

class ImagesController extends Controller
{
    protected $colorRepository;
    protected $colorProductRepository;
    protected $productRepository;
    protected $imageRepository;


    public function __construct(
        ColorRepositoryInterface $colorRepository,
        ColorProductRepositoryInterface $colorProductRepository,
        ProductRepositoryInterface $productRepository,
        ImageRepositoryInterface $imageRepository
    ) {
        $this->colorProductRepository = $colorProductRepository;
        $this->colorRepository = $colorRepository;
        $this->productRepository = $productRepository;
        $this->imageRepository = $imageRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(UploadImagesRequest $request)
    {
       try
       {
            $data = $request->only([
                'product_id',
                'color_id',
                'number',
            ]);
            $color_existed = $this->colorProductRepository->isExistColor($data['product_id'], $data['color_id']);
            if ($color_existed) {
                Session::flash('color_is_existed', trans('label.color_is_existed'));

                return back();
            }
            $colorProduct = $this->colorProductRepository->create($data);
            $array = [];
            foreach ($request->images as $image) {
                $file_path = $image->store(config('setting.folder_thumbnails'));
                $thumbnail['color_product_id'] = $colorProduct->id;
                $thumbnail['file_name'] = explode('/', $file_path)[2];
                array_push($array, $thumbnail);
            }
            $this->colorProductRepository->createByRelationship('images', ['model' => $colorProduct, 'attributes' => $array]);
            Session::flash('add_color_product_success', trans('label.add_color_product_success'));
       } catch(Exception $e) {
            Session::flash('add_color_product_fail', trans('label.add_color_product_fail'));
       }

       return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            $product = $this->productRepository->findOrFail($id);
            $colors = $this->colorRepository->all()->pluck('name', 'id');

            return view('admin.addColorProduct', compact('product', 'colors'));
        } catch(Exception $e) {
            Session::flash('product_not_found', trans('label.product_not_found'));

            return redirect()->route('add-product.index');
        }

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
