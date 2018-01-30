<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            RatingTableSeeder::class,
            ProductTableSeeder::class,
            PaymentTableSeeder::class,
            OrderTableSeeder::class,
            ImageTableSeeder::class,
            ColorTableSeeder::class,
            CategoryTableSeeder::class,
        ]);
        
    }
}
