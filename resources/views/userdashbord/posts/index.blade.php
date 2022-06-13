

@extends('layoutusers.app')
@section('styles')
<style>
  /* .del a {margin: 0px -46px;float: left;} */
  .del form {
    float: right;
    width: 55%;
}
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
            <h1>Posts Table</h1>

            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
            {{session()->get('success')}}
            
            </div>
            @endif
          </div>
       
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Posts</li>
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
                  <h3 class="card-title">All Posts</h3>
                     </div>
              <!-- /.card-header -->
                  <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th scope="col"width="5%">@No</th>
                    <th scope="col"width="10%">Tile</th>
                    <th scope="col"width="20%">Description</th>
                    <th scope="col"width="10%">thumbnail</th>
                    <th scope="col"width="7%">category</th>
             
                    <th scope="col"width="10%">Time</th>
                    <th scope="col"width="25%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($users->posts as $post)
                     <tr>
                        <td>{{$loop->index}}</td>
                        <td>{{$post->title}}</td>
                        <td>{!!$post->body!!}</td>
                        <td>
                          <img src='{{asset("public/uploads/$post->thumbnail")}}' alt="post"width="50"height="50">
                        </td>
                        {{-- <td>{{@$post->status}}</td> --}}
                        <td>{{$post->category->name}}</td>
                       
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        
                        <td>
                          <div class="del">
                           
                            <a href="{{route('userposts.edit',$post->id)}}"class="btn btn-sm btn-info">edit</a> |
                            @if($post->status==1)
                            <a href="#"class="btn btn-sm btn-success text-white disabled"><i>Published</i></a> |
                         @else
                         <a href="#"class="btn btn-sm btn-secondary text-white disabled"><i>Pianding</i></a> |
                        
                         @endif
                            <form action="{{route('userposts.destroy',$post->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"class="btn btn-sm btn-danger"onclick="return confirm('Are You Sure to Delete !')">delete</button> 
                            </form>
                           
                            {{-- <a href="#"class="btn btn-sm btn-danger"onclick="return confirm('Your Not Parmite deleted !')">delete</a>  --}}
                           
                          </div>
                        </td>
                      </tr>
                     @endforeach   
                     
                  <tbody>
                </table>
                        
                </div>
            </div>
        </div>
      
   
    </div><!-- /.container-fluid --> 
</section>    



  @endsection