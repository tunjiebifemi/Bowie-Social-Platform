@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <h1><b>Revise Posts({{count($posts)}})</b></h1>
                    @if(count($posts) < 1)
                        <h4 class="text-center">You do not have blog posts that needs revision</h4>
                    @endif
            </div>           
            <div class="text-center mb-3">
                <a href="{{ route('createPosts') }}"><button class="btn btn-warning" type="submit">Create Posts</button></a>
            </div>
            @foreach($posts as $post)
                <div class="card mb-5">
                    <img height="400" src="{{asset($post->image)}}" class="card-img-top" alt="Blog Image">                   
                    <div class="card-body">
                    <h5 class="card-title"><b>{{$post->title}}</b></h5>
                    <p class="card-text">{{ str_limit($post->body, 12) }}</p>
                    <p class="card-text"><small class="text-muted">Author: {{$post->author}}</small></p>
                    <p class="card-text"><small class="text-muted">Department: {{$post->department}}</small></p>
                    <p class="card-text"><small class="text-muted">Status: 
                        @if($post->approved)
                        Approved
                        @elseif($post->pending)
                        Pending
                        @elseif($post->revise)
                        Awaiting Revision
                        @elseif($post->reject)
                        Rejected
                        @endif</small>
                    </p>
                    <p class="card-text"><small class="text-muted">Revision Reason: {{$post->revise_reason}}</small></p>
                    </div>                    
                    <div class="text-center mb-3 mt-3">
                        <a href="{{route('blogDetails', $post->slug)}}"><button class="btn btn-success" type="submit">View Post</button></a>                            
                        <a href="{{route('editMyPost', $post->slug)}}"><button class="btn btn-warning" type="submit">Edit</button></a>
                        <a href="{{route('deleteMyPost', $post->id)}}"><button class="btn btn-danger" type="submit">Delete</button></a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
