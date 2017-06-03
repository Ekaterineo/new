<?php
session_start();
require_once("php/functions.php");
load();

?>
<!DOCTYPE html>
<hmtl>
<head>
	<link href = "css/home.css"
			  type = "text/css"
			  rel = "stylesheet"
		>
	<meta charset="utf-8"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src = 'js/javascript.js'> </script>
	<title></title>

</head>
	<div class ='main'>
			
			<?php echo header1(); ?>

			<div id = 'head'>
				<br><br><br><br>
				<a> THERE IS NO GREATER AGONY THAN BEARING AN UNTOLD STORY INSIDE YOU. </a>
			</div>
				<br> <br>
			<?php
			$query = "SELECT * FROM blog order by date DESC";
			$result = mysqli_query($con, $query);
			$string ="";
			while($res=mysqli_fetch_array($result)){
				$query = "SELECT Username FROM users WHERE ID = {$res['author']}";
				if(strlen($res['text'])>700) $textShort = substr($res['text'], 0, 700) . "...";
				else $textShort = $res['text'];
				$user = mysqli_query($con, $query);

				$res2=mysqli_fetch_array($user);
				$string.="<div id = 'blog'>
				<a id = 'date'> {$res['date']} <a>
				<a id = 'name'> {$res2['Username']} </a>
				<br> <br> 

								<a id = \"title\"> {$res['title']} </a>
				<br>
				<p> {$textShort}
				</p>
				<a class = \"Button\" href = \"blog.php?id={$res['id']}\" > სრულად </a>
				<br><br>
			</div><br><br>";
			} echo $string;
			?>
	</div>
</html>

				