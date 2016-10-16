<?php 
class LoginTest extends \PHPUNIT_Framework_TestCase{
	public function testLogin_user_not_registered(){
		require('../model/user.php');
		$user = new User();
		$this->assertEquals($user->validate("asdf@adsfjd.com", "asdf"),1);

	}
	public function testLogin_passwords_dont_match(){
		$user2 = new User();
		$this->assertEquals($user2->validate("aaflores93@gmail.com", "asdf"),2);
	}
	public function testLogin_correct(){
		$user3 = new User();
		$this->assertEquals($user3->validate("aaflores93@gmail.com", "Dragones93"),0);
	}
}

?>
