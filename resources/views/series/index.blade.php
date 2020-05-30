@extends('layouts.admin-nav')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Categories</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Airing Time</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($series as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{!! $item->description !!}</td>
                                    <td>{{$item->airing_time_from}}</td>
                                    <td>{{$item->airing_time_to}}</td>
                                    <td>{{$item->at_time}}</td>
                                    <td><a href="{{route('series.edit',['id'=>$item->id])}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>

                                    <td><a href="{{route('series.delete',['id'=>$item->id])}}">
                                            <i style="color: red" class="fa fa-trash"></i>
                                        </a>
                                    </td>

                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
