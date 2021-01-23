<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Mail\SendEmailTest;
use Session;
use DB;
use App\SiteConfig;
class MailController extends Controller
{

    public function sendemail(Request $request)
    {

        $c_mail = SiteConfig::select('email')->first();
//        dd($c_mail->email);
        $data = [
            'name' => $request->name,
            'email' =>$request->email,
            'phone' =>$request->phone,
            'subject' =>$request->subject,
            'content' =>$request->content,
            'to' =>$c_mail->email,
        ];
         Mail::send('emails.sendmail',$data,function($mail) use ($data){
            $mail->from($data['email'], $data['name'])
                ->to($data['to'])
                ->subject($data['subject']);
        });
        return redirect()->back()->with('sent_mail','Meil Sent Succfully');
    }
}
