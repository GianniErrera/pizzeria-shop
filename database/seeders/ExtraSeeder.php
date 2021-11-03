<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Extra;

class ExtraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Extra::truncate();

        Extra::create([
            "name" => "Turnip tops",
            "description" => "Gently simmered with garlic and chili",
            "price" =>	"2,00",
            "vegetarian" =>	"1",
            "vegan" =>	"1"
        ]);
        Extra::create([
            "name" => "Onions",
            "description" => "Thinly sliced and gently simmered",
            "price" =>	"2,00",
            "vegetarian" =>	"1",
            "vegan" =>	"1"
        ]);
        Extra::create([
            "name" => "Olives",
            "description" => "Black and green olives",
            "price" =>	"0,50",
            "vegetarian" =>	"1",
            "vegan" =>	"1"
        ]);
        Extra::create([
            "name" => "Mushrooms",
            "description" => "Wild mushromms",
            "price" =>	"2,00",
            "vegetarian" =>	"1",
            "vegan" =>	"1"
        ]);
        Extra::create([
            "name" => "Bell peppers",
            "description" => "Red, yellow and green bell peppers, simmered with garlic",
            "price" =>	"1,50",
            "vegetarian" =>	"1",
            "vegan" =>	"1"
        ]);
    }
}
