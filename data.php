<?php 
	
	require("functions.php");
	require("vpconfig.php");
	
	if(!isset ($_SESSION["userId"])) {
		header("Location: login.php");
		exit();
	}
	
	if (isset($_GET["logout"])) {
		
		session_destroy();
		
		header("Location: login.php");
		exit();
	}
?>

<!DOCTYPE html>
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
        <li class="active"><a href="data.php">Esileht</a></li>
        <li><a href="projects.php">Projects</a></li>
        <li><a href="gallery.php">Galerii</a></li>
		<li><a href="music.php">Muusika</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="?logout=1"><span class="glyphicon glyphicon-log-in"></span> Logi välja</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Tere tulemast! <?php echo $_SESSION["userEmail"]  ?></h1>
      <p>See leht on loodud selleks, et hoida enda porfooli jaoks vajalikke asju. Kui midagi oleks vaja lisada oma protfooliosse siis ma lisan selle siia ning hiljem saab korralikult panna porfooliosse. Lejht on vajalik ka selleks, et kui peaks olema olukord kus ma pean näitama oma portfooliot ja mu kõige uuemad tööd ei ole sinna ülespandud siis on neid hea näidata kuskil ilusas kohas tööandjale.</p>
      <hr>
	  <div class="deep-text">
		<h3>Näidake mulle inimest, kes pole kordagi ühtegi viga teinud, ja ma näitan teile inimest, kes pole kunagi ka midagi erilist saavutanud.</h3>
		<p></p>
	  </div>
    </div>
    <div class="col-sm-2 sidenav">
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Karolin Kriiska if16 & Tatjana Kuznetsova if15</p>
</footer>

</body>
</html>