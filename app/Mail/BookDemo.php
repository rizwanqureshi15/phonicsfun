<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Setting;
use App\Models\Demo;

class BookDemo extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Demo $demo)
    {
        $this->demo = $demo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $setting = Setting::where('name', 'MAIL_USERNAME')->first();
        
        return $this->from($setting->value)
                ->view('emails.book_demo')
                ->subject('Demo Request, '.config('app.name', 'Laravel') )
                ->with([
                        'demo' => $this->demo,
                    ]);
    }
}
