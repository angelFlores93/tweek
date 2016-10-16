<?php 
class RegisterTest extends \PHPUNIT_Framework_TestCase{

	public function testRegister_registered_already(){
		require('../model/user.php');
		$user = new User();
		$this->assertEquals($user->insert("Angel", "aaflores93@gmail.com", "asdf"), 0);
	}
	public function testRegister_registration_ok(){
		$user2 = new User();
		$this->assertEquals($user2->insert("Angel", "asdf@kfkkea.com", "asdf"), 1);
	}
}


?>