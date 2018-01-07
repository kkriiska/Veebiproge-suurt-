<!DOCTYPE html>
<?php
require ("functions.php");
require ("vpconfig.php");
error_reporting(0);
	$image = "test";
	$user = $_SESSION[userEmail];
	$description = "test";
	$displayImage = display($user);
	
if(isset ($_POST["image"]) && isset ($_POST["description"])){
	$image = $_POST["image"];
	$description = $_POST["description"];
	upload($user, $image, $description);
}
echo $displayImage;
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
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="data.php">Esileht</a></li>
        <li><a href="projects.php">Projects</a></li>
        <li class="active"><a href="#">Galerii</a></li>
		<li><a href="music.php">Muusika</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">  
<h1>Galerii</h1>  
<p>Lae pilti ülesse!</p>
<form method = "POST">
	<input type = "file" name = "image"/>
	<input type = "text" name = "description"/>
	<input type = "Submit" value = "lae ules"/>
</form>
</div>

<?php 
	require("footer.php");
?>


</body>
</html>