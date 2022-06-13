

@extends('layouts.app')

@section('content')
    


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper iframe-mode bg-dark" data-widget="iframe" data-auto-dark-mode="true" data-loading-screen="750">
    <div class="nav navbar navbar-expand-lg navbar-dark border-bottom border-dark p-0">
      {{-- <a class="nav-link bg-danger" href="#" data-widget="iframe-close">Close</a>
      <a class="nav-link bg-dark" href="#" data-widget="iframe-scrollleft"><i class="fas fa-angle-double-left"></i></a>
      <ul class="navbar-nav" role="tablist">
      </ul>
      <a class="nav-link bg-dark" href="#" data-widget="iframe-scrollright"><i class="fas fa-angle-double-right"></i></a>
      <a class="nav-link bg-dark" href="#" data-widget="iframe-fullscreen"><i class="fas fa-expand"></i></a> --}}
      <h3>Profile Edit Table</h3>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
    
                       
                    
                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                    {{session()->get('success')}}
                    </div>
                    @endif
    
                    <div class="card-body mt-5">
                          <form action="{{route('profile.update')}}"method="POST"enctype="multipart/form-data">
                              @csrf
                                <div class="mb-3">
                                    <label style="color:#5e5e5e"for="exampleInputname" class="form-label"> Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputname" placeholder="Write your  Name"name="name"value="{{old('name')? old('name'):$users->name}}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label style="color:#5e5e5e"for="email" class="form-label"> Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Write your  Email"name="email"value="{{old('email')? old('email'):$users->email}}"disabled>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label style="color:#5e5e5e"for="profile_pic" class="form-label"> date_of_birth</label>
                                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" placeholder="Write your  date_of_birth"name="date_of_birth"value="{{old('date_of_birth')? old('date_of_birth'):$users->date_of_birth}}">
                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label style="color:#5e5e5e"for="profile_pic" class="form-label"> profile_pic</label>
                                    @if($users->profile_pic)
                                    <img src='{{asset("public/profiles/$users->profile_pic")}}' alt="profile_pic"widht="80"height="80">
                                    @else
                                    <img src='{{asset("public/profiles/avatar5.png")}}' alt="profile_pic"widht="80"height="80">
                                    @endif
                                    <input type="file" class="form-control @error('profile_pic') is-invalid @enderror" id="profile_pic" placeholder="Write your  profile_pic"name="profile_pic">
                                    @error('profile_pic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- <div class="mb-3">
                                    <label style="color:#5e5e5e"for="category_description" class="form-label">Short Details</label>
                                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="category_description" placeholder="Write your Catagory Name"name="description">
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}
                              
                                <button type="submit" class="btn btn-success">Profile Update</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  @endsection