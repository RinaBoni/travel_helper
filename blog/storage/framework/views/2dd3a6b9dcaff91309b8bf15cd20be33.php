  
  <?php $__env->startSection('content'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 d-flex align-items-center">
            <h1 class="m-0 mr-2"><?php echo e($post->title); ?></h1>
            <a class="m-0 mr-2" href="<?php echo e(route('admin.post.edit', $post->id)); ?>"><i class="fa-solid fa-pen" style="color: #1b3f7e;"></i></a>
            <form class="m-0 mr-2" action="<?php echo e(route('admin.post.delete', $post->id)); ?>", method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="border-0 bg-transparent">
                  <i class="fa-solid fa-trash-can" style="color: #1b3f7e;"></i>
                </button>

            </form>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">
            <div class="col-6">

              <div class="card">
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <tbody>
                        <tr>
                          <td>ID</td>
                          <td><?php echo e($post->id); ?></td>
                        </tr>
                        <tr>
                          <td>Название</td>
                          <td><?php echo e($post->title); ?></td>
                        </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\study\travel_helper\blog\resources\views/admin/post/show.blade.php ENDPATH**/ ?>