<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\VerificationMail;

class MailController extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'Mail from ProjectNalytics',
            'body' => 'Your Otp Verification Code is:  '
        ];
        Mail::to('ayomideadekanye8@gmail.com')->send(new VerificationMail($mailData));

        return view('auth.otp-verification');
    }
}
