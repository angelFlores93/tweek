<?php session_start();
 function close_session (){
	session_destroy();
	$link = "Location: http://".$_SERVER['HTTP_HOST'];
	header($link."/tweek/view/home.php");
	exit;
}
?>
<html>
<head>
	<title>Tweek</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">	

	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<!--link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/custom.css">

	
</head>
<body>
<div class ="container">
	 <header id="navigation" class="navbar tendered">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
                    <button type="button" class="navbar-toggle" style ="color: white"data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- /responsive nav button -->
                    <!-- logo --> 
                    <div class="navbar-brand">
                        <a href="#home">
                            <img  alt="Tweek" src="../img/logo.png" >
                        </a>
                    </div>
                    <!-- /logo -->

                    </div>

                    <!-- main nav -->
                    <nav class="collapse navigation navbar-collapse navbar-right" role="navigation">
                        <ul id="nav" class="nav navbar-nav">
                            <li><a class="btn btn-primary" href="../" onclick="<?php session_destroy(); ?>" >Logout</a>
                        </ul>
                    </nav>
                </div>

            </div>
        
        </header>


	<div class ="container">
	<?php if(isset($_SESSION['message'])) { ?>
		<?php if(isset($_SESSION['code']) && $_SESSION['code'] == 'success' ) { ?>
			<div class="container green">
				<h4><?=$_SESSION['message']?></h4>
			</div>
		<?php }else { ?>
			<div class="container red">
				<h4><?=$_SESSION['message']?></h4>
			</div>
		<?php } ?>
	<?php } ?>
	<div class ="row">
		<div class="col-md-8">
			<?php include 'news_feed.php' ?>
		</div>
		<div class="col-md-4">
			<h4>Subscribe to a team</h4>
			<hr>
			<?php if (isset($_SESSION['subs']) ){?>
				<?php foreach ($_SESSION['subs'] as $row) { ?>
					<div class=row>
						<div class ="col-md-6">
							<?=$row['title']?>	
						</div>
						<div class ="col-md-6" align="right">
							<form class ="form" action="../controller/subscribe.php" method="POST">
							<input type="hidden" name="id_subscription" value="<?=$row['id']?>">
							<input type="hidden" name="id_action" value="0">
							<input type="hidden" name="id_user" value="<?=$_SESSION['user_id']?>">
							<input type ="submit" class ="btn btn-success" value="Subscribe">
							</form>
						</div>
					</div>
					<hr>
				<?php }?>
			<?php }?>
		</div>
	</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	
<body>

</html>