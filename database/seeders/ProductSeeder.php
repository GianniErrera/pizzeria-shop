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
            "category" => "1",
            "description" => "Tomato sauce, mozzarella cheese, basil leaves",
            "price" =>	"4,50",
            "image" =>	"images/pizza-1.jpg",
            "vegetarian" =>	"1",
            "vegan" =>	"0"
        ]);
        Product::create([
            "name" => "Marinara",
            "category" => "1",
            "description" => "Tomato sauce, garlic, basil leaves",
            "price" =>	"3,50",
            "image" =>	"images/pizza-2.jpg",
            "vegetarian" =>	"1",
            "vegan" =>	"1"
        ]);
        Product::create([
            "name" => "Capricciosa",
            "category" => "1",
            "description" => "Tomato sauce, mozzarella cheese, mushrooms, olives, pickled artichokes, gammon",
            "price" =>	"8,00",
            "image" =>	"images/pizza-3.jpg",
            "vegetarian" =>	"0",
            "vegan" =>	"0"
        ]);
        Product::create([
            "name" => "Bufalina",
            "category" => "1",
            "description" => "Tomato sauce, mozzarella di bufala DOP, basil leaves",
            "price" =>	"8,00",
            "image" =>	"images/pizza-4.jpg",
            "vegetarian" =>	"1",
            "vegan" =>	"0"
        ]);
        Product::create([
            "name" => "Quattro formaggi",
            "category" => "1",
            "description" => "Mozzarella cheese, gorgonzola, scamorza affumicata and fontina",
            "price" =>	"7,50",
            "image" =>	"images/pizza-5.jpg",
            "vegetarian" =>	"1",
            "vegan" =>	"0"
        ]);
        Product::create([
            "name" => "Diavola",
            "category" => "1",
            "description" => "Tomato sauce, mozzarella cheese, hot spiced salami",
            "price" =>	"6,50",
            "image" =>	"images/pizza-6.jpg",
            "vegetarian" =>	"0",
            "vegan" =>	"0"
        ]);
        Product::create([
            "name" => "Vegetarian",
            "category" => "1",
            "description" => "Mozzarella cheese, tomatoes, bell peppers, aubergines, zucchini, mushrooms",
            "price" =>	"6,00",
            "image" =>	"images/pizza-7.jpg",
            "vegetarian" =>	"1",
            "vegan" =>	"0"
        ]);
        Product::create([
            "name" => "Cafona",
            "category" => "1",
            "description" => "Tomato sauce, mozzarella cheese, sausage, potatoes",
            "price" =>	"8,00",
            "image" =>	"images/pizza-30.jpg",
            "vegetarian" =>	"1",
            "vegan" =>	"0"
        ]);
        Product::create([
            "name" => "Red wine",
            "category" => "2",
            "price" =>	"6,00",
            "image" =>	"images/pizza-2.jpg",
            "vegetarian" =>	"1",
            "vegan" =>	"1"
        ]);
        Product::create([
            "name" => "Still water",
            "category" => "2",
            "price" =>	"3,00",
            "image" =>	"images/drink-10.jpg",
            "vegetarian" =>	"1",
            "vegan" =>	"1"
        ]);
        Product::create([
            "name" => "Ale beer",
            "category" => "2",
            "description" => "Very very good!",
            "price" =>	"4,00",
            "image" =>	"images/drink-14.jpg",
            "vegetarian" =>	"1",
            "vegan" =>	"1"
        ]);
        Product::create([
            "name" => "Cocktail",
            "category" => "2",
            "description" => "Some fancy cocktail drink",
            "price" =>	"8,00",
            "image" =>	"images/drink-15.jpg",
            "vegetarian" =>	"1",
            "vegan" =>	"1"
        ]);
        Product::create([
            "name" => "Red coloured drink",
            "category" => "2",
            "description" => "Some spiked stuff",
            "price" =>	"9,50",
            "image" =>	"images/drink-18.jpg",
            "vegetarian" =>	"1",
            "vegan" =>	"1"
        ]);
        Product::create([
            "name" => "Fizzy drink",
            "category" => "2",
            "description" => "This red drink looks a little dodgy",
            "price" =>	"11,50",
            "image" =>	"images/drink-21.jpg",
            "vegetarian" =>	"1",
            "vegan" =>	"1"
        ]);
        Product::create([
            "name" => "Chocolate pudding",
            "category" => "5",
            "description" => "Home made pudding",
            "price" =>	"4,50",
            "image" =>	"images/dessert-1.jpg",
            "vegetarian" =>	"1",
            "vegan" =>	"0"
        ]);


    }

}
