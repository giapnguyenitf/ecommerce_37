<?php
namespace App\Repositories\Eloquent;

use App\Models\Rating;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Contracts\RatingRepositoryInterface;

class RatingRepository extends BaseRepository implements RatingRepositoryInterface
{
    public function getModel()
    {
        return Rating::class;
    }
}
