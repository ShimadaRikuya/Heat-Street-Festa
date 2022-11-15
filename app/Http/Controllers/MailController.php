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

        $email = $request->email;
        $team_id = $request->team_id;
        $token = $request->invite_code;
        $invite_url = "http://localhost:8573/teams/email_join/$team_id"."/".$request->invite_code;

        $team = Team::find($team_id)->first();

        $mail = new SendTestMail($email, $team, $invite_url, $token);

        Mail::to($email)->send($mail);

        session()->flash('msg_success', '招待が完了しました');

        return redirect()->route('teams.show', $team);
    }

    public function invite(Request $request)
    {
        return view('home');
    }

}
