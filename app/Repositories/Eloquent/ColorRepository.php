<?php
namespace App\Repositories\Eloquent;

use App\Models\Color;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Contracts\ColorRepositoryInterface;

class ColorRepository extends BaseRepository implements ColorRepositoryInterface
{
    public function getModel()
    {
        return Color::class;
    }
}
