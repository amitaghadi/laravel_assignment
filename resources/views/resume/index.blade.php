@if(!empty($selected_users))	
	@foreach($selected_users as $suser)
		 	<?php $sname = $suser->name; ?> 
		 	<?php $semail_id = $suser->email_id; ?> 
		 	<?php $scompany = $suser->company; ?> 
		 	<?php $squalification = $suser->qualification; ?> 
		 	<?php $shobbies = $suser->hobbies; ?>
		 	<?php $sid = $suser->id; ?>
		 	<?php $action = "/laravel/public/resume/update"; ?>

	@endforeach
@else
 	<?php $sname = ''; ?> 
 	<?php $semail_id = ''; ?> 
 	<?php $scompany = ''; ?> 
 	<?php $squalification = ''; ?> 
 	<?php $shobbies = ''; ?> 
 	<?php $action = "/laravel/public/resume/insert"; ?>
 @endif	 


<html>
<head>
<title> </title>
</head>
<body>
	<div class="container">
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div><br />
      @endif
	<form method="POST" action="{{ $action }}"  enctype="multipart/form-data" >
	{{ csrf_field() }} 
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<table>
		<tr>
			<td>Name </td>
			<td><input type="text" name="name" value="{{ $sname }}"> </td>
		</tr>
		<tr>
			<td>Email </td>
			<td><input type="text" name="email_id" value="{{ $semail_id }}"> </td>
		</tr>
		<tr>
			<td>Company </td>
			<td><input type="text" name="company" value="{{ $scompany }}"> </td>
		</tr>
		<tr>
			<td>Qualification </td>
			<td><input type="text" name="qualification" value="{{ $squalification }}"> </td>
		</tr>
		<tr>
			<td>Hobbies </td>
			<td><input type="text" name="hobbies" value="{{ $shobbies }}"> </td>
		</tr>		 
		<tr>
			<td>Resume </td>
			<td>				 
			 <input type="file" name="resume" value="" accept="pdf, doc" >
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center;" >
				@if(!empty($sid))
					<input type="hidden" name="user_id" value="{{ $sid }}">
				@endif
				<input type="submit"   value="Submit">
			</td>
		</tr>
		@isset($error)
		<tr>
			<td colspan="2" style="text-align: center;" >
				{{ $error }}
			</td>
		</tr>
		@endisset 
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
	 @foreach($users as $user)
	 		<tr>
	 			<td>{{ $user->name }} </td>
	 			<td>{{ $user->email_id }} </td>
	 			<td>{{ $user->company }}</td>
	 			<td>{{ $user->qualification }}</td>
	 			<td>{{ $user->hobbies }}</td>
	 			<td><a href="{{ $user->resume_path }}" download>Download</a> </td>
	 			<td>{{ $user->ent_date }}</td>
	 			<td> 
	 				<a href="http://localhost/laravel/public/resume?user_id={{ $user->id }}">Edit</a> / <a href="http://localhost/laravel/public/resume/delete?user_id={{ $user->id }}">Delete</a>  </td>
	 		</tr> 		  	     	 
	 @endforeach 
	 </table> 
</body>
</html>

 