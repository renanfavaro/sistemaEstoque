<?php
class loginController extends Controller {

	public function index() {
		$data = array(
			'msg' => ''
		);

		if(!empty($_POST['number'])) {
			$unumber = $_POST['number'];
			$upass = $_POST['password'];

			$users = new Users();

			if($users->verifyUser($unumber, $upass)) {
				$token = $users->createToken($unumber);
				$_SESSION['token'] = $token;
				$_SESSION['unumber'] = $unumber;

				header("Location: ".BASE_URL);
				exit;
			} else {
				$data['msg'] = 'Numero e/ou senha incorretos';
			}
		}

		$this->loadView('login', $data);

	}

	public function sair() {
		unset($_SESSION['token']);
		header("Location: ".BASE_URL."Login");
	}

}