@extends('layouts.app')

@section('content')

    <style>
        h3{
            font-family: Dubai;
            color: #0bbf59;
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



        .badge.badge-success {
            background-color: #64DD17
        }



        .badge.badge-outlined {
            background-color: transparent
        }






        .badge.badge-outlined.badge-success {
            border-color: #64DD17;
            color: #64DD17
        }




    </style>

    <div class="container">

        <h3> Episodes of  {{$series->title}} </h3>


        <div class="row ">
            @foreach($series->Episode()->get() as $episode)

                <div class="card-group">

                    <div class="badge badge-success badge-outlined" style="max-width: 18rem;">
                        <div class="card-body">
                        <img class="card-img-top" src="{{url($episode->thumbnail)}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$episode->title}}</h5>
                            <p class="card-text">{!! $episode->description !!}</p>
                            <a href="{{route('episode.watch',['id'=>$episode->id,'slug'=>$episode->slug])}}" class="btn btn-success col-md-8">Watch</a>
                        </div>
                    </div>
                </div>


            @endforeach
        </div>
    </div>


@endsection
