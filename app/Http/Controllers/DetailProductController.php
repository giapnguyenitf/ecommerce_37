<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Response;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewProductRequest;
use App\Repositories\Contracts\RatingRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\ColorProductRepositoryInterface;

class DetailProductController extends Controller
{
    protected $productRepository;
    protected $colorProductRepository;
    protected $imageRepository;
    protected $ratingRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        ColorProductRepositoryInterface $colorProductRepository,
        RatingRepositoryInterface $ratingRepository
    ) {
        $this->productRepository = $productRepository;
        $this->colorProductRepository = $colorProductRepository;
        $this->ratingRepository = $ratingRepository;
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
        $ratings = $this->ratingRepository->where('product_id', $product->id)->with('user')->paginate(config('setting.get_top_ratings'));

        return view('detailProduct', compact('product', 'recently_viewed_products', 'ratings'));
    }

    public function getDetailColorProduct($colorProductId)
    {
        $colorProductDetail = $this->colorProductRepository->getDetailColorProduct($colorProductId);

        return Response::json($colorProductDetail);
    }

    public function addReview(ReviewProductRequest $request)
    {
        $review = $request->only([
            'stars',
            'messages',
            'product_id',
        ]);
        $review['user_id'] = Auth::user()->id;
        $rating = $this->ratingRepository->create($review);
        $rating = $this->ratingRepository->where('id', $rating->id)->with('user')->get()->first();

        return Response::json($rating);
    }
}
