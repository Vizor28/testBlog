<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = array();
        $result['categories'] = Category::all();
//        dd($result);
        return view('category.index', array('result' => $result));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $result = array(
            'name' => $request->old('name'),
            'description' => $request->old('description'),
            'url' => url('/category/store')
        );
        return view('category.edit', array('result' => $result));
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
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'string|nullable',
        ]);

        $cat = $category->create($validatedData);

        return redirect('/category/'.$cat->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, $id)
    {
        //
        $result = array(
            'category' => $category->find($id),
        );

        return view('category.show', array('result' => $result));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Category $category, $id)
    {

        $cat = $category->find($id);

        $result = array(
            'name' => $cat->name,
            'description' => $cat->description,
            'id' => $id,
            'url' => url('/category/update')
        );
        return view('category.edit', array('result' => $result));

//        dd($category->find($id)->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'string|nullable',
            'id' => 'required|int',
        ]);

        $cat = $category->find($validatedData['id'])->update($validatedData);

        return redirect('/category/'. $validatedData['id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        //
        $category = $category->find($id);

        foreach($category->posts as $post){

            $post->comments()->delete();

            if(!empty($post->file)){

                Storage::delete($post->file);

            }

        }

        $category->posts()->delete();
        $category->comments()->delete();

        $category->delete();


        return redirect('/');
    }
}
