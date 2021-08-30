<?php
class Users extends Model {

	private $info;

	public function verifyUser($number, $pass) {
		$sql = "SELECT * FROM users WHERE user_number = :unumber AND user_pass = :upass";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":unumber", $number);
		$sql->bindValue(":upass", md5($pass));
		$sql->execute();

		if($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}

	}

	public function createToken($unumber) {
		$token = md5(time().rand(0,9999).time().rand(0,9999));

		$sql = "UPDATE users SET user_token = :token WHERE user_number = :unumber";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":token", $token);
		$sql->bindValue(":unumber", $unumber);
		$sql->execute();

		return $token;
	}

	public function checkLogin() {
		if(!empty($_SESSION['token'])) {
			$token = $_SESSION['token'];

			$sql = "SELECT * FROM users WHERE user_token = :token";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":token", $token);
			$sql->execute();

			if($sql->rowCount() > 0) {
				$this->info = $sql->fetch();
				
				return true;
			}
		}

		return false;
	}

	public function addUser($user_number, $user_pass, $name) {
			$sql = "INSERT INTO users(user_number, user_pass, name) VALUES (:user_number, :user_pass, :name)";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":user_number", $user_number);
			$sql->bindValue(":user_pass", $user_pass);
			$sql->bindValue(":name", $name);
			$sql->execute();
	}

	public function getUsers() {
		$array = array();

			$sql = "SELECT * FROM users";
			$sql = $this->db->query($sql);
			$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getUserId($id) {
		$array = array();

		$sql = "SELECT * FROM users WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}

		public function delUser($id) {
		$sql = "DELETE FROM users WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}

		public function editUser($name, $user_pass, $id) {

		$sql = "UPDATE users SET name = :name, user_pass = :user_pass WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":name", $name);
		$sql->bindValue(":user_pass", $user_pass);
		$sql->bindValue(":id", $id);
		$sql->execute();
	}
}