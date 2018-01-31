<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Product::class, 5)->create()->each(function ($product) {
            $colorProduct = $product->colors()->attach([$product->id => [
                'color_id' => App\Models\Color::get()->random()->id,
                'number' => 10,
            ]]);
            $colorProduct = $product->colors()->attach([$product->id => [
                'color_id' => App\Models\Color::get()->random()->id,
                'number' => 15,
            ]]);
            App\Models\Image::create([
                'file_name' => str_random(10),
                'color_product_id' => App\Models\ColorProduct::get()->random()->id,
            ]);
        });
    }
}
