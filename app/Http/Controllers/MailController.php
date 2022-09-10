<?php

namespace App\Http\Controllers;

use App\Mail\SendTestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function send(Request $request)
    {
        $to = $request->email;
        Mail::to($to)->send(new SendTestMail());

        session()->flash('flash_message', '招待が完了しました');

        return redirect()->route('user.show', $request->id);
    }
}
