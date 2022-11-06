<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\Event;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //ユーザーとしてログイン済みかどうか
    }
    
    public function store(Event $event)
    {
        $event->users()->attach(Auth::id());

        return redirect()->route('events.show', $event);
    }



    public function destroy(Event $event)
    {
        $event->users()->detach(Auth::id());

        return redirect()->route('events.show', $event);
    }
}
