@extends('layouts.admin-nav')

@section('content')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                @if(count($errors)>0)
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Edit Episode &nbsp;{{$episode->title}}</div>

                    <div class="card-body">
                        <form action="{{route('episode.update',['id'=>$episode->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="content">Series</label>
                                <select   class="form-control" name="series_id">
                                    @foreach($series as $ser)
                                        @if($ser->id ==$episode->series_id)
                                            <option selected value="{{$ser->id}}">{{$ser->title}}</option>


                                        @else
                                            <option value="{{$ser->id}}">{{$ser->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>



                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input type="text" class="form-control" value="{{$episode->title}}" name="title">
                            </div>
                            <div class="form-group">
                                <label for="content">Description</label>
                                <textarea rows="8" cols="8" type="text" class="form-control"  name="description">{!! $episode->description !!}</textarea>
                            </div>
                            <script>
                                CKEDITOR.replace( 'description' );
                            </script>


                            <div class="form-group">
                                <label for="Title">Airing Time</label>
                                <div class="form-group">
                                    <label for="airingtime">From</label>




                                    <select class="form-control" name="airing_time" id="">
                                        @if($episode->airing_time !=='')
                                            <option selected value="{{$episode->airing_time}}">{{$episode->airing_time}}</option>


                                        @else
                                            <option value="{{$episode->airing_time}}">{{$episode->airing_time}}</option>
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

                                    <input type="time" name="at_time" class="form-control" value="{{$episode->at_time}}" placeholder="Select time">
                                </div>




                                <div class="form-group">
                                    <label for="image">Thumbnail:</label>
                                    <input type="file" class="form-group" name="thumbnail">

                                </div>

                                <div class="form-group">
                                    <label for="video">Video:</label>
                                    <input type="file" class="form-group" name="video">

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
