<!DOCTYPE html>
<?php
require ("functions.php");
require ("vpconfig.php");
	$image = "";
	$user = "test";
	$description = "";
	
if(isset ($_POST["image"])){
	$image = $_POST["image"];

	
}
	if(isset($_POST["description"])){
		
		$description = $_POST["description"];
		echo $description;
		
		upload($user, $image, $description);
	}
		echo $description;
		echo $image;
?>
<html lang="en">
<head>
  <title>Esileht</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Minu profiil</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Galerii</a></li>
		<li><a href="#">Muusika</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
<p>Lae pilti ülesse!</p>
<form method = "POST">
	<input type = "file" name = "image"/>
	<input type = "Submit" value = "lae ules"/>
</form>
<br></br>
<form method = "POST">
	<input type = "text" name = "description"/>
	<input type = "Submit" value = "lae ules"/>
</form>
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>