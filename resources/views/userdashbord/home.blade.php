@extends('layoutusers.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper iframe-mode bg-dark" data-widget="iframe" data-auto-dark-mode="true" data-loading-screen="750">
    <div class="nav navbar navbar-expand-lg navbar-dark border-bottom border-dark p-0">
      <h3>Dashboard</h3>
    </div>

    <div class="tab-content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-gradient-info">
            <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">All Posts</span>
              <span class="info-box-number">{{$users->posts->count()}}</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                70% Increase in 30 Days
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        {{-- <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-gradient-success">
            <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number"></span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                70% Increase in 30 Days
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div> --}}
        <!-- /.col -->
        {{-- <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-gradient-warning">
            <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">All Users</span>
              <span class="info-box-number"></span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                70% Increase in 30 Days
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div> --}}
        <!-- /.col -->
        {{-- <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-gradient-danger">
            <span class="info-box-icon"><i class="fas fa-comments"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Comments</span>
              <span class="info-box-number"></span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                70% Increase in 30 Days
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div> --}}
        <!-- /.col -->
      </div>
        
    </div>

</div>
@endsection
