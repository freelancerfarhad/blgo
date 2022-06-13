<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use File;
class PostController extends Controller
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
        $posts=Post::all();
        return view('admins.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        $tags=Tag::all();
        return view('admins.posts.create',compact('category','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:4|max:100',
            'body' => 'required',
            'thumbnail' => 'required|mimes:jpg,bmp,png',
            'tag_id'=>'exists:tags,id',
            'category_id' => 'required'
        ]);
        
        $tag_ids=$request->tag_id;
        $tags=Tag::find($tag_ids);
       $post= $request->user()->posts()->create($request->except('_token','tag_id'));
        // $post=Post::create($request->except('_token','tag_id'));
        if($request->hasFile('thumbnail')){

           $ext= $request->file('thumbnail')->getClientOriginalExtension();

           $file_path=$post->title.'.'.$ext;

           $request->file('thumbnail')->move('public/uploads/',$file_path);

           $post->update([
               'thumbnail'=>$file_path
           ]);

        }
       
        $post->tags()->attach($tags);

        $notification=array('messege'=>'Posts inserted !', 'alert-type'=>'success');
        return redirect()->to('admins/posts')->with($notification);

     
        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $category=Category::all();
        $tags=Tag::all();
        
        return view('admins.posts.edit',compact('category','post','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required|min:10',
            'category_id'=>'required|exists:categories,id',
            'thumbnail'=>'required|mimes:jpg,jpeg ,png'
        ]);
     
         
           $tag_ids=$request->tag_id;
        $tags=Tag::find($tag_ids);

        $post->update($validated);
       
        if($request->hasFile('thumbnail')){
            if(File::exists("public/uploads/$post->thumbnail")){
                File::delete("public/uploads/$post->thumbnail");
            }

            $ext= $request->file('thumbnail')->getClientOriginalExtension();
 
            $file_path=$post->title.'.'.$ext;
 
            $request->file('thumbnail')->move('public/uploads/',$file_path);
 
            $post->update([
                'thumbnail'=>$file_path
            ]);
 
         }

        $post->tags()->sync($tags);

        $notification=array('messege'=>'Posts Updated !', 'alert-type'=>'success');
        return redirect()->to('admins/posts')->with($notification);
    }

    public function approves(Post $post)
    {
        $post->update([
            'status'=> ($post->status==1)?0:1
        ]);
        $notification=array('messege'=>'Posts approved !', 'alert-type'=>'success');
        return redirect()->to('admins/posts')->with($notification);
    }

    
    /**
     * 
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        $post=Post::find($id);
        if(File::exists($post->thumbnail)){
           File::delete($post->thumbnail);
        }
        $post->delete();
        $notification=array('messege'=>'Posts deleted !', 'alert-type'=>'success');
        return redirect()->to('admins/posts')->with($notification);
    }
    //__admin_profile__//
    public function profile()
    {
        $users=auth()->user();
        return view('admins.profile.index',compact('users'));
    }

    //__admin_profile_create__//
    public function profilecreate()
    {
        $users=auth()->user();
        return view('admins.profile.create',compact('users'));
    }

    //__admin_profile_update__//
    public function profilestore(Request $request)
    {
        $valodator=$request->validate([
            'name' => ['required', 'string', 'max:255'],
            'date_of_birth'=>'required|date',
            'profile_pic'=>'mimes:jpg,png'
        ]);
        $user=auth()->user();
        $user->name=$request->input('name');
        $user->date_of_birth=$request->input('date_of_birth');
        

        if($request->hasFile('profile_pic')){
         

                $ext= $request->file('profile_pic')->getClientOriginalExtension();
     
                $file_path=$user->id.'.'.$ext;
     
                $request->file('profile_pic')->move('public/profiles/',$file_path);
     
                $user->profile_pic = $file_path;
        }
        $user->save();
        
        $notification=array('messege'=>'Profile Updated !', 'alert-type'=>'success');
        return redirect()->to('admins/profile')->with($notification);
    }
}
