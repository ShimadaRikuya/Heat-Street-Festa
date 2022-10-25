<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;//この行を上に追加
use App\Models\Team;
use App\Models\Event;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // 公開設定データ・新しい順に6件表示
        $events = Event::publicList()->take(6);
        return view('top', compact('events'));
    }
}
