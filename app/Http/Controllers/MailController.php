<?php

namespace App\Http\Controllers;

use App\Mail\SendTestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

use App\Models\Team;
use App\Models\User;

class MailController extends Controller
{
    public function send(Request $request)
    {
        // user_id取得
        $user = Auth::user();

        $name = $request->name;
        $email = $request->email;
        $team = $request->team;

        $mail = new SendTestMail($name, $email, $team);

        Mail::to($email)->send($mail);

        session()->flash('flash_message', '招待が完了しました');

        return redirect()->route('user.show', $user);
    }

    public function invite(Request $request)
    {
        return view('emails.invite');
    }

}
