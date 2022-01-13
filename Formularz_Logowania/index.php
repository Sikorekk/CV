<!DOCTYPE HTML>
<html lang="pl">
	<head>
		<meta charset="UTF-8">
		<title>Strona Główna</title>
		<link rel="stylesheet" href="style.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
	</head>
		
	<body>
		<script type="text/javascript" src="script.js"></script>
		<main>
	<?php
			function repair($arr){
				if(sizeof($arr) > 5){
					?><script> window.location.replace("index.php"); </script><?php
				}
				else{
					header('location: index.php');
				}
			}
			if(!isset($_GET['opt'])){
				include('logowanie.php');
			}
			else{
				if($_GET['opt'] == 1){
					include('logowanie.php');
				}
				if($_GET['opt'] == 2){
					include('rejestracja.php');
				}
			}
			
			$arr = include('database.php');
			$id = intval(array_key_last($arr));
			$act = 'default';
			if(isset($_GET['act'])){
				$act = $_GET['act'];
			}
			if(isset($_POST['act'])){
				$act = $_POST['act'];
			}
			switch($act){
				case 'log': {
					foreach($arr as $item){
						if($item['username'] == $_POST['username'] && $item['password'] == $_POST['password']){
							header('location: index.php');
							break;
						}
						if($_POST['username'] == $_POST['password']){
							header('location: index.php?opt=1&ale=2');
						}
						else{
							header('location: index.php?opt=1&ale=1');
						}
					}
				} break;
				case 'rej': {
					$help = 0;	
					if($_POST['username'] == $_POST['password']){
						header('location: index.php?opt=2&ale=3');
						$help = 1;
					}					
					foreach($arr as $item){
						if($item['email'] == $_POST['email']){
							header('location: index.php?opt=2&ale=1');
							$help = 1;
						}
						if($item['username'] == $_POST['username']){
							header('location: index.php?opt=2&ale=2');
							$help = 1;
						}
					}
					if($help == 0){
						$arr[$id + 1]['username'] = $_POST['username'];
						$arr[$id + 1]['password'] = $_POST['password'];
						$arr[$id + 1]['email'] = $_POST['email'];
						$id++;
						$dataexport = var_export($arr, true);
						$export_str = "<?php return ".$dataexport."?>";
						file_put_contents('database.php', $export_str);	
						repair($arr);
					}
				} break;
				case 'default': {
					
				} break;
			}

	?>

		</main>
	</body>
</html>