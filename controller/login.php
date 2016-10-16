<?php
	session_start();
	$email = $_POST['email'];
	$password = $_POST['password'];
	$regex = "/[a-zA-Z0-9\_\-\.]+@[a-zA-Z0-9\-]+.[a-z]+/";
	$link = "Location: http://".$_SERVER['HTTP_HOST'];
	if (!isset($email) || $email == "" || !isset($password) || $password == "" ){
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
	include '../model/user.php';
	include '../model/subscription.php';
	$user = new User();	
	$subs = new subscription();
	$validation = $user->validate($email, $password); // 0 - correct. 1- not exist. 2 - password doesnt match
	if ($validation == 0){
		$id = $user->get_id($email);
		$_SESSION['user_id'] = $id;

		/*load subscriptions */
		$_SESSION['subs'] = $subs->get_all_subscriptions($id);
		/*load news*/ 
		$_SESSION['feed'] = $user->get_news($id);
		header($link."/tweek/view/home.php");
		exit;
	}
	if ($validation == 1){
		$_SESSION['message'] = "This email is not registered yet";
		$_SESSION['code'] = "failure";
		header($link."/tweek");
		exit;
	}
	if ($validation == 2){
		$_SESSION['message'] = "Wrong password";
		$_SESSION['code'] = "failure";
		header($link."/tweek");
		exit;
	}

?>