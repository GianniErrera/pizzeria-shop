<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        Category::create([
            'name' => 'pizza',
            'hasExtras' => true
        ]);
        Category::create([
            'name' => 'bevande'
        ]);
        Category::create([
            'name' => 'secondi'
        ]);
        Category::create([
            'name' => 'contorni'
        ]);
        Category::create([
            'name' => 'dolci'
        ]);
    }
}
