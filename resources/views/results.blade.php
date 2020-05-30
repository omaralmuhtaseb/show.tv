@extends('layouts.app')

@section('content')

    <style>

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

        .badge.badge-success {
            background-color: #64DD17
        }



        .badge.badge-outlined {
            background-color: transparent
        }



        .badge.badge-outlined.badge-primary {
            border-color: #2196F3;
            color: #2196F3
        }


        .badge.badge-outlined.badge-success {
            border-color: #64DD17;
            color: #64DD17
        }


    </style>

<div class="container">


            @if ($series->count() > 0)


            @foreach($series as $item)


            <div class="card-group">

                            <div class="badge badge-primary badge-outlined" style="max-width: 18rem;">
                                <span style="padding-right: 130px">(Series)</span>
                                <div class="card-body">
                                    <h5 class="card-title">{{$item->title}}</h5>
                                    <p class="card-text">{!! $item->description !!}</p>
                                    <p class="card-text">From :{{$item->airing_time_from}}</p>
                                    <p class="card-text">To :{{$item->airing_time_to}}</p>
                                    <p class="card-text">At :{{$item->at_time}}</p>
                                    <a href="{{route('series.view',['id'=>$item->id,'slug'=>$item->slug])}}" class="btn btn-primary">Watch</a>
                                </div>
                            </div>

                    @endforeach




            @endif

        @if ($episodes->count() > 0)

        @foreach ( $episodes as $episode)


                            <div class="badge badge-success badge-outlined ml-2 mb-6" style="max-width: 18rem;">
                                <span style="padding-right: 130px">(Episode)</span>

                            <div class="card-body">
                                <h5 class="card-title">{{$episode->title}}</h5>
                                <img src="{{url($episode->thumbnail)}}" width="70px" height="70px" >
                                <p class="card-text">{!! $episode->description !!}</p>
                                <p class="card-text">On :{{$episode->airing_time}}</p>
                                <p class="card-text">At :{{$episode->at_time}}</p>
                                <a href="{{route('episode.watch',['id'=>$episode->id,'slug'=>$episode->slug])}}" class="btn btn-info">Watch</a>


                            </div>
                        </div>

                @endforeach


            </div>
    </div>


            @else



            <!-- post -->
                <div class="post post-row">
                    <div class="post-body">
                        <div class="post-category">

                        </div>
                        <ul class="post-meta">
                            <h5>  No results found !   </h5>
                        </ul>
                    </div>
                </div>
                <!-- /post -->

            @endif










            <br>



</div>
@endsection