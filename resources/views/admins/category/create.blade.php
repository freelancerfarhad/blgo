

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
      <h3>Category Table</h3>
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
                          <form action="{{route('category.store')}}"method="POST">
                              @csrf
                                <div class="mb-3">
                                    <label style="color:#5e5e5e"for="exampleInputname" class="form-label">Catagory Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputname" placeholder="Write your Catagory Name"name="name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label style="color:#5e5e5e"for="category_description" class="form-label">Short Details</label>
                                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="category_description" placeholder="Write your Catagory Name"name="description">
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                              
                                <button type="submit" class="btn btn-success">Add Catagory</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  @endsection