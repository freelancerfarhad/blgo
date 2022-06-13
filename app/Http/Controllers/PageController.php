<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Tag;
use Session;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::where('status',1)->paginate(5);
        // $category=Category::all();
        return view('site.index',compact('posts',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoryshow(Category $category)
    {
         // $posts=$category->posts()->paginate(5);
         $posts=$category->posts()->where('status',1)->paginate(8);
          $category=Category::all();
         return view('site.catsposts',compact('posts','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if(auth()->check())
        {
        if(!$post->status && auth()->user()->user_type !='admin')return back();//kono user approve chara kono post a jaite parbe na and admin all pare
    }else{
        if(!$post->status)return back();
    
    }
    $blogkey='blog_'.$post->id;
    if(!session::has($blogkey)){
        $post->increment('view_count');
        session::put($blogkey,1);
    }
        return view('site.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
