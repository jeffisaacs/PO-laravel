<?php

use Illuminate\Database\Seeder;
use App\Products;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        $json = File::get("database/products.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
          Products::create(array(
            'given_id' => $obj->id,
            'title' => $obj->title,
            'inStock' => $obj->inStock,
            'inStock_Inventory' => $obj->inStock_Inventory,
            'sold_Inventory' => $obj->sold_Inventory
          ));
        }
    }
}

