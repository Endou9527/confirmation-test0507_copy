<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['id' => 1, 'name' => '商品のお届けについて'],
            ['id' => 2, 'name' => '商品の交換について'],
            ['id' => 3, 'name' => '商品トラブル'],
            ['id' => 4, 'name' => 'ショップへの問い合わせ'],
            ['id' => 5, 'name' => 'その他'],
        ]);
    }
}
