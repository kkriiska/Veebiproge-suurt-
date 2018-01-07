<?php
	$database ="if17_karokrii";
	
	
	session_start();
	
	function upload($user, $image, $description){
		$mysqli = new mysqli ($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("INSERT INTO image (image, description, user) VALUES(?, ?, ?)");
		echo $mysqli->error;
		$stmt->bind_param("sss", $image, $description, $user);
				if ($stmt->execute()){
			echo "\n Õnnestus!";
		} else {
			echo "\n Tekkis viga : " .$stmt->error;
		}
		$stmt->close();
		$mysqli->close();
	}
	
		function uploadDocument($user, $document, $description){
		$mysqli = new mysqli ($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("INSERT INTO document (document, description, user) VALUES(?, ?, ?)");
		echo $mysqli->error;
		$stmt->bind_param("sss", $document, $description, $user);
				if ($stmt->execute()){
			echo "\n Õnnestus!";
		} else {
			echo "\n Tekkis viga : " .$stmt->error;
		}
		$stmt->close();
		$mysqli->close();
	}
	
	function display($email){
		$mysqli = new mysqli ($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("SELECT image FROM image WHERE user = ?");
				echo $mysqli->error;
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->bind_result($image);
		$stmt->close();
		$mysqli->close();
		return $image;

	}
	
	function signUp($firstname, $lastname, $gender, $email, $password, $deleted){
		$notice="";
		$mysqli = new mysqli ($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("INSERT INTO user_sample(eesnimi, perkonnanimi, sugu, email, parool, deleted) VALUES(?, ?, ?, ?, ?, ?)");
		echo $mysqli->error;
		$stmt->bind_param("ssissi", $firstname, $lastname, $gender, $email, $password, $deleted);
		if ($stmt->execute()){
			echo "\n Õnnestus!";
		} else {
			echo "\n Tekkis viga : " .$stmt->error;
		}
		$stmt->close();
		$mysqli->close();
	}
	
	function logIn($email, $password){
		$notice="";
		$mysqli = new mysqli ($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$stmt=$mysqli->prepare("SELECT id, email, parool FROM user_sample WHERE email=?");
		echo $mysqli->error;
		$stmt->bind_param("s", $email);
		$stmt->bind_result($id, $emailfromDb, $passwordfromDb);
		$stmt->execute();
		if($stmt->fetch()){
			$hash=hash("sha512", $password);
			if ($hash==$passwordfromDb){
				echo "kasutaja $id logis sisse";
				$_SESSION ["userId"]=$id;
				$_SESSION ["userEmail"]=$emailfromDb;
				header ("Location: data.php");
				exit();
			}else{
				$notice="parool on vale";
			}
			
		}else{
			$notice="Sellise emailiga kasutajat pole olemas";
		}
		$stmt->close();
		return $notice;
	}
	
	function sendComment($email, $comment) {
		$mysqli = new mysqli ($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		echo $mysqli->error;
		$stmt = $mysqli->prepare("INSERT INTO music_stuff(email, message, deleted) VALUES (?,?, 0)"); 
		$stmt->bind_param("ss", $email, $comment);
		$stmt->execute();
		echo $mysqli->error;
		$stmt->close();
		$mysqli->close();
		
	}

	function deleteComment($email, $message){
		$mysqli = new mysqli ($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		echo $mysqli->error;
		$stmt = $mysqli->prepare("UPDATE music_stuff SET deleted = 1 WHERE email = ? AND message = ?"); 
		$stmt->bind_param("si", $email, $message);
		$stmt->execute();
		echo $mysqli->error;
		$stmt->close();
		$mysqli->close();


	}
	
	function getAllDataChat($find) {
		
		$notice="";
		$mysqli = new mysqli ($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		echo $mysqli->error;
		$stmt = $mysqli->prepare("SELECT email, message, posted, id FROM music_stuff WHERE email = ? AND deleted = 0 LIMIT 10"); 
		$stmt->bind_param("i", $find);
		$stmt->bind_result($email, $message, $posted, $id);
		$stmt->execute();
		
		$results = array();
		
		
		while ($stmt->fetch()) {
			
			$info = new StdClass();
			$info->message = $message;
			$info->posted = $posted;
			$info->email = $email;
			$info->id = $id;
			
			array_push($results, $info);
			
		}
		
		return $results;
	
	}

?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

