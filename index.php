<?php
    session_start();
	
	//Definiowanie zmiennych sesyjnych
    define('SESSION_COOKIE','URLS');
    define('SESSION_ID_LENGHT',40);
	define('SESSION_COOKIE_EXPIRE',43200);
	
	require_once("Resources/Connect.php");
	require_once("Resources/Settings.php");
	require_once("Resources/Function.php");

	$GeneratedLink = '';
	$Error = '';
	
	if(isset($_POST['urlinput']) && !empty($_POST['urlinput'])){
		$url = $_POST['urlinput'];

		$Name = CheckName($Connect);
		$ShortName = GenerateCode($Connect);
		echo $Name;

		//$Connect->query("INSERT INTO urls (Name, Link, ShortName) VALUES ('$Name', '$url', '$ShortName')");

		$Link = "https://".$_SERVER['SERVER_NAME'];
		$Link = $Link.'/?url='.$ShortName;

		$GeneratedLink = '<hr />
			<p class="card-text">The generated link is: </p>
			<form>
				<div class="input-group">
					<input type="text" class="form-control" value="'.$Link.'" id="copy-input" disabled>
					<span class="input-group-btn tooltip">
						<a tabindex="0" class="btn btn-lg btn-success" role="button" data-content="'.$Link.'" onClick="Copy()" onmouseout="outFunc()">
							<span class="tooltiptext" id="myTooltip">Copy to clipboard</span>
							Copy
						</a>
					</span>
				</div>
			</form>	';

		//<a tabindex="0" class="btn btn-lg btn-success popover-dismiss" role="button" data-toggle="popover" data-trigger="focus" title="Copied" data-content="'.$Link.'" onClick="Copy()" onmouseout="outFunc()">
		//unset($_POST);
	}

	if(isset($_GET['url']) && !empty($_GET['url'])){
		$url = $_GET['url'];

		$result = mysqli_query($Connect, "SELECT * FROM urls WHERE ShortName='$url'");
		$Count = $result->num_rows;
   		$row = $result->fetch_assoc();
		$Link = $row['Link'];


		if($Count>0) header('Location: '.$Link);
		else $Error = 'NotFound';
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
		<link href="Vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
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
									</form>

									<?php
										echo $GeneratedLink;
										echo $Error;
									?>
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
		<script src="Vendor/jquery/jquery.min.js"></script>
		<script src="Vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script>
			function Copy(){
				var copyText = document.getElementById("copy-input");
				copyText.select();
				//copyText.setSelectionRange(0, 99999)
				document.execCommand("copy");
				console.log(copyText.value);
				alert("Copied the text: " + copyText.value);

				var tooltip = document.getElementById("myTooltip");
  				tooltip.innerHTML = "Copied: " + copyText.value;
			}

			function outFunc(){
				var tooltip = document.getElementById("myTooltip");
				tooltip.innerHTML = "Copy to clipboard";
			}

			/*jQuery(function () {
				jQuery('[data-toggle="popover"]').popover()
			});*/
		</script>
	</body>
</html>
