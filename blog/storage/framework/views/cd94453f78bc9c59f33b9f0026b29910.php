  
  <?php $__env->startSection('content'); ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                          <h1 class="m-0">Редактирование поста</h1>
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

                      <div class="col-12">
                          <form action="<?php echo e(route('admin.post.update', $post->id)); ?>" method="POST" enctype="multipart/form-data">
                              <?php echo csrf_field(); ?>
                              <?php echo method_field('PATCH'); ?>
                              <div class="form-group w-25">
                                  <input type="text" class="form-control" name="title" placeholder="Название поста"
                                      value="<?php echo e($post->title); ?>">
                                  <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                      <div class="text-danger">Это поле небходимо заполнить</div>
                                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>

                              <div class="form-group w-50">
                                  <label>Категория</label>
                                  <select name="category_id" class="form-control" data-placeholder="Выберите категорию">
                                      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($category->id); ?>"
                                              <?php echo e($category->id == $post->category_id ? ' selected' : ''); ?>>
                                              <?php echo e($category->title); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                              </div>

                              <div class="form-group w-50">
                                  <label>Тэги</label>
                                  <select class="select2" name="tag_ids[]" multiple="multiple"
                                      data-placeholder="Выберите тэги" style="width: 100%;">
                                      <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option
                                              <?php echo e(is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : ''); ?>

                                              value="<?php echo e($tag->id); ?>"><?php echo e($tag->title); ?>

                                          </option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                              </div>

                              <div class="form-group">
                                  <textarea id="summernote" name="content"> <?php echo e($post->content); ?></textarea>
                                  <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                      <div class="text-danger">Это поле небходимо заполнить</div>
                                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>

                              <div class="form-group w-50">
                                  <label for="exampleInputFile">Добавить привью</label>
                                  <div class="w-50 mb-2">
                                    <img src="<?php echo e(url('storage/' . $post->preview_image)); ?>" alt="preview_image" class="w-50">
                                  </div>
                                  <div class="input-group">
                                      <div class="custom-file">
                                          <input type="file" class="custom-file-input" name="preview_image">
                                          <label class="custom-file-label">Выберете изображение</label>
                                      </div>
                                      <div class="input-group-append">
                                          <span class="input-group-text">Загрузка</span>
                                      </div>
                                  </div>
                                  <?php $__errorArgs = ['preview_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                      <div class="text-danger">Это поле небходимо заполнить</div>
                                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>

                              <div class="form-group w-50">
                                  <label for="exampleInputFile">Добавить главное изображение</label>
                                  <div class="w-50 mb-2">
                                    <img src="<?php echo e(url('storage/' . $post->main_image)); ?>" alt="main_image" class="w-50">
                                  </div>
                                  <div class="input-group">
                                      <div class="custom-file">
                                          <input type="file" class="custom-file-input" name="main_image">
                                          <label class="custom-file-label">Выберете изображение</label>
                                      </div>
                                      <div class="input-group-append">
                                          <span class="input-group-text">Загрузка</span>
                                      </div>
                                  </div>
                                  <?php $__errorArgs = ['main_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                      <div class="text-danger">Это поле небходимо заполнить</div>
                                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>

                              <div class="form-group">
                                  <input type="submit" class="btn btn-primary" value="Обновить">
                              </div>
                          </form>
                      </div>

                  </div>
                  <!-- /.row -->
              </div><!-- /.container-fluid -->
          </section>
          <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\study\travel_helper\blog\resources\views/admin/post/edit.blade.php ENDPATH**/ ?>