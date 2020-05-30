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
                    <div class="card-header">Create New Series</div>

                    <div class="card-body">
                        <form action="{{route('series.store')}}" method="post" enctype="multipart/form-data">
                            @csrf




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
                                <label for="Title">Airing Time</label>
                                <div class="form-group">
                                <label for="airingtime">From</label>
                                <select class="form-control" name="airing_time_from" id="">
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

                                <input type="time" name="at_time" class="form-control" placeholder="Select time">
                            </div>
                            </div>


                            <button type="submit" class="form-group btn col-md-6 btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection