<?php
namespace App\Repositories\Eloquent;

use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Contracts\OrderDetailRepositoryInterface;

class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface
{
    public function getModel()
    {
        return OrderDetail::class;
    }

    public function statisticOrder($range)
    {
        return $this->model
            ->where('created_at', '>=', $range)
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get([
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) as value')
            ]);
    }
}
