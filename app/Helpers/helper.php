<?php


function isFollowing($user_id ,$series_id){
    if (\App\FollowSeries::where('user_id',$user_id) &&
        \App\FollowSeries::where('series_id',$series_id)->exists()){
        return 'Following';
    }
    else{
        return 'Follow';

    }
}