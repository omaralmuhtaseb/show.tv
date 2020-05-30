<?php

namespace App\Http\Controllers;

use App\Episodes;
use Illuminate\Http\Request;
use App\Series;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SeriesController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function randomly(){
        $series= DB::table('series')
            ->inRandomOrder()
            ->take(5)->get();

        return view('randomly',compact('series'));
    }




    public function index()
    {

        return view('series.index')->with('series',Series::all());

    }

    //This used for user area
    public function display_all()
    {

        return view('series')->with('series',Series::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('series.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'airing_time_from'=>'required',
            'airing_time_to'=>'required',
            'at_time'=>'required',
        ]);



        $series= Series::create([
            'category_id'=>$request->category_id,
            'title'=>$request->title,
            'description'=>$request->description,
            'airing_time_from'=>$request->airing_time_from,
            'airing_time_to'=>$request->airing_time_to,
            'at_time'=>$request->at_time,
            'slug'=>Str::of($request->title)->slug('-')
        ]);

        return redirect()->back()->with('status','Succesfully Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$slug,Request $request)
    {
        $series=Series::find($id);

        return view('view-series')
            ->with('series',$series);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $series = Series::find($id);
        return view('series.edit')->with('series',$series);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $series= Series::find($id);
        $series->title=$request->title;
        $series->description=$request->description;
        $series->airing_time_from=$request->airing_time_from;
        $series->airing_time_to=$request->airing_time_to;
        $series->at_time=$request->at_time;
        $series->save();

        if ($series->save()){
            return redirect()->back()->with('status','Updated Succesfully!');

        }else{
            return redirect()->back()->with('error','Not Updated!');

        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $series= Series::find($id);
        $series->delete();
        return redirect()->back();
    }
}
