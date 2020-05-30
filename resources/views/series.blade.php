@extends('layouts.app')

@section('content')


    <style>
        h3{
            font-family: Dubai;
            color: #2360bf;
        }
        .badge {
            display: inline-block;
            padding: 3px 6px;
            border: 1px solid transparent;
            width: 250px;
            font-size: large;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            border-radius: 50px;
        }



        .badge.badge-primary {
            background-color: #2196F3
        }





        .badge.badge-outlined {
            background-color: transparent
        }



        .badge.badge-outlined.badge-primary {
            border-color: #2196F3;
            color: #2196F3
        }





    </style>

    <div class="container">
        <h3>Series</h3>

        <div class="row ">
            @foreach($series as $item)


                <div class="card-group">

                    <div class="badge badge-primary badge-outlined" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->title}}</h5>
                            <p class="card-text">{!! $item->description !!}</p>
                            <p class="card-text">From: {{$item->airing_time_from}} To: {{$item->airing_time_to}} @ {{$item->at_time}}</p>


                            @if(isFollowing(Auth::user()->id,$item->id )=='Following')
                                {{"You Are Following This Series"}}
                                <form method="post" action="{{route('unfollow',['id'=>$item->id])}}">@csrf  <button type="submit" class="btn btn-warning mb-2">UnFollow</button>
                                </form>
                            @else
                                <form method="post" action="{{route('follow',['id'=>$item->id])}}">@csrf  <button type="submit" class="btn btn-primary mb-2">Follow</button>
                                </form>

                            @endif

                            <a href="{{route('series.view',['id'=>$item->id,'slug'=>$item->slug])}}" class="btn btn-primary">Watch</a>
                        </div>
                    </div>

                </div>


            @endforeach
        </div>
    </div>


@endsection
