<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Product::truncate();

        $faker = \Faker\Factory::create();

        //Creando registros para la base de datos

        for ($i=0;$i<50;$i++){
            Product::create([
                'name' => $faker->name,
                'description' => $faker->text,
                'quantity'=> $faker->numberBetween($min=1, $max=10),
                'price'=>$faker->numberBetween($min=100, $max=1000),
            ]);
        }
    }
}
