<?php

namespace App\Http\Controllers;

use App\Mail\SendTestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

use App\Models\Team;

class MailController extends Controller
{
    public function send(Request $request)
    {
        // user_id取得
        $user = Auth::user();

        // $team = Team::all();

        // $teamName = $team->name;

        $to = $request->email;
        $mail = new SendTestMail($request);

        Mail::to($to)->send($mail);

        session()->flash('flash_message', '招待が完了しました');

        return redirect()->route('user.show', $user);
    }

    public function join(Request $request)
    {
        // リンクの検証
        if (!$request->hasValidSignature()) {
            return redirect()->route('mail.invalid');
        }
        return 'join';
    }

    public function invalid()
    {
        return 'invalid';
    }

}
