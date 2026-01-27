<?php

namespace App\Jobs;

use App\Mail\SuccessOrder;
use App\Models\Hoadon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendMailOrder implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public $order;
    public function __construct(
        Hoadon $order
    ) {
        $this->order = $order;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->order->email)->send(new SuccessOrder($this->order));
    }
}
