<?php 
class User{
	public $name;
	public $email;
	public $password;

	public function __construct() {
       
   	}
   	
   	public function validate($email, $password){ // 0 - correct. 1- not exist. 2 - password doesnt match
		require ('connection.php');
   		mysqli_set_charset($conn,"utf8");
		$query = "SELECT * FROM Users WHERE email = '".$email."';";
   		$result = mysqli_query($conn, $query);
   		if (mysqli_num_rows($result) <= 0){
   			$conn->close();
   			return 1;
   		}
   		while($row = mysqli_fetch_assoc($result)) {
   			$key = $config['key'];
   			$data = base64_decode($row['password']);
			$iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));
			$decrypted = rtrim(
			    mcrypt_decrypt(
			        MCRYPT_RIJNDAEL_128,
			        hash('sha256', $key, true),
			        substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
			        MCRYPT_MODE_CBC,
			        $iv
			    ),
			    "\0"
			);
			if ($password != $decrypted){
				$conn->close();
				return 2;
			}
			else{
				$conn->close();
				return 0;
			}
   		}

   	}
   	public function get_id($email){
   		require ('connection.php');
   		$query = "SELECT * FROM Users WHERE email = '".$email."';";
   		$result = mysqli_query($conn, $query);
   		$row = mysqli_fetch_assoc($result);
   		$conn->close();
   		return $row['id'];	
   	}
   	public function get_info($id){

   	}
	public function insert($name, $email, $password){
		require ('connection.php');
		$iv = mcrypt_create_iv(
	    mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),
		    MCRYPT_DEV_URANDOM
		);
		$key = $config['key'];
		$string = $password;
		$encrypted = base64_encode(
		    $iv .
		    mcrypt_encrypt(
		        MCRYPT_RIJNDAEL_128,
		        hash('sha256', $key, true),
		        $string,
		        MCRYPT_MODE_CBC,
		        $iv
		    )
		);
		mysqli_set_charset($conn,"utf8");
		$query = "SELECT * FROM Users WHERE email = '".$email."';";
   		$result = mysqli_query($conn, $query);
   		if (mysqli_num_rows($result) > 0){
   			return false;
   		}
		$query = "INSERT INTO Users (name,email,password) VALUES ('".$name."','".$email."','".$encrypted."');";
		echo $query;
		if (mysqli_query($conn, $query)){
			$conn->close();
			return true;
		}
		else{
			$conn->close();
			return false; 
		}
	}
	public function get_news($user_id){
   		require ('connection.php');
   		mysqli_set_charset($conn,"utf8");
		$query = "SELECT s.id, s.url  FROM subscriptions AS s, users AS u, subscribed_to AS st WHERE s.id = st.id_subscription AND u.id = st.id_user AND st.id_user = '".$user_id."';";
   		$url = mysqli_query($conn, $query);
   		$array = array();
   		$i = 0; 
   		while($row = mysqli_fetch_assoc($url)) {
   			$array[$i] = array("id" => $row['id'], "url" => $row['url']);
   			$i = $i + 1; 
   		}
   		$conn->close();
   		return $array;
   	}
	public function exist($email){
   		require ('connection.php');
   		
   	}

}

?>