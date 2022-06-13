<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use File;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //__user dashboard__///
    public function index()
    {
        $users=auth()->user();
        return view('userdashbord.home',compact('users'));
    }

    //__user dashboard_post_create__///
    public function create()
    {
        $category=Category::all();
        $tags=Tag::all();
        return view('userdashbord.posts.create',compact('category','tags'));
    }

      //__user dashboard_post_store__///
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
        return redirect()->back()->with($notification);

     
    }

      //__user dashboard_post_index__///
    public function postindex()
    {
        $users=auth()->user();
        // $posts=Post::all();
        return view('userdashbord.posts.index',compact('users'));
    }

      //__user dashboard_post_edit__///
    public function edit(Post $post)
    {
        $category=Category::all();
        $tags=Tag::all();
        
        return view('userdashbord.posts.edit',compact('category','post','tags'));
    }

      //__user dashboard_post_update__///
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
        return redirect()->to('users/posts')->with($notification);
    }

    //__user_dashboard_post_delete__//
    public function destroy($id)
    {
        $post=Post::find($id);
        if(File::exists($post->thumbnail)){
           File::delete($post->thumbnail);
        }
        $post->delete();
        $notification=array('messege'=>'Posts deleted !', 'alert-type'=>'success');
        return redirect()->to('users/posts')->with($notification);
    }


    //__user profile__//

   public function profile()
   {
       $users=auth()->user();
       return view('userdashbord.profile.index',compact('users'));
   }
    //__user profile_create__//
    public function profilecreate()
    {
         $users=auth()->user();
       return view('userdashbord.profile.create',compact('users'));
    }
//__user_profile_update__//
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
        return redirect()->to('home/profile')->with($notification);
    }
}
