<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\AppointmentCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class AppoinmentMakeMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $appointment;

    /**
     * Create a new job instance.
     */
    public function __construct($appointment)
    {
        $this->appointment=$appointment;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        Mail::to($this->appointment->email)->send(new AppointmentCreated($this->appointment));
        return 1;

    }
}
