<?php
namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return Category::class;
    }

    public function getParentCategories()
    {
        return $this->model
            ->where('parent_id', '=', config('setting.is_parent_category'))
            ->with('subCategories')
            ->get();
    }
}
