<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seller;

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
