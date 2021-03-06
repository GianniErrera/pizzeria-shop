<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product::truncate();

        Product::create([
            "name" => "Margherita",
            "category_id" => "1",
            "description" => "Tomato sauce, mozzarella cheese, basil leaves",
            "price" =>	"4.50",
            "vegetarian" =>	"1",
            "vegan" =>	"0"
        ]);
        Product::create([
            "name" => "Marinara",
            "category_id" => "1",
            "description" => "Tomato sauce, garlic, basil leaves",
            "price" =>	"3.50",
            "vegetarian" =>	"1",
            "vegan" =>	"1"
        ]);
        Product::create([
            "name" => "Capricciosa",
            "category_id" => "1",
            "description" => "Tomato sauce, mozzarella cheese, mushrooms, olives, pickled artichokes, gammon",
            "price" =>	"8.00",
            "vegetarian" =>	"0",
            "vegan" =>	"0"
        ]);
        Product::create([
            "name" => "Bufalina",
            "category_id" => "1",
            "description" => "Tomato sauce, mozzarella di bufala DOP, basil leaves",
            "price" =>	"8.00",
            "vegetarian" =>	"1",
            "vegan" =>	"0"
        ]);
        Product::create([
            "name" => "Quattro formaggi",
            "category_id" => "1",
            "description" => "Mozzarella cheese, gorgonzola, scamorza affumicata and fontina",
            "price" =>	"7.50",
            "vegetarian" =>	"1",
            "vegan" =>	"0"
        ]);
        Product::create([
            "name" => "Diavola",
            "category_id" => "1",
            "description" => "Tomato sauce, mozzarella cheese, hot spiced salami",
            "price" =>	"6.50",
            "vegetarian" =>	"0",
            "vegan" =>	"0"
        ]);
        Product::create([
            "name" => "Vegetarian",
            "category_id" => "1",
            "description" => "Mozzarella cheese, tomatoes, bell peppers, aubergines, zucchini, mushrooms",
            "price" =>	"6.00",
            "vegetarian" =>	"1",
            "vegan" =>	"0"
        ]);
        Product::create([
            "name" => "Cafona",
            "category_id" => "1",
            "description" => "Tomato sauce, mozzarella cheese, sausage, potatoes",
            "price" =>	"8.00",
            "vegetarian" =>	"1",
            "vegan" =>	"0"
        ]);
        Product::create([
            "name" => "Red wine",
            "category_id" => "2",
            "price" =>	"6.00",
            "vegetarian" =>	"1",
            "vegan" =>	"1"
        ]);
        Product::create([
            "name" => "Still water",
            "category_id" => "2",
            "price" =>	"3.00",
            "vegetarian" =>	"1",
            "vegan" =>	"1"
        ]);
        Product::create([
            "name" => "Ale beer",
            "category_id" => "2",
            "description" => "Very very good!",
            "price" =>	"4.00",
            "vegetarian" =>	"1",
            "vegan" =>	"1"
        ]);
        Product::create([
            "name" => "Cocktail",
            "category_id" => "2",
            "description" => "Some fancy cocktail drink",
            "price" =>	"8.00",
            "vegetarian" =>	"1",
            "vegan" =>	"1"
        ]);
        Product::create([
            "name" => "Red coloured drink",
            "category_id" => "2",
            "description" => "Some spiked stuff",
            "price" =>	"9.50",
            "vegetarian" =>	"1",
            "vegan" =>	"1"
        ]);
        Product::create([
            "name" => "Fizzy drink",
            "category_id" => "2",
            "description" => "This red drink looks a little dodgy",
            "price" =>	"11.50",
            "vegetarian" =>	"1",
            "vegan" =>	"1"
        ]);
        Product::create([
            "name" => "Chocolate pudding",
            "category_id" => "5",
            "description" => "Home made pudding",
            "price" =>	"4.50",
            "vegetarian" =>	"1",
            "vegan" =>	"0"
        ]);


    }

}
