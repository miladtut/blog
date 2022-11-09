<?php

namespace Modules\Posts\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Posts\Entities\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->show_deleted == '1'){
            $posts = Post::withTrashed ()->get ();
        }else{
            $posts = Post::all ();
        }

        return view('posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $rules = [
            'title'=>['required','unique:posts','max:200'],
            'content'=>['required','max:1000'],
        ];
        $request->validate ($rules);
        $img = null;
        if ($request->hasFile ('image')){
            $img = upload ($request->file ('image'));
        }

        $post = new Post();
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->image = $img;
        $post->author = Auth::id ();
        $post->save ();
        return redirect ()->back ()->with(['success'=>'post saved successfully']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $post = Post::findOrFail ($id);
        return view('posts.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title'=>['required',"unique:posts,title,$id",'max:200'],
            'content'=>['required','max:1000'],
        ];
        $request->validate ($rules);
        $img = null;
        if ($request->hasFile ('image')){
            $img = upload ($request->file ('image'));
        }

        $post = Post::findOrFail($id);
        $post->title = $request['title'];
        $post->content = $request['content'];
        if ($img){
            $post->image = $img;
        }
        $post->author = Auth::id ();
        $post->save ();
        return redirect ()->back ()->with(['success'=>'post saved successfully']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */

    public function delete($id){
        Post::find($id)->delete();
        return redirect ()->back ();
    }


    public function destroy($id)
    {
        $post = Post::withTrashed ()->find ($id)->forceDelete ();
        return redirect ()->back ();
    }

    public function restore($id){
        $post = Post::withTrashed ()->find ($id);
        $post->deleted_at = null;
        $post->save ();
        return redirect ()->back ();
    }
}
