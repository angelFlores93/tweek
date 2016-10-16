<?php session_start();?>
<html>
<head>
	<title>Tweek</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">	
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<!--link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/custom.css">
</head>
<body class="pic">
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
                            <img  alt="Tweek" src="img/logo.png" >
                        </a>
                    </div>
                    <!-- /logo -->

                    </div>

                    <!-- main nav -->
                    <nav class="collapse navigation navbar-collapse navbar-right" role="navigation">
                        <ul id="nav" class="nav navbar-nav">
                            <li><a  data-toggle="modal" data-target="#login_modal">Login</a></li> 
                            <li><a  data-toggle="modal" data-target="#register_modal">Register</a></li>
                        </ul>
                    </nav>
                </div>

            </div>
        
        </header>
        

     

	<!-- Modal -->
	<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	        <h4 class="modal-title" id="myModalLabel">Log back in!</h4>
	      </div>
	      <div class="modal-body">
	      	 <div class="container-fluid">
	      <div class="row">
	        
		
				<form class="form " action="controller/login.php" method="POST">
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" id="email" name="email" class ="form-control" placeholder="Email">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" id="password" name="password" class ="form-control" placeholder="Password">
					</div>
					<div class="form-group">
					<div class="row">
						<div class ="col-md-6">
						<button type="button" class="btn btn-secondary form-control" data-dismiss="modal">Close</button>
						</div>
						<div class ="col-md-6">
						<input type="submit" class ="btn btn-success form-control" value="Login"></div>
						</div>
					</div>
				</form>
	      	</div>
	      </div>
	      </div>
	    </div>
	  </div>
	</div>
	<div class="modal fade" id="register_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	        <h4 class="modal-title" id="myModalLabel">Become a member</h4>
	      </div>
	      <div class="modal-body">
	      	 <div class="container-fluid">
	      <div class="row">
				<form class="form" action="controller/register.php" method="POST">
					<div class="form-group">
						<label for="name">Name*</label>
						<input type="name" id="name" name="name" class ="form-control" placeholder="Name">
					</div>
					<div class="form-group">
						<label for="email">Email*</label>
						<input type="email" id="email" name="email" class ="form-control" placeholder="Email" required>
					</div>
					<div class="form-group">
						<label for="password">Password*</label>
						<input type="password" id="password" name="password" class ="form-control" placeholder="Password" required>
					</div>
					<div class="form-group">
						<label for="passwordRepeat">Repeat password*</label>
						<input type="password" id="passwordRepeat" name="passwordRepeat" class ="form-control" placeholder="Repeat password" required>
					</div>
					<div class="form-group">
					<div class="row">
					
						<div class ="col-md-6">
						<button type="button" class="btn btn-secondary form-control" data-dismiss="modal">Close</button>
						</div>
						<div class ="col-md-6">
						<input type="submit" class ="btn btn-success form-control" value="Register now!"></div>
						</div>
					</div>
				</form>
	      	</div>
	      </div>
	      </div>
	    </div>
	  </div>
	</div>
	<div class ="container-fluid blacked">
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
	<div class ="row white ">
		<div class="col-md-4">
		<img src="img/nfl.png" with ="600px" height="500px">
		</div>
	<div class="col-md-8 text-center">
		
			<h1>Get the hottest news about your teams now!</h1>
			<br><br><br>
			<p>Sign up if you don't have an account yet!
			<br><br><br>
			Sign in and get the news you need and subscribe for more! </p>
			<br><br>
			<h3>Happy tweeking!</h3>
			
			</div>
	</div>
	<?php session_destroy(); ?>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	
<body>

</html>