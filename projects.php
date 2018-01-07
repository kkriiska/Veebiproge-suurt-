<?php
require ("functions.php");
require ("vpconfig.php");
error_reporting(0);

<<<<<<< HEAD
  if(!isset ($_SESSION["userId"])) {
    header("Location: login.php");
    exit();
  }
  $email = $_SESSION["userId"];
  
  if (isset($_GET["logout"])) {
    
    session_destroy();
    
    header("Location: login.php");
    exit();
  }


	$document = "test";
	$user = $_SESSION["userEmail"];
	$description = "test";

  $directory = "projects/";
  $files = glob($directory . "*.pdf");
	
=======
	$document = "test";
	$user = $_SESSION[userEmail];
	$description = "test";
	$displayDocument = display($user);
	
if(isset ($_POST["document"]) && isset ($_POST["description"])){
	$document = $_POST["document"];
	$description = $_POST["description"];
	uploadDocument($user, $document, $description);
}
echo $displayDocument;
>>>>>>> 752ea212402632b3af8ecd30c26474b43c627a84
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
  <link rel="stylesheet" type="text/css" href="style_tables.css">
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
        <li class="active"><a href="projects.php">Projects</a></li>
        <li><a href="gallery.php">Galerii</a></li>
		<li><a href="music.php">Muusika</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">   
<h1>Proektid</h1>
 <p>Lae proekti ülesse!</p>
<<<<<<< HEAD
<form action="uploadDocument.php" method="post" enctype="multipart/form-data">

<input type="file" name="file" size="50" />

<br />

<input type="submit" value="Upload" />

=======
<form method = "POST">
	<input type = "file" name = "document"/>
	<input type = "text" name = "description"/>
	<input type = "Submit" value = "Lae ules"/>
>>>>>>> 752ea212402632b3af8ecd30c26474b43c627a84
</form>
</div>

<!--
<div class="container-fluid text-center">   
   <?php/*
    $filenames=scandir("document");
    $lubatud="pdf";
    foreach($filenames as $filename){
      $m=explode(".", $filename);

      if(in_array($m[1], $lubatud)){
        $docurl=urlencode($filename);
        echo "<li><a href='projects.php?document=$docurl'>$filename</a></li>";
      }
    }*/
   ?>
</div>
-->



</div>

<<<<<<< HEAD
  <table id = "documentCount" class = "table table-striped">
    <thead>
      <tr>
        <th scope="col"> Projects </th>
      </tr>
    </thead>
    <tbody>
      <tr>
    <?php foreach ($files as $file): ?>
        <td> <a href="<?php echo $file; ?>" download><?php echo basename($file);?></a> </td>
      </tr>
    <?php endforeach;?>
    </tbody>
  </table>

  

=======
>>>>>>> 752ea212402632b3af8ecd30c26474b43c627a84
<?php 
	require("footer.php");
?>

</body>
</html>

