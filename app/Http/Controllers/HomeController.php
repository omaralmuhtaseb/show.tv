<?php

namespace App\Http\Controllers;

use App\Episodes;
use App\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $latestEpisodes =Episodes::latest()->get();


        return view('home',compact('latestEpisodes'));
    }



    public function search(){
        $episodes = DB::table('episodes')
            ->where('title', 'like',  '%' . request('search') . '%')
            ->latest()
            ->skip(0)
            ->take(10)
            ->get();

        $series = DB::table('series')
            ->where('title', 'like',  '%' . request('search') . '%')
            ->latest()
            ->skip(0)
            ->take(10)
            ->get();


        return view('results')
            ->with('episodes',$episodes)
            ->with('series',$series)
            ->with('title' ,  'Result : '. request('search') );
    }
}
