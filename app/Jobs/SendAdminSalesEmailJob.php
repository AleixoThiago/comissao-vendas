<?php

namespace App\Jobs;

use App\Mail\AdminSalesMail;
use App\Services\AdminSalesMailService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendAdminSalesEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $adminSalesMailService = (new AdminSalesMailService);
        $admins = $adminSalesMailService->getAdmins();
        $salesData = $adminSalesMailService->getSalesData();
        $mail = new AdminSalesMail($salesData);

        foreach ($admins as $admin) {
            Mail::to($admin->email)->send($mail);
        }
    }
}
