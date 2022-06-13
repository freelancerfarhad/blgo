<?php

namespace App\Http\Controllers;

use App\Models\post_tag;
use App\Http\Requests\Storepost_tagRequest;
use App\Http\Requests\Updatepost_tagRequest;

class PostTagController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storepost_tagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storepost_tagRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post_tag  $post_tag
     * @return \Illuminate\Http\Response
     */
    public function show(post_tag $post_tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post_tag  $post_tag
     * @return \Illuminate\Http\Response
     */
    public function edit(post_tag $post_tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatepost_tagRequest  $request
     * @param  \App\Models\post_tag  $post_tag
     * @return \Illuminate\Http\Response
     */
    public function update(Updatepost_tagRequest $request, post_tag $post_tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post_tag  $post_tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(post_tag $post_tag)
    {
        //
    }
}
