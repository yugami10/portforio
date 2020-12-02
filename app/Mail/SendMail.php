<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

	// メールの本文
	public $content;

	// メールの件名
	public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		$content = $this->content;

		return $this->text('email.send', compact('content'))
					->from(config('mail.from.address'), config('mail.from.name'))
					->subject($this->subject);
    }
}
