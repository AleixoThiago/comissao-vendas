<?php

namespace Tests\Unit;

use App\Models\Admin;
use App\Models\Sale;
use App\Services\AdminSalesMailService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminSalesMailServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_sales_data()
    {
        Sale::factory()->create([
            'created_at' => now()->subDay(),
            'amount' => 100,
        ]);
        Sale::factory()->create([
            'created_at' => now(),
            'amount' => 200,
        ]);
        Sale::factory()->create([
            'created_at' => now(),
            'amount' => 300,
        ]);

        $service = new AdminSalesMailService();
        $salesData = $service->getSalesData();

        $this->assertEquals(2, $salesData['totalSales']);
        $this->assertEquals(500, $salesData['totalAmount']);
    }

    public function test_get_admins()
    {
        Admin::factory()->create([
            'email' => 'admin1@example.com',
        ]);
        Admin::factory()->create([
            'email' => 'admin2@example.com',
        ]);

        $service = new AdminSalesMailService();
        $admins = $service->getAdmins();

        $this->assertCount(2, $admins);
        $this->assertEquals('admin1@example.com', $admins[0]->email);
        $this->assertEquals('admin2@example.com', $admins[1]->email);
    }
}
