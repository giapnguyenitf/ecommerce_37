<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\Models\User;
        $user->name = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password_hash = '123456';
        $user->is_admin = true;
        $user->save();
        
        factory(App\Models\User::class, 5)->create();
    }
}
