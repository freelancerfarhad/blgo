@extends('layouts.app')

@section('styles')
<style>
  .actions a {margin: 0px -46px;float: left;}
</style>  
@endsection
@section('content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profiles Table</h1>

            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
            {{session()->get('success')}}
            
            </div>
            @endif
          </div>
       
        </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
             <div class="card">
                <div class="card-header">
                    <div class="card-header">
                        @if($users->profile_pic)
                            <img src='{{asset("profiles/$users->profile_pic")}}'class="" alt="profiles"style="width:215px;height:215px;">
                       @else
                        <img src='{{asset("profiles/avatar5.png")}}'class="" alt="profiles"style="width:215px;height:215px;">
                        @endif
                    </div>
                     </div>
                  <div class="card-body">
                    <p><b>Name : </b> {{$users->name}}</p>
                    <p> Email : <b>{{$users->email}}</b></p>
                    <p> Birth Day : <b>
                        @if($users->date_of_birth)
                        {{$users->date_of_birth->format('Y-m-d')}}</b>
                        @else
                            <i>not date of birth</i>
                        @endif
                    </p>
                    <p> Signup_Date : <b>{{$users->created_at->format('Y-m-d')}}</b></p>
                      <p> Last_Active : <b>
                            @if($users->last_login)
                            {{$users->last_login->diffForHumans()}}</b>
                            @else
                                <i>not date </i>
                            @endif
                      </p>
                      <a href="{{route('profile.edit')}}"class="btn btn-sm btn-success">Update Profile</a>
                        
                </div>
            </div>
        </div>
      
   
    </div><!-- /.container-fluid --> 
</section>    




@endsection