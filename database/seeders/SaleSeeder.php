<?php

namespace Database\Seeders;

use App\Models\Sale;
use App\Models\Seller;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Seller::all()->each(function ($seller) {
            Sale::factory(rand(1, 3))->create([
                'seller_id' => $seller->id,
            ]);
        });
    }
}
