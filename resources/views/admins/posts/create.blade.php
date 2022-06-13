

@extends('layouts.app')
@section('styles')
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #3b7e07;
    }
    .ck.ck-editor__main {
    color: #302e2e;
}
    </style>
@endsection
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
      <h3>Posts Table</h3>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
    
                       
                    
                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                    {{session()->get('success')}}
                    </div>
                    @endif
    
                    <div class="card-body mt-5">
                          <form action="{{route('posts.store')}}"method="POST"enctype="multipart/form-data">
                              @csrf

                                <div class="mb-3">
                                    <label style="color:#5e5e5e"for="exampleInputname" class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputname" placeholder="Write your Catagory Name"name="title"value="{{old('title')}}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label style="color:#5e5e5e"for="category_id" class="form-label">Category</label>
                                    <select name="category_id"type="text" id="category_id"class="form-control @error('category_id') is-invalid @enderror"placeholder="catagory">
                                        <option value="">Category Selected</option>
                                   @foreach ($category as $category)
                                   <option value="{{$category->id}}">{{$category->name}}</option>
                                   @endforeach
                                    </select>
            
                                        @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                            </div>

                                <div class="mb-3">
                                    <label style="color:#5e5e5e"for="body" class="form-label"> Details</label>
                                    <textarea style="color:red;"class="form-control @error('body') is-invalid @enderror" id="body" name="body"rows="5"placeholder="Your body"value="{{old('body')}}"></textarea>
                                    @error('body')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label style="color:#5e5e5e"for="tag_id" class="form-label">Tags</label>
                                      <select id="tag_id"type="text"
                                      class="form-control  @error('tag_id') is-invalid @enderror"
                                       name="tag_id[]" placeholder="selected" multiple>
          
                                          <option></option>
                                            @foreach ($tags as $tag)
                                            <option style="color:#5e5e5e"value="{{$tag->id}}">{{$tag->name}}</option>
                                            @endforeach
                                         
                                        </select>
                                        
                                          @error('tag_id')
                                          <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                   @enderror
                            </div>

                                <div class="mb-3">
                                    <label style="color:#5e5e5e"for="thumbnail" class="form-label"> Thumbnail</label>
                                    <input type="file" 
                                    class="form-control @error('thumbnail') is-invalid @enderror"
                                     name="thumbnail"id="thumbnail">
                                    @error('thumbnail')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                              
                                <button type="submit" class="btn btn-success">Add Post</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  @endsection
  @section('scripts')



<script>
    ClassicEditor
            .create( document.querySelector( '#body' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
<script>
  $(function() {
$('#tag_id').select2({
    placeholder:"Selected Tags",
});
});
</script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#tags').select2();
});      
</script>
@endsection
