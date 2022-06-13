<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams"> 
    <title>Clear blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/css/main.css')}}">
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    @yield('styles')
</head>
<body data-bs-spy="scroll" data-bs-target="#navbar-example" data-bs-offset="82">
      <header id="home">
        <nav id="#navbar" class="navbar navbar-expand-lg position-fixed top-0 w-100 py-3">
          <div class="container">
            <a class="navbar-brand" href="index.html"><img src="img/logo-blog.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="{{url('/')}}">home</a>
                <a class="nav-link" href="about.html">about</a>
                <a class="nav-link" href="contact.html">contact</a>
                <a class="nav-link" href="blog.html">Blog </a>

                @guest
                <a class="nav-link" href="{{ route('login') }}">Login</a>
                <a class="nav-link" href="{{ route('register') }}">Register</a>
                    @else
                    @if (Auth::user()->user_type=='admin')
                    <a class="nav-link" href="{{ route('admins') }}">admins</a>
                    @elseif (Auth::user()->user_type=='user')
                    <a class="nav-link" href="{{ route('home') }}">user</a>
                    @else
                    <a class="nav-link" href="{{ route('home') }}">user</a>
                    @endif
                   
                 
                @endguest
              </div>
            </div>
          </div>
        </nav>
      </header>
      <main>

        @yield('contents')
           
        <section id="subscribe" class="subscribe">
            <div class="container">
              <h2>Subscribe & Don’t Miss Out</h2>
              <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt perspiciatis ex ipsam similique blanditiis. Culpa hic quia, repellendus corrupti perspiciatis praesentium 
              </p>
              <form>
                <input type="email" class="email text-uppercase" id="exampleInputEmail1 aria-describedby="emailHelp" placeholder="Enter your email"><button type="submit" class="button-subscribe text-uppercase">subscribe</button>
              </form>
            </div>
        </section>
        </main>
        <footer class="text-center  text-uppercase py-5">
          <div class="footer-icons ">
            <a href=""><img src="img/facebook-footer.svg" alt=""></a>
            <a href=""><img src="img/instagramm-footer.svg" alt=""></a>
            <a href=""><img src="img/pinterest-footer.svg" alt=""></a>
          </div>
          <div class="copyright pt-4 text-muted text-center">
            <p>&copy; 2022 YOUR-DOMAIN | Created by <a href="https://firmbee.com/solutions/free-invoicing-app-billing-software/" title="Firmbee - Free Invoicing App" target="_blank">Firmbee.com</a> </p>
            <!--
            This template is licenced under Attribution 3.0 (CC BY 3.0 PL),
            You are free to: Share and Adapt. You must give appropriate credit, you may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.
            --> 
        </div>
        </footer>
        <div class="fb2022-copy">Fbee 2022 copyright</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
      <script src="{{asset('public/js/script.js')}}"></script>
  </body>
  </html>