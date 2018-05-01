<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $cat_id)
    {
        //
        $result = array(
            'name' => $request->old('name'),
            'content' => $request->old('content'),
            'url' => url('/post/store'),
            'category_id' => $cat_id
        );
        return view('post.edit', array('result' => $result));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        //
        //
        $validatedData = $request->validate([
            'name' => 'required|string',
            'content' => 'string|required',
            'f' => 'nullable|file|max:2048',
            'category_id' => 'required|int',
        ]);


        $validatedData['file'] = '';
        if(isset($validatedData['f'])){

            $folder = 'posts/'.substr($validatedData['f']->hashName(),0,3);
            $validatedData['file'] = $validatedData['f']->store($folder);

        }

        $post = $category->find($validatedData['category_id'])->posts()->create ($validatedData);

        return redirect('/post/'. $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, $id)
    {
        //
        $result = array(
            'post' => $post->find($id),
        );

        return view('post.show', array('result' => $result));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Post $post, $id)
    {
        //
        $p = $post->find($id);

        $result = array(
            'name' => $p->name,
            'content' => $p->content,
            'id' => $id,
            'url' => url('/post/update')
        );
        return view('post.edit', array('result' => $result));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|string',
            'content' => 'string|required',
            'f' => 'nullable|file|max:2048',
            'id' => 'required|int',
        ]);

        $p = $post->find($validatedData['id']);

        if(isset($validatedData['f'])){

            if(!empty($p->file)){

                Storage::delete($p->file);

            }

            $folder = 'posts/'.substr($validatedData['f']->hashName(),0,3);
            $validatedData['file'] = $validatedData['f']->store($folder);

        }

        $p->update($validatedData);

        return redirect('/post/'. $p->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, $id)
    {
        //
        $post = $post->find($id);
        $cat_id = $post->category_id;

        if(!empty($post->file)){

            Storage::delete($post->file);

        }

        $post->comments()->delete();
        $post->delete();

        return redirect('/category/'.$cat_id);

    }
}
