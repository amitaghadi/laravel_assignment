<html>
<head>
<title>{{ $users }}</title>
</head>
<body>
 foreach($users as $user)
 	{{ $user->name }}    	     	 
 endforeach
 
</body>
</html>