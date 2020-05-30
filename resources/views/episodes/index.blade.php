@extends('layouts.admin-nav')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Categories</div>

                    <div class="card-body">

                        <table class="table">
                            @if($episodes->count()<=0)
                                <h3>No Episodes at the moment</h3>
                            @else
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Airing Time</th>
                                <th scope="col">Thumbnail</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>

                            </tr>
                            </thead>
                            <tbody>

                                @foreach($episodes as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{!! $item->description !!}</td>
                                    <td>{{$item->airing_time }} @ {{ $item->at_time }}</td>
                                    <td><img height="50px" width="50px" src="{{url($item->thumbnail)}}"></td>
                                    <td><a href="{{route('episode.edit',['id'=>$item->id])}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>

                                    <td><a href="{{route('episode.delete',['id'=>$item->id])}}">
                                            <i style="color: red" class="fa fa-trash"></i>
                                        </a>
                                    </td>

                                </tr>

                            @endforeach


                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
