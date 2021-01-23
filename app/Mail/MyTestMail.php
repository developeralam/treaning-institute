<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailTest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public  $name;
    public  $email;
    public  $phone;
    public  $subject;
    public  $content;

    public function __construct($name,$email,$phone,$subject,$content)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->subject = $subject;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->name;
        $email = $this->email;
        $phone = $this->phone;
        $subject = $this->subject;
        $content = $this->content;

        return $this->subject($subject)
            ->to('info.mmitsoft@gmail.com')
            ->from($this->email)
            ->view('emails.test',compact('name','email','phone','subject','content'));
    }
}
