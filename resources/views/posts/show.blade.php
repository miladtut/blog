@extends('layouts.app')
@section('title','post #' . $post->id)
@section('content')
    <div class="post">
        <div class="mb-3">
            <h3>{{$post->title}}</h3>
            <hr>
            <div class="row">
                @if($post->image)
                <div class="col col-4">
                    <img width="200" src="{{$post->image}}">
                </div>
                @endif
                <div class="col col-8">
                    <p style="padding: 30px">{{$post->content}}</p>
                </div>
            </div>
            <hr>
            <span class="badge bg-secondary">author : {{$post->authorName()}}</span>
            <span class="badge bg-secondary">published : {{$post->created_at->diffForHumans()}}</span>
        </div>
        <div class="mb-3">
            <hr>
            <h5>comments</h5>
            <hr>
            @foreach($post->comments as $comment)
                <div class="comment" style="border: 1px solid lightgrey; border-radius: 15px">
                    <small class="badge bg-secondary">{{$comment->userName()}} <small>{{$comment->created_at->diffForHumans()}}</small></small>
                    <p>
                        {{$comment->content}}
                    </p>
                </div>
            @endforeach
            <hr>
            <div>
                <form action="{{route ('posts.comments.create')}}" method="post">
                    @csrf
                    <input type="text" value="{{old ('content')}}"  name="content" class="form-control mb-5">
                    <input type="hidden" value="{{$post->id}}"  name="post_id" class="form-control mb-5">
                    <button type="submit" class="btn btn-secondary btn-sm">send</button>
                </form>
            </div>
        </div>
    </div>
@endsection
