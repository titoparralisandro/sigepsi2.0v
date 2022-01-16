<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class MailController extends Controller
{
    public function sendEmail(){
        $details=[
            'title' => $titulo,
            'body' => $body
        ];

        Mail::to("moisesvillangonzalez@gmail.com")->send(new TestMail($details));
        return "Mensaje enviado";

    }
}
