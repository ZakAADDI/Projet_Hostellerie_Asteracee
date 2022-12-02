<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class EmailController extends Controller
{
    public function sendEmail() {

        $user1 = ['email' => 'all.blandinf@gmail.com', 'name' => 'Michel DUPONT'];

        Mail::to($user1['email'])->send(new TestMail($user1));
            return view('emails.testemail', ['user'=>$user1]);
        }
    }