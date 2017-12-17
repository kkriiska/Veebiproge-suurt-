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
	
	
	function getAllDataChat() {
		

		$stmt = $this->connection->prepare("
			SELECT message, posted, email
			FROM chatRoom
			ORDER BY posted DESC
			LIMIT 20
			
		");
		$stmt->bind_result($message, $posted, $emailD);
		$stmt->execute();
		
		$results = array();
		
		
		while ($stmt->fetch()) {
			
			$info = new StdClass();
			$info->message = $message;
			$info->posted = $posted;
			$info->email = $emailD;
			
			
			array_push($results, $info);
			
		}
		
		return $results;
	
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
        <li><a href="#">Galerii</a></li>
		<li><a href="music.php">Muusika</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="?logout=1"><span class="glyphicon glyphicon-log-in"></span> Logi välja</a></li>
      </ul>
    </div>
  </div>
</nav>
<?php
require ("functions.php");
if (!isset($_SESSION["userId"])) {
	header("Location: data.php");}


	$email = $_SESSION["userEmail"];
	$messageError = "";
	$post = 1;
	$deleted = 1;


	if (isset ($_POST["message"]))
		{
		if(empty($_POST["message"])){
			$messageError = "Field must be filled";}
		}

	if (isset ($_POST["message"]))
		{
		if(strlen($_POST["message"])>300){
			$messageError = "Message too long, MAX 300";}
		}

	if(isset ($_POST["message"]) &&
		$messageError == ""){
		$date = date("Y-m-d h:i:sa");
		$message = $_POST["message"];
		if ($post == 1){
			$data->dataentryChatroom ($Helper->cleanInput($email), $Helper->cleanInput($message), $Helper->cleanInput($date));}
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
					</textarea> <?php echo $messageError ?>
				</div>
				<div class="row">
					<input class="btn btn-success btn-block" style="width:25%;margin-left:auto;margin-right:auto;" type="submit" value="Submit" id = "Submit">
				</div>
			</div>
		</form>
	</div>

	<div style="overflow-x:auto">
		<?php 
			
		$view = $data->getAllDataChat();

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
			
			echo $html;
			
		?>
	</div>
</div>
<footer class="container-fluid text-center">
  <p>Karolin Kriiska if16 & Tatjana Kuznetsova if15</p>
</footer>

</body>
</html>