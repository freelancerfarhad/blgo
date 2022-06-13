@extends('pagelayout.app')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    nav#\#navbar {
    background: #2a2525;
}
</style>
@endsection
@section('contents')
    
<div class="container">
    <div class="row mainmargin">
      <div class="single-post col-md-8">
        <h2 class="underscore">{{$post->title}}</h2>
        
        <img src='{{asset("public/uploads/$post->thumbnail")}}' alt="picture show page"style="width:100%;padding:20px 0px;height:500px;"><br>
        <p>{!!$post->body!!}</p>
      
        <div class="line"></div>
        <div class="post-meta">
         <span><a href="{{route('likes.store',$post->id)}}"class="btn btn-sm {{$post->likeanddislikes() ? "btn-primary" : "btn-secondary"}}"><i class="fa-solid fa-thumbs-up"style="font-size:30px;"></i></a> likes ( {{$post->likes->count()}})</span>
         <span><i class="fa-solid fa-eye"></i> 
          view ( {{$post->view_count}})
         </span>
          </div>


       
            <form id="commentForm" action="{{route('comments.store',$post->id)}}" method="post">
                @csrf
          <!-- Message input -->
          <div class="mb-3">
            <label class="form-label" for="comment">Leave a Comment</label>
            <textarea name="body" id="message" placeholder="wrire your comment..."class="form-control @error('body') is-invalid @enderror"cols="50"rows="5"style=""></textarea>
           
          </div>
         
          <!-- Form submit button -->
          <div class="d-grid">
            <button class="main-button" id="submitButton" type="submit">Post Comment</button>
          </div>
        </form>
        <div class="post-meta">
            <span><i class="fa-solid fa-comments"style="font-size:20px;"></i>   comments</span>
             </div>
        @foreach ($post->comments as $comment)
        <div class="post-meta">
            <span><img src="{{asset('public/backend/dist/img/avatar.png')}}"class="" alt="author_pic"style="width:75px;height:80px;border-radius: 69px;"></span>
            <span><b>{{$comment->owners->name}} : </b></span>
            <span><i>{{$comment->body}}</i></span><span>
                <a href="{{route('commentlike.stores',$comment->id)}}"class="btn btn-sm {{$comment->likeanddislikes() ? "btn-primary" : "btn-secondary"}}"><i class="fa-solid fa-thumbs-up"style="font-size:20px;"></i></a>
                 likes ( {{$comment->likes->count()}})</span>  <span><i>{{$comment->created_at->diffForHumans()}}</i></span>
             </div>

@endforeach

      </div>
      <div class="sidebar col-md-4">
        <div class="input-group">
          <div class="form-outline">
            <input id="search-input" type="search" class="form-control" placeholder="search">
          </div>
          <button id="search-button" type="button" class="btn dark">
            <i class="fas fa-search" aria-hidden="true"></i>
          </button>
        </div>

        <div class="recent-posts pt-5">
          <h4 class="mb-3">Category</h4>
          <div class="post-item">
            @foreach ($category as $category)
            <div class="post-meta">
             <h5> <span><a href="{{route('posts.category',$category->id)}}"style="text-decoration: none; color: #3c3a3a; font-weight: 600;"><i class="far fa-user"></i> {{$category->name}}</a></span>  <i style="float: right;color:#746d6d;">({{$category->posts->count()}})</i></h5>
            
            </div>

            @endforeach
          </div>
      </div>
      {{-- <div class="recent-posts pt-5">
        <h4 class="mb-3">RECENT POSTS</h4>
        @foreach ($posts as $post)
        <div class="post-item">
          <a href="{{route('page.show',$post->id)}}" class=""><img src="{{asset("public/uploads/$post->thumbnail")}}" alt="recent post_pic"style="width:50px;height:50px;"></a><br><br>
       
          <a href="{{route('page.show',$post->id)}}"><h5 class="post-content">{{$post->title}}</h5></a>
        </div>
        @endforeach
     
    </div> --}}

      </div>
    </div>
  </div>

@endsection