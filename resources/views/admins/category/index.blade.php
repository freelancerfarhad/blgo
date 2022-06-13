

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
            <h1>Catagory Table</h1>

            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
            {{session()->get('success')}}
            
            </div>
            @endif
          </div>
       
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Catagory</li>
            </ol>
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
                  <h3 class="card-title">All Catagory</h3>
                     </div>
              <!-- /.card-header -->
                  <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($category as $key=>$row)
                      <tr>
                        <td>{{++$key}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->description}}</td>
                        <td>
                            <div class="actions">
                              <a href="{{route('category.edit',$row->id)}}"class="btn btn-sm btn-info">Edit</a>
                            {{-- <a href="{{route('category.destroy',$row->id)}}"class="btn btn-sm btn-danger delete">Delete</a> --}}
                               <form action="{{route('category.destroy',$row->id)}}" method="post">
                              @csrf
                              @method('delete')
                              <button type="submit"class="btn btn-sm btn-danger">delete</button>
                          </form>
                            </div>
                        </td>
                      </tr>
                         @endforeach
                </table>
                        
                </div>
            </div>
        </div>
      
   
    </div><!-- /.container-fluid --> 
</section>    



  @endsection