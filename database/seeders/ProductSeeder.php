<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
                'name' => 'áo tay ngắn',
                'price' => 10000
            ],
            [
                'name' => 'áo tay dài',
                'price' => 12000
            ],
            [
                'name' => 'quần  ngắn',
                'price' => 20000
            ],
            [
                'name' => 'áo dày',
                'price' => 22000
            ],
        );
    }
}
