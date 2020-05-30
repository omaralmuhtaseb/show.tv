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
                    <div class="card-header">Create New Episode</div>

                    <div class="card-body">
                        <form action="{{route('episodes.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="content">Series Name</label>
                                <select   class="form-control" name="series_id">
                                    @foreach($series as $serie)
                                        <option value="{{$serie->id}}">{{$serie->title}}</option>

                                    @endforeach
                                </select>
                            </div>



                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label for="content">Description</label>
                                <textarea rows="8" cols="8" type="text" class="form-control" name="description"></textarea>
                                <script>
                                    CKEDITOR.replace( 'description' );
                                </script>

                            </div>

                            <div class="form-group">
                                <label for="airingtime">Day </label>
                                <select class="form-control" name="airing_time" id="">
                                    <option value="SAT">Saturday</option>
                                    <option value="SUN">Sunday</option>
                                    <option value="MON">Monday</option>
                                    <option value="TUE">Tuesday</option>
                                    <option value="WED">Wednesday</option>
                                    <option value="THU">Thursday</option>
                                    <option value="FRIDAY">Friday</option>
                                </select>
                            </div>




                            <div class="md-form md-outline">
                                <label for="at">At:</label>

                                <input type="time" name="at_time" class="form-control" placeholder="Select time">
                            </div>
                            <div class="form-group">
                                <label for="image">Thumbnail:</label>
                                <input type="file" class="form-group" name="thumbnail">

                            </div>

                            <div class="form-group">
                                <label for="video">Video:</label>
                                <input type="file" class="form-group" name="video">

                            </div>

                            <button type="submit" class="form-group btn col-md-6 btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection