@extends('layouts.app')
@section('title','posts list')
@section('content')
    <div class="raw">
        <div class="col col-12 m-2">
            <a href="{{route ('posts.create')}}" class="btn btn-primary">
                new post
            </a>
            @if(request ()->get ('show_deleted') == '1')
                <a href="{{route ('posts',['show_deleted'=>false])}}" class="btn btn-secondary">
                    hide deleted
                </a>
            @else
                <a href="{{route ('posts',['show_deleted'=>true])}}" class="btn btn-warning">
                    show deleted
                </a>
            @endif
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">author</th>
            <th scope="col">image</th>
            <th scope="col">actions</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($posts) && count ($posts) > 0)
            @foreach($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->authorName()}}</td>
                <td><img src="{{$post->image}}" width="100"></td>
                <td>
                    <a class="btn btn-secondary btn-sm" href="{{route ('posts.show',$post->id)}}">show</a>
                    <a class="btn btn-primary btn-sm" href="{{route ('posts.edit',$post->id)}}">edit</a>
                    @if($post->deleted_at)
                        <a class="btn btn-warning btn-sm" href="{{route ('posts.restore',$post->id)}}">restore</a>
                        <a class="btn btn-danger btn-sm" href="{{route ('posts.destroy',$post->id)}}">destroy</a>
                    @else
                        <a class="btn btn-danger btn-sm" href="{{route ('posts.delete',$post->id)}}">delete</a>
                    @endif
                </td>
            </tr>
            @endforeach
        @else
            <div class="alert alert-warning text-center">no posts found</div>
        @endif

        </tbody>
    </table>
@endsection
