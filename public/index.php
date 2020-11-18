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
        <meta name="description" content="<?php echo $Description_Index;?>"/>
		
		<!-- Bootstrap core CSS -->
		<link href="Vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Custom styles for this template -->
		<link href="CSS/Main.css" rel="stylesheet">
		<link href="CSS/Colors.css" rel="stylesheet">
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        
        <title><?php echo $Lang_MainPage.' - '.$Title_Index;?></title>
	</head>
	<body>
		<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-red fixed-top">
			<div class="container">
				<a class="navbar-brand" href="<?php echo $Link_Index;?>"><IMG src="Graphic/Menu.png" class="d-inline-block mr-sm-1 align-bottom" width="30" height="30" alt="Menu"> <?php echo $Title_Index;?></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<?php
							Menu("index", $Lang);
							
							//echo '<li class="nav-item"><a class="nav-link btn btn-warning mr-2 text-dark" href="profil">'.$UserName.'</a><IMG src="'.$UserAvatar.'" class="d-inline-block mr-sm-1 align-bottom rounded-circle" width="40" height="40" alt=""></li>';
							
							
							if($_SESSION['CG_Logged']) echo '<li class="nav-item"><a class="nav-link btn btn-warning mr-2 text-dark navbar-brand" href="profil"><img src="'.$UserAvatar.'" width="30" height="30" class="d-inline-block align-top rounded-circle" alt=""> '.$UserName.'</a></li>';
							else echo '<li class="nav-item"><a class="nav-link btn btn-warning mr-2 text-dark" href="account">'.$Lang_Login.'</a></li>';
						?>
					</ul>
				</div>
			</div>
		</nav>

		<!-- Page Content -->
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
    				    <div class="col-12">
        					<div class="card text-white bg-dark">
                				<div class="card-body">
                					<p class="card-title text-center"><h3><?php GetPost($Connect_CG, $Lang, 'Title');?></h3></p>
                					<p class="card-text"><?php GetPost($Connect_CG, $Lang, 'Desc');?></p><hr />
                					<p class="card-text"><font size="-1"><?php GetPost($Connect_CG, $Lang, 'Date');?></font></p>
                				</div>
                			</div>
            			</div>
    					<?php GetGame($Connect_CG, $Lang);?>
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
				<p class="m-0 text-center text-white">Copyright &copy; <a href="<?php echo $Link_Index;?>"><?php echo $Title_Index;?></a> <?php echo date('Y');?></p>
				<p class="m-0 text-center text-white"><a href="privacy"><?php echo $Lang_Privacy;?></a> | <?php chatLink();?></p>
			</div>
		</footer>

		<!-- Bootstrap core JavaScript -->
		<script src="Vendor/jquery/jquery.min.js"></script>
		<script src="Vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	</body>
</html>
