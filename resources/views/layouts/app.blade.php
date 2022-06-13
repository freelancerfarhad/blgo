
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/sweetalert/sweetalert.min.css">
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/summernote/summernote-bs4.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  @yield('styles')
</head>

<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

@guest
@else
@include('layouts.partial.topbar')
@include('layouts.partial.sidebar')
@endguest



@yield('content')


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="">MF Coder</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> Update
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('public/backend')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('public/backend')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/backend')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/backend')}}/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('public/backend')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{asset('public/backend')}}/plugins/raphael/raphael.min.js"></script>
<script src="{{asset('public/backend/plugins')}}/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('public/backend')}}/plugins/chart.js/Chart.min.js"></script>
<!-- toastr -->
<script src="{{asset('public/backend')}}/plugins/toastr/toastr.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/sweetalert/sweetalert.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{asset('public/backend')}}/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/backend')}}/dist/js/pages/dashboard2.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('public/backend')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    
<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
<!-- Page specific script -->
<script src="{{asset('backend')}}/plugins/summernote/summernote-bs4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- delete-sweet -->
<script>
  $(document).on("click","delete",function(e){
    e.preventDefault();
    var link = $(this).attr("href");
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
       window.location.href=link;
        
      }else {
        swal("Your imaginary file is safe!");
      }
      
    });
  });
</script>
<!-- alert-toastr -->
<script>
  @if(Session::has('messege'));
  var type="{{Session::get('alert-type','info')}}"
  switch(type){
    case 'info':
      toastr.info("{{Session::get('messege')}}");
      break;

      case 'success':
      toastr.success("{{Session::get('messege')}}");
      break;

      case 'danger':
      toastr.danger("{{Session::get('messege')}}");
      break;

      case 'error':
      toastr.error("{{Session::get('messege')}}");
      break;
  }

@endif
</script>
<!-- admin-download -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $(function () {
    // Summernote
    $('.summernote').summernote()

  })
</script>
@yield('scripts')
</body>
</html>
