<?php
class usuarioController extends Controller {

	public function __construct() {
		parent::__construct();

		$this->user = new Users();
		if(!$this->user->checkLogin()) {
			header("Location: ".BASE_URL."login");
			exit;
		}
	}

	public function index() {
		$data = array(
			'menu' => array(
				BASE_URL.'home' => 'Voltar',
				BASE_URL.'usuario/add_user' => 'Novo Usuario'
			)
		);
		$u = new Users();

		
		$data['list'] = $u->getUsers();

		$this->loadTemplate('usuario', $data);
	}

	public function add_user() {
    	$data = array(
            'menu' => array(
                BASE_URL.'usuario' => 'Voltar'
            )
        );
    	$u = new Users();

        if(!empty($_POST['user_number'])) {
            $user_number = filter_input(INPUT_POST, 'user_number', FILTER_VALIDATE_INT);
            $pass = md5($_POST['pass']);
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            

            if($user_number && $pass && $name) {
        		$u->addUser($user_number, $pass, $name);

        		header("Location:".BASE_URL.'/usuario');
        		exit;
            } else {
                $data['warning'] = 'Digite os campos coretamente.';
            }
    	}

    	$this->loadTemplate('add_user', $data);
    }

    public function del($id) {
        $u = new Users();

        if(!empty($id)) {
            $u->delUser($id);
        }

        header('Location: '.BASE_URL.'/usuario');
    }

    public function edit($id) {
    	$data = array(
            'menu' => array(
                BASE_URL => 'Voltar'
            )
        );
    	$u = new Users();

    	if(!empty($_POST['name'])) {
    		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    		$pass = md5($_POST['pass']);

            if($name && $pass) {
                $u->editUser($name, $pass, $id);

                header("Location: ".BASE_URL.'/usuario');
                exit;
            } else {
                $data['warning'] = 'Digite os campos coretamente.';
            }
    	}

    	$data['info'] = $u->getUserId($id);

    	$this->loadTemplate('edit_user', $data);
    }

}

