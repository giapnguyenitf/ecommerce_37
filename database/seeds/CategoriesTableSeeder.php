<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Category::class, 5)->create()->each(function ($parent_category) {
            factory(App\Models\Category::class, 4)->create([
                'parent_id' => $parent_category->id,
            ]);
        });
    }
}
