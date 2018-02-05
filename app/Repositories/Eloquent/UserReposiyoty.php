<?php
namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function findByField($field, $value)
    {
        return $this->model->where($field, $value)->get()->first();
    }

    public function updatePassword($id, $password)
    {
        $user = $this->model->find($id);
        $user->password_hash = $password;
        
        return $user->save();
    }
}
?>
