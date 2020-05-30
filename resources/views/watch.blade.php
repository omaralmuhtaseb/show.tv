@extends(('layouts.app'))

@section('content')
    <link href="https://vjs.zencdn.net/7.7.6/video-js.css" rel="stylesheet" />
    <!-- Video.js base CSS -->
    <link
            href="https://unpkg.com/video.js@7/dist/video-js.min.css"
            rel="stylesheet"
    />

    <!-- City -->
    <link
            href="https://unpkg.com/@videojs/themes@1/dist/city/index.css"
            rel="stylesheet"
    />



    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">{{$episode->title}}</div>

                    <div class="card-body">

                        <div class="col-sm">

                            <div class="card " style="max-width: 18rem;">
                                <video
                                        id="my-video"
                                        class="video-js vjs-theme-city"
                                        controls controlsList="nodownload"
                                        preload="auto"
                                        width="640"
                                        height="auto"
                                        poster="{{url($episode->thumbnail)}}"
                                        data-setup="{}"
                                >
                                    <source src="{{url($episode->video)}}" type="video/mp4" />
                                    <source src="{{url($episode->video)}}" type="video/webm" />
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a
                                        web browser that
                                        <a href="https://videojs.com/html5-video-support/" target="_blank"
                                        >supports HTML5 video</a
                                        >
                                    </p>
                                </video>


                            </div>
                        </div>
                </div>
            </div>
                <form method="post" action="{{route('episode.dislike',['id'=>$episode->id])}}">
                    @csrf

                    <button type="submit" style="border: 0; background: none;">
                        <i style="color: #0056b3; font-size: 50px" class="fa fa-thumbs-down" aria-hidden="true"></i>
                    </button>
                    {{$episode->dislike}}

                </form>

            </div>
        </div>
    </div>
@endsection









<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<script src="https://vjs.zencdn.net/7.7.6/video.js"></script>


