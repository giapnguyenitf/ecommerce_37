<?php
namespace App\Repositories\Contracts;

use App\Repositories\Contracts\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function updatePassword($id, $password);
}
