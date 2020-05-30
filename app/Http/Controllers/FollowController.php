<?php

namespace App\Http\Controllers;

use App\FollowSeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{

    public function follow(Request $request)
    {
        FollowSeries::create([
            'user_id' => Auth::user()->id,
            'series_id' => $request->id
        ]);

        return redirect()->back();
    }

    public function unfollow(Request $request)
    {
        $follow =FollowSeries::where('series_id',$request->id);
        $follow->delete();

        return redirect()->back();
    }
}
