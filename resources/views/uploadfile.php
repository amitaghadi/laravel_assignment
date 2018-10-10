<html>
   <body>
   		{{ csrf_field() }}
      <?php
         /*echo Form::open(array('url' => '/uploadfile','files'=>'true'));
         echo 'Select the file to upload.';
         echo Form::file('image');
         echo Form::submit('Upload File');
         echo Form::close();*/
      ?>
      <form action="/laravel/public/uploadfile" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      	<input type="file" name="image" >
      	<input type="submit" value="Upload File">
      </form>

   </body>
</html>