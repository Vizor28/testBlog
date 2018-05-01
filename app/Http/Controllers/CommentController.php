<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Comment $comment, Category $category, Post $post)
    {
        $validatedData = $request->validate([
            'author' => 'required|string|regex:#^(?:[A-ZА-Я][a-zа-я]{1,12}\s?){2}$#',
            'content' => 'string|required',
            'type' => 'required|string',
            'id' => 'required|int',
        ]);

        $class = false;
        switch($validatedData['type']){
            case 'category':
                $class = $category->find($validatedData['id']);
                break;
            case 'post':
                $class = $post->find($validatedData['id']);
                break;
        }

        if($class){

            $comment->fill($validatedData);
            $class->comments()->save($comment);

        }

        return view('comment.one',['comment' => $comment]);

    }
}
