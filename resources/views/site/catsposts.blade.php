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
                  <div class="post-img"><img src='{{asset("public/uploads/$post->thumbnail")}}' alt=""style="width:0%;"></div>
                  <div class="post-main-info">
                   <a href="{{route('page.show',$post->id)}}"> <p class="post-title">{{$post->title}}</p></a>
                 
                    <p>{!!$post->body!!}</p>
                    {{-- <a href="./single-post.html" class="main-button">Read More</a> --}}
                    <div class="post-meta">
                        <span><i class="far fa-user"></i> {{$post->owners->name}} </span>
                        <span><i class="far fa-calendar"></i> {{$post->created_at->diffForHumans()}}</span>
                        <span><i class="fa-solid fa-thumbs-up"></i> ({{$post->likes->count()}}) likes</span>
                       <a href=""style="text-decoration:none;color: #665f5f;"> <span><i class="far fa-comment-alt"></i>  ({{$post->comments->count()}}) comments</span></a>
                        <span><i class="fa-solid fa-eye"></i> 0 view</span>
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
                    <h5><span><a href="{{route('posts.category',$category->id)}}"style="text-decoration: none; color: #3c3a3a; font-weight: 600;"><i class="far fa-user"></i> {{$category->name}}</a></span>
                      <i style="float: right;color:#746d6d;">({{$category->posts->count()}})</i>
                    </h5>
                  </div>

                  @endforeach
                </div>
               
            </div>
              {{-- <div class="recent-posts pt-5">
                <h4 class="mb-3">RECENT POSTS</h4>
                <div class="post-item">
                  <a href="simple-post.html" class="post-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                  <div class="post-meta">
                    <span><i class="far fa-user"></i> Posted by someone</span><span><i class="far fa-calendar"></i> 30 07 2021</span><span><i class="far fa-comment-alt"></i> 0 comments</span>
                  </div>
                  <p class="post-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt perspiciatis ex ipsam similique blanditiis. Culpa hic quia...</p>
                </div>
                <div class="post-item">
                  <a href="simple-post.html" class="post-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                  <div class="post-meta">
                    <span><i class="far fa-user"></i> Posted by someone</span><span><i class="far fa-calendar"></i> 30 07 2021</span><span><i class="far fa-comment-alt"></i> 0 comments</span>
                  </div>
                  <p class="post-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt perspiciatis ex ipsam similique blanditiis. Culpa hic quia...</p>
                </div>
                <div class="post-item">
                  <a href="simple-post.html" class="post-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                  <div class="post-meta">
                    <span><i class="far fa-user"></i> Posted by someone</span><span><i class="far fa-calendar"></i> 30 07 2021</span><span><i class="far fa-comment-alt"></i> 0 comments</span>
                  </div>
                  <p class="post-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt perspiciatis ex ipsam similique blanditiis. Culpa hic quia...</p>
                </div>
                <a class="main-button">View all posts</a>
                <div class="popular pt-5">
                  <h4 class="mb-3">READ MOST POPULAR ARTICLES</h4>
                  <div class="card bg-dark text-white">
                    <img src="./img/architecture-1857175_1920.jpg" class="card-img" alt="...">
                    <div class="card-img-overlay p-3">
                      <div class="text-overlay">
                      <h5 class="card-title text-uppercase">Lorem, ipsum dolor sit amet consectetur </h5>
                      <div class="line"></div>
                      <div class="card-text article-meta">
                        <span><i class="far fa-user"></i> Posted by someone </span><span><i class="far fa-calendar"></i> 30 07 2021</span><span><i class="far fa-comment-alt"></i> 300 comments</span>
                      </div>
                      <button class="card-button">Read article</button>
                      </div>
                    </div>
                  </div>
                  <div class="card bg-dark text-white">
                    <img src="./img/castle-1998435_1920.jpg" class="card-img" alt="...">
                    <div class="card-img-overlay p-3">
                      <div class="text-overlay">
                      <h5 class="card-title text-uppercase">Lorem, ipsum dolor sit amet consectetur </h5>
                      <div class="line"></div>
                      <div class="card-text article-meta">
                        <span><i class="far fa-user"></i> Posted by someone </span><span><i class="far fa-calendar"></i> 30 07 2021</span><span><i class="far fa-comment-alt"></i> 300 comments</span>
                      </div>
                      <button class="card-button">Read article</button>
                      </div>
                    </div>
                  </div>
                  <div class="card bg-dark text-white">
                    <img src="./img/staircase-274614_1920.jpg" class="card-img" alt="...">
                    <div class="card-img-overlay p-3">
                      <div class="text-overlay">
                      <h5 class="card-title text-uppercase">Lorem, ipsum dolor sit amet consectetur </h5>
                      <div class="line"></div>
                      <div class="card-text article-meta">
                        <span><i class="far fa-user"></i> Posted by someone </span><span><i class="far fa-calendar"></i> 30 07 2021</span><span><i class="far fa-comment-alt"></i> 300 comments</span>
                      </div>
                      <button class="card-button">Read article</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

             --}}
            </div>
          </div>
        </div>   

@endsection