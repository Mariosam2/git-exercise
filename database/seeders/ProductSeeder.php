<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $new_product = new Product();
            $new_product->name = $faker->word(2, true);
            $new_product->description = $faker->text();
            $new_product->price = $faker->randomFloat(2, 1, 100);
            $new_product->save();
        }
    }
}
