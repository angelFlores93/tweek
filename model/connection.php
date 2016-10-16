<?php 
	$config = parse_ini_file('../config/config.ini');
	
	// Create connection
	$conn=mysqli_connect($config['servername'],$config['username'],$config['password'],$config['db']);
    // Check connection
    if (mysqli_connect_errno())
     {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }

?>
