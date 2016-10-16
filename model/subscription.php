<?php 
class Subscription{
	public function __construct(){

	}
	public function subscribe_to($user_id,$subscription_id){
		require ('connection.php');
   		mysqli_set_charset($conn,"utf8");
   		$query = "INSERT INTO subscribed_to (id_user, id_subscription) VALUES (".$user_id.",".$subscription_id.");";
   		if(mysqli_query($conn, $query)){
   			$conn->close();
   			return true;
   		}
   		$conn->close();
   		return false;

	}
	public function unsubscribe_from($user_id,$subscription_id){
		require ('connection.php');
   		mysqli_set_charset($conn,"utf8");
   		$query = "DELETE FROM subscribed_to WHERE id_user = ".$user_id." AND id_subscription = " .$subscription_id. ";";
   		if(mysqli_query($conn, $query)){
   			$conn->close();
   			return true;
   		}
   		$conn->close();
   		return false;

	}
   	public function get_all_subscriptions($user_id){
   		require ('connection.php');
   		mysqli_set_charset($conn,"utf8");
		$query = "SELECT * FROM subscriptions WHERE id NOT IN (SELECT id_subscription FROM subscribed_to where id_user = ".$user_id.");";
   		$result = mysqli_query($conn, $query);
   		$array = array();
   		$i = 0; 
   		while($row = mysqli_fetch_assoc($result)){
   			$array[$i] = array("id"=>$row['id'], "title"=>$row['title']);
   			$i = $i + 1;
   		}
   		$conn->close();
   		return $array;
   	}
}

?>