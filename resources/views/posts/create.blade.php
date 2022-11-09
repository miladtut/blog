@extends('layouts.app')
@section('title','new post')
@section('content')

    <form action="{{route ('posts.create')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">title</label>
            <input type="text" value="{{old ('title')}}" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Content</label>
            <textarea name="content" class="form-control" id="exampleInputPassword1">{{old ('content')}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">image</label>
            <input type="file" name="image" class="form-control"/>
        </div>
        <button type="submit" class="btn btn-primary">save</button>
    </form>
@endsection
