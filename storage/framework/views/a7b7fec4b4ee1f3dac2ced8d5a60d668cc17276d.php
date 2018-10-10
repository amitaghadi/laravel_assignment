<?php if(!empty($selected_users)): ?>	
	<?php $__currentLoopData = $selected_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		 	<?php $sname = $suser->name; ?> 
		 	<?php $semail_id = $suser->email_id; ?> 
		 	<?php $scompany = $suser->company; ?> 
		 	<?php $squalification = $suser->qualification; ?> 
		 	<?php $shobbies = $suser->hobbies; ?>
		 	<?php $sid = $suser->id; ?>
		 	<?php $action = "/laravel/public/resume/update"; ?>

	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
 	<?php $sname = ''; ?> 
 	<?php $semail_id = ''; ?> 
 	<?php $scompany = ''; ?> 
 	<?php $squalification = ''; ?> 
 	<?php $shobbies = ''; ?> 
 	<?php $action = "/laravel/public/resume/insert"; ?>
 <?php endif; ?>	 


<html>
<head>
<title> </title>
</head>
<body>
	<div class="container">
      <?php if($errors->any()): ?>
          <div class="alert alert-danger">
              <ul>
                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><?php echo e($error); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
          </div><br />
      <?php endif; ?>
	<form method="POST" action="<?php echo e($action); ?>"  enctype="multipart/form-data" >
	<?php echo e(csrf_field()); ?> 
	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
	<table>
		<tr>
			<td>Name </td>
			<td><input type="text" name="name" value="<?php echo e($sname); ?>"> </td>
		</tr>
		<tr>
			<td>Email </td>
			<td><input type="text" name="email_id" value="<?php echo e($semail_id); ?>"> </td>
		</tr>
		<tr>
			<td>Company </td>
			<td><input type="text" name="company" value="<?php echo e($scompany); ?>"> </td>
		</tr>
		<tr>
			<td>Qualification </td>
			<td><input type="text" name="qualification" value="<?php echo e($squalification); ?>"> </td>
		</tr>
		<tr>
			<td>Hobbies </td>
			<td><input type="text" name="hobbies" value="<?php echo e($shobbies); ?>"> </td>
		</tr>		 
		<tr>
			<td>Resume </td>
			<td>				 
			 <input type="file" name="resume" value="" accept="pdf, doc" >
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center;" >
				<?php if(!empty($sid)): ?>
					<input type="hidden" name="user_id" value="<?php echo e($sid); ?>">
				<?php endif; ?>
				<input type="submit"   value="Submit">
			</td>
		</tr>
		<?php if(isset($error)): ?>
		<tr>
			<td colspan="2" style="text-align: center;" >
				<?php echo e($error); ?>

			</td>
		</tr>
		<?php endif; ?> 
	</table>
</form>

</div>

	<table border="1px" style="border-collapse: collapse;width: 100%">
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Company</th>
			<th>Qualification</th>
			<th>Hobbies</th>
			<th>Resume</th>
			<th>Date</th>
			<th>Action</th>
		</tr>
	 <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	 		<tr>
	 			<td><?php echo e($user->name); ?> </td>
	 			<td><?php echo e($user->email_id); ?> </td>
	 			<td><?php echo e($user->company); ?></td>
	 			<td><?php echo e($user->qualification); ?></td>
	 			<td><?php echo e($user->hobbies); ?></td>
	 			<td><a href="<?php echo e($user->resume_path); ?>" download>Download</a> </td>
	 			<td><?php echo e($user->ent_date); ?></td>
	 			<td> 
	 				<a href="http://localhost/laravel/public/resume?user_id=<?php echo e($user->id); ?>">Edit</a> / <a href="http://localhost/laravel/public/resume/delete?user_id=<?php echo e($user->id); ?>">Delete</a>  </td>
	 		</tr> 		  	     	 
	 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
	 </table> 
</body>
</html>

 