@extends('layouts.admin-nav')


@section('content')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">

                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        <p>{{session('status')}}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                @endif

                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        <p>{{session('error')}}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                @endif
                <div class="card">
                    <div class="card-header">Edit Product &nbsp;{{$series->title}}</div>

                    <div class="card-body">
                        <form action="{{route('series.update',['id'=>$series->id])}}" method="post" enctype="multipart/form-data">
                            @csrf



                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input type="text" class="form-control" value="{{$series->title}}" name="title">
                            </div>
                            <div class="form-group">
                                <label for="content">Description</label>
                                <textarea rows="8" cols="8" type="text" class="form-control"  name="description">{{$series->description}}</textarea>
                            </div>
                            <script>
                                CKEDITOR.replace( 'description' );
                            </script>


                            <div class="form-group">
                                <label for="Title">Airing Time</label>
                                <div class="form-group">
                                    <label for="airingtime">From</label>





                                    <select class="form-control" name="airing_time_from" id="">
                                        @if($series->airing_time_from !=='')
                                            <option selected value="{{$series->airing_time_from}}">{{$series->airing_time_from}}</option>


                                        @else
                                            <option value="{{$series->airing_time_from}}">{{$series->airing_time_from}}</option>
                                        @endif
                                        <option value="Saturday">Saturday</option>
                                        <option value="Sunday">Sunday</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="airingtime">To</label>
                                    <select class="form-control" name="airing_time_to" id="">
                                        @if($series->airing_time_to !=='')
                                            <option selected value="{{$series->airing_time_to}}">{{$series->airing_time_to}}</option>


                                        @else
                                            <option value="{{$series->airing_time_to}}">{{$series->airing_time_to}}</option>
                                        @endif
                                        <option value="Saturday">Saturday</option>
                                        <option value="Sunday">Sunday</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                    </select>
                                </div>




                                <div class="md-form md-outline">
                                    <label for="at">At:</label>

                                    <input type="time" name="at_time" class="form-control" value="{{$series->at_time}}" placeholder="Select time">
                                </div>
                            </div>
                            <button type="submit" class="form-group btn col-md-6 btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
