<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;//この行を上に追加
use App\Models\Team;
use App\Models\Event;
use App\Models\Category;
use Carbon\Carbon;

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
        $events = Event::PublicNew()->take(6);

        // いいね数ランキング
        $ranking_events = Event::Ranking()->take(4);
        $trends = Event::getTrend()->take(6);
        $slides = Event::inRandomOrder()->where('event_end', '>=', now())->limit(5)->get();

        return view('top', compact('events', 'ranking_events', 'trends', 'slides'));
    }
}
