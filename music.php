<?php 
	
	require("functions.php");
	require("vpconfig.php");
	
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
	
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Muusika</title>
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
      <a class="navbar-brand" href="data.php">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="data.php">Esileht</a></li>
        <li><a href="#">Minu profiil</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="gallery.php">Galerii</a></li>
		<li><a href="music.php">Muusika</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="?logout=1"><span class="glyphicon glyphicon-log-in"></span> Logi välja</a></li>
      </ul>
    </div>
  </div>
</nav>
<?php


	$email = $_SESSION["userEmail"];
	$message = "";


	if(isset ($_POST["message"])){
		$message = $_POST["message"];
		//echo $message;
		sendComment($email, $message);

	}
?>

<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src = "tables.js"></script>

<div id="animatePage">
	<div style="display:block">
		<form method="POST">
			<div class="input-group input-group-sm" style="width:100%">
				<div class="row" id="ChatBoxEntry" style="text-align:center">
					<textarea name="message" id="message" style="
						color:Black;height:100px;width:50%;display:block;margin-left:auto;margin-right:auto;margin-bottom:20px">
					</textarea> 
				</div>
				<div class="row">
					<input class="btn btn-success btn-block" style="width:25%;margin-left:auto;margin-right:auto;" type="submit" value="Submit" id = "Submit">
				</div>
			</div>
		</form>
	</div>

	<div style="overflow-x:auto">
		<?php 
			
		$view = getAllDataChat($email);

			$html = "<table class='table table-bordered'>";
			
				$html .= "<tr>";
					$html .= "<h3>Messages</h3>";
					$html .= "<th>Username</th>";
					$html .= "<th>Message</th>";
					$html .= "<th>Posted</th>";
				$html .= "</tr>";
				
				foreach ($view as $v) {
					
					$html .= "<tr>";
						$html .= "<td>".$v->email."</td>";
						$html .= "<td>".$v->message."</td>";
						$html .= "<td>".$v->posted."</td>";
					$html .= "</tr>";
				}
				
			$html .= "</table>";
			
			echo nl2br($html);
			
		?>
	</div>
</div>
<footer class="container-fluid text-center">
  <p>Karolin Kriiska if16 & Tatjana Kuznetsova if15</p>
</footer>

</body>
</html>