<?php

namespace App\Jobs;

use App\Mail\SellerCommissionMail;
use App\Services\SellerCommissionMailService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendSellerCommissionEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private readonly int $sellerId
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $sellerData = (new SellerCommissionMailService)->getSellerSalesData($this->sellerId);
        $mail = new SellerCommissionMail($sellerData);
        Mail::to($sellerData['email'])->send($mail);
    }
}
