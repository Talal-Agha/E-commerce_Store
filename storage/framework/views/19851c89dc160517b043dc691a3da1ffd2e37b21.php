<!DOCTYPE html>
<html>
<head>
<title>Signin</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
@import  url('https://fonts.googleapis.com/css?family=Open+Sans');
body{
	background-color:#f2f2f2;
	font-family: 'Open Sans', sans-serif;
	padding:10px;
}
.container{
	width:500px;
}
div.signinb{
   display:box;
    width:100%;
	float:left;
	padding:20px;
	background-color:white;
}
input{
	width:auto;
	margin:5px;
	padding:10px;
	border:0px;
	border-bottom:2px  solid #d9d9d9;
}
.login_btn{
	width:90px;
	weight:bold;
	padding:10px;
	background-image: url("assets-for-admin/images/b1.jpg");
    background-color: white;
	color:white;
	border:0px;
	margin:5px;
	
}
input:focus,select:focus,textarea:focus,button:focus {
    outline: none;
}
input:focus{
	border-bottom:2px  solid #8B0000;
}
input[name=email]{
	margin:10px;
	width:385px;
	
}
input[name=password]{
	margin:0px 0px 10px 0px;
	width:385px;
}
#error , #checking ,#success{
	display:none;
}
</style>
</head>
<body>

<div class="container">

<div class="signinb">
	 <?php echo $__env->make('layouts.admin.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<center>
<h1>Login</h1>
<form form method="POST" action="/myadmin">
<?php echo e(csrf_field()); ?>

<input   name="email" type="text" placeholder="E-Mail" required><br>
<input   name="password" type="password" placeholder="Password" required><br>
<button class="login_btn" type="submit">Login <span class="glyphicon glyphicon-log-in"></span></button>
</form>
</center>
</div>
</div>
 

</body>
</html>