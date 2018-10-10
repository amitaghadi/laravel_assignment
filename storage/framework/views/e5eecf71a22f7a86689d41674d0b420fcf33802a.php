<html>
   <body>
   	<?php if($errors->any()): ?>
          <div class="alert alert-danger">
              <ul>
                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><?php echo e($error); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
          </div><br />
      <?php endif; ?>
   		<?php echo e(csrf_field()); ?>

      <?php
         /*echo Form::open(array('url' => '/uploadfile','files'=>'true'));
         echo 'Select the file to upload.';
         echo Form::file('image');
         echo Form::submit('Upload File');
         echo Form::close();*/
      ?>
      <form action="/laravel/public/uploadfile" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
      	<input type="file" name="resume_path" >
      	<input type="submit" value="Upload File">
      </form>

   </body>
</html>