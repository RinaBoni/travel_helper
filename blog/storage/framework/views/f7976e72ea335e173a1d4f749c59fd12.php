<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo e(asset ('plugins/select2/css/select2.min.css')); ?> ">
  <link rel="stylesheet" href="<?php echo e(asset ('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?> ">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="<?php echo e(asset ('plugins/fontawesome-free/css/all.min.css')); ?> "> -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo e(asset ('plugins/jqvmap/jqvmap.min.css')); ?> ">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset ('dist/css/adminlte.min.css')); ?> ">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo e(asset ('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?> ">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo e(asset ('plugins/daterangepicker/daterangepicker.css')); ?> ">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo e(asset ('plugins/summernote/summernote-bs4.min.css')); ?> ">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo e(asset ('dist/img/AdminLTELogo.png')); ?> " alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>


  </nav>
  <!-- /.navbar -->



  <?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->yieldContent('content'); ?>

  <footer class="main-footer">
    <strong>Travel</strong>
    <div class="float-right d-none d-sm-inline-block">
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<script src="<?php echo e(asset ('plugins/jquery/jquery.min.js')); ?> "></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(asset ('plugins/jquery-ui/jquery-ui.min.js')); ?> "></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset ('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?> "></script>
<script src="<?php echo e(asset ('plugins/select2/js/select2.full.min.js')); ?> "></script>
<script src="https://kit.fontawesome.com/b28275dfc4.js" crossorigin="anonymous"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo e(asset ('plugins/jquery-knob/jquery.knob.min.js')); ?> "></script>
<!-- daterangepicker -->
<script src="<?php echo e(asset ('plugins/moment/moment.min.js')); ?> "></script>
<script src="<?php echo e(asset ('plugins/daterangepicker/daterangepicker.js')); ?> "></script>
<script src="<?php echo e(asset ('plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?> "></script>

<!-- Summernote -->
<script src="<?php echo e(asset ('plugins/summernote/summernote-bs4.min.js')); ?> "></script>
<!-- overlayScrollbars -->
<script src="<?php echo e(asset ('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?> "></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset ('dist/js/adminlte.js')); ?> "></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset ('dist/js/demo.js')); ?> "></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo e(asset ('dist/js/pages/dashboard.js')); ?> "></script>



<!-- //подключаем ввод текста -->
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
    });
    //прикрепление фотографии
    $(function () {
        bsCustomFileInput.init();
    });
    //селект для тэгов
    $('.select2').select2()
</script>

<!-- //чтобы в поле прикрепления окна на кнопке были три точки -->
<style>
    .custom-file-input:lang(en)~.custom-file-label::after{
        content: "...";
    }
</style>

</body>
</html>
<?php /**PATH C:\study\travel_helper\blog\resources\views/admin/layouts/main.blade.php ENDPATH**/ ?>