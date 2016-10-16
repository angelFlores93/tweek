<?php
	session_start();
	include '../model/subscription.php';
	include '../model/user.php';
	$id_subscription = $_POST['id_subscription'];
	$id_action = $_POST['id_action'];
	$id_user = $_POST['id_user'];
	$subs = new Subscription();
	$user = new User();
	$link = "Location: http://".$_SERVER['HTTP_HOST'];
	if (isset($id_action)){
		if ($id_action == 0) {// subscribe
			if ($subs->subscribe_to($id_user, $id_subscription)){
				$_SESSION['subs'] = $subs->get_all_subscriptions($id_user);
				/*load news*/ 
				$_SESSION['feed'] = $user->get_news($id_user);
				$_SESSION['user_id'] = $id_user;
				$_SESSION['message'] = "Subcribed to new content!";
				$_SESSION['code'] = "success";
				header($link."/tweek/view/home.php");
				exit;
			}else{
				$_SESSION['message'] = "An error ocurred";
				$_SESSION['code'] = "failure";
				header($link."/tweek/view/home.php");
				exit;
			}
		}else{//unsubscribe
			if ($subs->unsubscribe_from($id_user, $id_subscription)){
				$_SESSION['subs'] = $subs->get_all_subscriptions($id_user);
				/*load news*/ 
				$_SESSION['feed'] = $user->get_news($id_user);
				$_SESSION['user_id'] = $id_user;
				$_SESSION['message'] = "Unsubcribed from topic";
				$_SESSION['code'] = "success";
				header($link."/tweek/view/home.php");
				exit;
			}else{
				$_SESSION['message'] = "An error ocurred";
				$_SESSION['code'] = "failure";
				header($link."/tweek/view/home.php");
				exit;
			}
		}
	}

?>