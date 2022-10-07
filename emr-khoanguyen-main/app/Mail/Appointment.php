<?php

namespace App\Mail;

use App\Models\Appointment as ModelsAppointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Appointment extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ModelsAppointment $appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('nguyenvankhoa99vp@gmail.com', 'EMR - Khoa Nguyen')
        ->subject('Xác nhận lịch hẹn EMR - KN')
        ->view('emails.appointmentverify');
    }
}
