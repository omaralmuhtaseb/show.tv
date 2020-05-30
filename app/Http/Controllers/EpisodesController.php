<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Episodes;
use App\Series;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EpisodesController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {

  return view('episodes.index')->with('episodes',Episodes::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $series=Series::all();
        if ($series->count() ==0){
            return redirect()->route('series.create');
        }else{
            return view('episodes.create')->with('series',$series);


        }
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
            'series_id'=>'required',
            'title'=>'required',
            'description'=>'required',
            'airing_time'=>'required',
            'at_time'=>'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image= $request->thumbnail;
        $image_new_name=time().$image->getClientOriginalName();
        $image->move('uploads/episodes_images/',$image_new_name);

        $video= $request->video;
        $video_new_name=time().$video->getClientOriginalName();
        $video->move('uploads/episodes_videos/',$video_new_name);

        $episode= Episodes::create([
            'series_id'=>$request->series_id,
            'title'=>$request->title,
            'description'=>$request->description,
            'airing_time'=>$request->airing_time,
            'at_time'=>$request->at_time,
            'thumbnail'=>'uploads/episodes_images/'.$image_new_name,
            'video'=>'uploads/episodes_videos/' . $video_new_name,
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
    public function watch($id,$slug, Request $request)
    {
        $episode=Episodes::find($id);

        return view('watch')->with('episode',$episode);

    }



    //dislike function
    public function dislike($id){

//        DB::table('episodes')
//            ->where('id', 2)
//            ->increment('dislike', 1);

        Episodes::find($id)->increment('dislike');


        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $episode = Episodes::find($id);
        return view('episodes.edit')->with('episode',$episode)
            ->with('series',Series::all());
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




        $episode= Episodes::find($id);
        if ($request->hasFile('thumbnail')){
            $image=$request->thumbnail;
            $image_new_name=time().$image->getClientOriginalName();
            $image->move('uploads/episodes_images/',$image_new_name);

            $episode->thumbnail='uploads/episodes_images/'.$image_new_name;
        }
        if ($request->hasFile('video')){
            $video=$request->video;
            $video_new_name=time().$video->getClientOriginalName();
            $video->move('uploads/episodes_videos/',$video_new_name);

            $episode->video='uploads/episodes_videos/'.$video_new_name;
        }




        $episode->title=$request->title;
        $episode->description=$request->description;
        $episode->airing_time=$request->airing_time;
        $episode->at_time=$request->at_time;
        $episode->save();
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $episodes= Episodes::find($id);
        $episodes->delete();
        return redirect()->back();
    }
}
