<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = Category::with('posts')->get();
        return view('admin.category')->with('categories',$cat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category' => ['required', 'string', 'max:255','unique:categories'],
        ]);
        $cat = new Category;
        $cat->category = $data['category'];
        $cat->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $id)
    {
        $category = $id->update($request->all());
        return response()->json($category,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $id)
    {
        $posts = Post::all()->where('category_id',$id->id);
        foreach ($posts as $post ) {
           $post->delete();
        }
        
        $id->delete();
        return redirect()->back();
    }

    public function showme($id)
    {
        $categories = Category::findOrFail($id);

        return view('category.detail')->with('categories',$categories);
    }


}
