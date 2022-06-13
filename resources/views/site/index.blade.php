@extends('pagelayout.app')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('contents')
    

        <section class="main-slider">
          <div class="hero-img">
            <div class="hero-bg"></div>
            <div class="container">
              <div class="hero-text">
                <div class="welcome-text"><span class ="big-text">WELCOME</span><span class="small-text">TO OUR BLOG</span></div>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            </div>
            <a href="#about"><i class="fas fa-chevron-down"></i></a>
          </div>
        </section>

           <div class="container">
          <div class="row mainmargin">
            <div class="blog col-md-8">
              <div class="all-posts">
                @foreach ($posts as $post)
                    
             
                <div class="post-item"style="width:100%;">
                  <div class="post-img"><img src='{{asset("public/uploads/$post->thumbnail")}}' alt=""style="width:60%;"></div>
                  <div class="post-main-info">
                   <a href="{{route('page.show',$post->id)}}"> <p class="post-title">{{$post->title}}</p></a>
                 
                    <p>{!!$post->body!!}</p>
                    {{-- <a href="./single-post.html" class="main-button">Read More</a> --}}
                    <div class="post-meta">
                        <span><i class="far fa-user"></i> {{$post->owners->name}} </span>
                        <span><i class="far fa-calendar"></i> {{$post->created_at->diffForHumans()}}</span>
                        <span><i class="fa-solid fa-thumbs-up"></i> ({{$post->likes->count()}}) likes</span>
                       <a href=""style="text-decoration:none;color: #665f5f;"> <span><i class="far fa-comment-alt"></i>  ({{$post->comments->count()}}) comments</span></a>
                        <span><i class="fa-solid fa-eye"></i> ({{$post->view_count}}) view</span>
                      </div>
                  </div>
                </div>
                @endforeach
               
                
               
              </div>
            
            </div>
            <div class="sidebar col-md-4">
              <div class="input-group">
                <div class="form-outline">
                  <input id="search-input" type="search" id="form1" class="form-control" placeholder="search" />
                </div>
                <button id="search-button" type="button" class="btn dark">
                  <i class="fas fa-search"></i>
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


              <div class="recent-posts pt-5">
                <h4 class="mb-3">RECENT POSTS</h4>
                @foreach ($posts as $post)
                <div class="post-item">
                  <a href="{{route('page.show',$post->id)}}" class=""><img src="{{asset("public/uploads/$post->thumbnail")}}" alt="recent post_pic"style="width:50px;height:50px;"></a><br><br>
               
                  <a href="{{route('page.show',$post->id)}}"><h5 class="post-content">{{$post->title}}</h5></a>
                </div>
                @endforeach
             
            </div>

            
            </div>
          </div>
          {{ $posts->links() }}
        </div>   

@endsection