<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags=Tag::all();
        return view('admins.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $validated = request()->validate([
            'name' => 'required|min:2|max:12',
            'description' => ''
        ]);
        Tag::create($validated);
        $notification=array('messege'=>'tags created !', 'alert-type'=>'success');
        return redirect()->to('/admins/tags')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admins.tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTagRequest  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Tag $tag)
    {
        $validated = request()->validate([
            'name' => 'required|min:2|max:100',
            'description' => 'required|min:10',
        ]);
        $tag->update($validated);
        $notification=array('messege'=>'Tags updated !', 'alert-type'=>'success');
        return redirect()->to('/admins/tags')->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        $notification=array('messege'=>'Tags Deleted !', 'alert-type'=>'success');
        return redirect()->to('/admins/tags')->with($notification);
    }
}
