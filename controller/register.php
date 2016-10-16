<?php 
	session_start();
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password_repeat = $_POST['passwordRepeat'];
	$regex = "/[a-zA-Z0-9\_\-\.]+@[a-zA-Z0-9\-]+.[a-z]+/";
	$link = "Location: http://".$_SERVER['HTTP_HOST'];
	if (!isset($email) || $email == "" || !isset($name) || $name == ""|| !isset($password) || $password == "" || !isset($password_repeat) || $password_repeat == ""){
		$_SESSION['message'] = "All fields must be filled";
		$_SESSION['code'] = "failure";
		header($link."/tweek");

		exit;
	}
	if (!(bool)preg_match($regex, $email)){
		$_SESSION['message'] = "Invalid email";
		$_SESSION['code'] = "failure";
		header($link."/tweek");
		exit;
	}
	if ($password != $password_repeat){
		$_SESSION['message'] = "Passwords don't match!";
		$_SESSION['code'] = "failure";
		header($link."/tweek");
		exit;
	}
	if (!is_valid($name) || !is_valid($password)){
		$_SESSION['message'] = "Invalid characters";
		$_SESSION['code'] = "failure";
		header($link."/tweek");
		exit;
	}
	
	
	include '../model/user.php';
	$user = new User();
	if ($user->insert($name, $email, $password)){
		$_SESSION['message'] = "User created";
		$_SESSION['code'] = "success";
		header($link."/tweek");
		exit;
	}
	else{
		$_SESSION['message'] = "User already exist.";
		$_SESSION['code'] = "failure";
		header($link."/tweek");
		exit;
	}
	
	function is_valid($str){
		if (preg_match("/'/",$str))
    		return false;
    	return true;
	}
?>
