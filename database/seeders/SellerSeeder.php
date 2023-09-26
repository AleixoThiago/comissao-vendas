<?php

namespace Database\Seeders;

use App\Models\Seller;
use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Seller::factory(10)->create(); // Cria um vendedor usando o Factory
    }
}
