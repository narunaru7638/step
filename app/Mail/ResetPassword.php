<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


//use App\Http\Controllers\Log;


class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;


//    $token = null;
    public $token;
//    dd($token);
//    $token;

//    dd('test');

//    $token = 'adfafadfasfdasdfa';

    /**
     * Create a new message instance.
     *
     * @param $token
     */
    public function __construct($token)
    {
        //
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('パスワード再設定')
            ->view('mail.password-reset');
    }
}
