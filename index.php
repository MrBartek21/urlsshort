<?php
    session_start();
	
	//Definiowanie zmiennych sesyjnych
    define('SESSION_COOKIE','URLS');
    define('SESSION_ID_LENGHT',40);
	define('SESSION_COOKIE_EXPIRE',43200);
	
	require_once("Resources/Connect.php");
	require_once("Resources/Settings.php");
	
	print_r($_POST);
	//print_r($_GET);
	if(isset($_POST['urlinput']) && !empty($_POST['urlinput'])){
		$url = $_POST['urlinput'];

		$Name = file_get_contents('http://names.drycodes.com/1?nameOptions=funnyWords&format=text');
		
		$sql = "INSERT INTO urls (Name, Link, ShortName) VALUES ('$Name', '$url', '$ShortName')";
		$Connect->query($sql);


		//echo $Name;
	}
?>


<!DOCTYPE html>
<html lang="pl">
	<head>
		<link rel="apple-touch-icon" sizes="57x57" href="Graphic/Favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="Graphic/Favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="Graphic/Favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="Graphic/Favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="Graphic/Favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="Graphic/Favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="Graphic/Favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="Graphic/Favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="Graphic/Favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="Graphic/Favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="Graphic/Favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="Graphic/Favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="Graphic/Favicon/favicon-16x16.png">
		
		<meta name="robots" content="index, follow">
		<meta name="msapplication-TileImage" content="Graphic/Favicon/ms-icon-144x144.png"/>
		<meta name="msapplication-TileColor" content="#ffffff"/>
		<meta name="theme-color" content="#b93731"/>
        <link rel="manifest" href="Graphic/Favicon/manifest.json">
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="author" content="<?php echo $Author;?>"/>
        <meta name="keywords" content="<?php echo $Keywords;?>" />
        <meta name="description" content="<?php echo $Description;?>"/>
		
		<!-- Bootstrap core CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
		
		<!-- Custom styles -->
		<link href="CSS/Main.css" rel="stylesheet">
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        
		<title><?php echo $MainPage.' - '.$Title_Index;?></title>
	</head>
	<body>
		<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-nav fixed-top">
			<div class="container">
				<a class="navbar-brand" href="<?php echo $Link_Index;?>"><IMG src="Graphic/Menu.png" class="d-inline-block mr-sm-1 align-bottom" width="30" height="30" alt="Menu"> <?php echo $Title_Index;?></a>
			</div>
		</nav>

		<!-- Page Content -->
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
    				    <div class="col-12">
        					<div class="card text-dark bg-card-yellow">
                				<div class="card-body text-center">								
									<form action="#" method="post">
										<div class="form-group">
										  	<label for="urlinput"><h2>Enter the link to shorten</h2></label>
										  	<input type="text" class="form-control" id="urlinput" name="urlinput"  style="margin-bottom: 20px; width: 100% !important;">
										</div>
										<button type="submit" class="btn btn-primary btn-block">Generate</button>
									</form><hr />

                					<p class="card-text">The generated link is: <a href="https://urlsshort.herokuapp.com/url/f456d" class="">https://urlsshort.herokuapp.com/url/f456d</a></p>
                				</div>
                			</div>
            			</div>
					</div>
					<!-- /.row -->
				</div>
				<!-- /.col-lg-9 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->

		<!-- Footer -->
		<footer class="py-2 bg-dark navbar-fixed-bottom fixed-bottom">
			<div class="container">
				<p class="m-0 text-center text-white">Copyright &copy; <a href="<?php echo $Link_Footer;?>"><?php echo $Title_Footer;?></a> <?php echo date('Y');?></p>
			</div>
		</footer>
		
		<!-- Bootstrap core JavaScript -->
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-t6I8D5dJmMXjCsRLhSzCltuhNZg6P10kE0m0nAncLUjH6GeYLhRU1zfLoW3QNQDF" crossorigin="anonymous"></script>
	</body>
</html>