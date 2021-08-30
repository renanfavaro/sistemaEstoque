<?php
class homeController extends Controller {

	private $user;

	public function __construct() {
		parent::__construct();

		$this->user = new Users();
		if(!$this->user->checkLogin()) {
			header("Location: ".BASE_URL."login");
			exit;
		}
	}

    /*type_alert = vamos informar qual foi a situação ref. a tentativa de alteração de produto no BD
    * 1 = Sucesso
    * 2 = Erro, produto inexistente
    * 3 = Erro, ação não permitida
    * 4 = Erro, produto/código não encontrado/inexistente.
    * 5 = Erro, infelizmente não foi possível realizar está ação ref. ao produto, por favor contate o administrador.
    */

    public function index($type_alert = '') {
        $data = array(
            'menu' => array(
                BASE_URL.'home/add' => 'Novo Produto',
                BASE_URL.'usuario' => 'Usuarios',
                BASE_URL.'relatorio' => 'Relatório Reposição',
                BASE_URL.'relatorio/product_report' => 'Relatório Entrada/Saída',
                BASE_URL.'login/sair' => 'Sair',
            )
        );
        $item = new products();
        $s = '';
        $offset = 0;
        $limit = 5;
        $limit_pages = 2;

        if(!empty($_GET['busca'])) {
        	$s = $_GET['busca'];
        }

        $total = $item->getTotal();
        $data['paginas'] = ceil(($total / $limit));
        $paginas = $data['paginas'];

        $data['paginaAtual'] = 1;
        if(!empty($_GET['p'])) {
            $data['paginaAtual'] = intval($_GET['p']);
        }
        $paginaAtual = $data['paginaAtual'];

        $offset = ($data['paginaAtual'] * $limit) - $limit;

        $data['list'] = $item->getProducts($s, $offset, $limit);

        $init_page = ((($paginaAtual - $limit_pages) > 1) ? $paginaAtual - $limit_pages : 1);
        $end_page = ((($paginaAtual + $limit_pages) < $paginas) ? $paginaAtual + $limit_pages : $paginas);
        $data['init_page'] = $init_page;
        $data['end_page'] = $end_page;

        $this->loadTemplate('home', $data);
    }

    public function add() {
    	$data = array(
            'menu' => array(
                BASE_URL.'home' => 'Voltar'
            )
        );
    	$p = new Products();

        if(!empty($_POST['cod'])) {
            $cod = filter_input(INPUT_POST, 'cod', FILTER_VALIDATE_INT);
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $price = $this->filter_post_money('price');
            $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
            $min_quantity = filter_input(INPUT_POST, 'min_quantity', FILTER_VALIDATE_INT);

            if($cod && $name && $price && $quantity && $min_quantity) {
        		$p->addProduct($cod, $name, $price, $quantity, $min_quantity);

        		header("Location:".BASE_URL);
        		exit;
            } else {
                $data['warning'] = 'Digite os campos coretamente.';
            }
    	}

    	$this->loadTemplate('add', $data);
    }

    public function productEntry() {
        $data = array();
        $p = new Products();
        //var_dump($_POST); exit;

        /*type_alert = vamos informar qual foi a situação ref. a tentativa de alteração de produto no BD
        * 1 = Sucesso
        * 2 = Erro, produto inexistente
        * 3 = Erro, ação não permitida
        * 4 = Erro, produto/código não encontrado/inexistente.
        * 5 = Erro, infelizmente não foi possível realizar está ação ref. ao produto, por favor contate o administrador.
        */
        
        if(isset($_POST['cod']) && !empty($_POST['cod'])) {
            if($_POST['type_action'] == 1) {

                if($p->checkIfProductExists($_POST) == true) {
                    
                    if($p->editQuantityOfProducts($_POST) == true) {
                        $p->insertInformationInTheReport($_POST);
                        header("Location: ".BASE_URL."home");
                        $_SESSION['type_alert'] = 1;
                    } else {
                        header("Location: ".BASE_URL."home");
                        $_SESSION['type_alert'] = 5;
                    }

                } else {
                    header("Location: ".BASE_URL."home");
                    $_SESSION['type_alert'] = 4;
                }

            } elseif($_POST['type_action'] == 2) {

                if($p->checkIfProductExists($_POST) == true) {

                    if($p->editQuantityOfProducts($_POST) == true) {
                        $p->insertInformationInTheReport($_POST);
                        header("Location: ".BASE_URL."home");
                        $_SESSION['type_alert'] = 1;
                    } else {
                        header("Location: ".BASE_URL."home");
                        $_SESSION['type_alert'] = 5;
                    }

                } else {
                    header("Location: ".BASE_URL."home");
                    $_SESSION['type_alert'] = 4;
                }

            } else {
                header("Location: ".BASE_URL."home");
                $_SESSION['type_alert'] = 3;
            }
        } else {
            header("Location: ".BASE_URL."home");
            $_SESSION['type_alert'] = 2;
        }

    }

    public function filter_post_money($t) {
        $price = filter_input(INPUT_POST, $t);
        $price = str_replace('.', '', $price);
        $price = str_replace(',', '.', $price);
        $price = filter_var($price, FILTER_VALIDATE_FLOAT);

        return $price;
    }

    public function edit($id) {
    	$data = array(
            'menu' => array(
                BASE_URL => 'Voltar'
            )
        );
    	$p = new Products();

    	if(!empty($_POST['cod'])) {
    		$cod = filter_input(INPUT_POST, 'cod', FILTER_VALIDATE_INT);
    		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    		$price = $this->filter_post_money('price');
    		$quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
            $min_quantity = filter_input(INPUT_POST, 'min_quantity', FILTER_VALIDATE_INT);

            if($cod && $name && $price && $quantity && $min_quantity) {
                $p->editProduct($cod, $name, $price, $quantity, $min_quantity, $id);

                header("Location: ".BASE_URL);
                exit;
            } else {
                $data['warning'] = 'Digite os campos coretamente.';
            }
    	}

    	$data['info'] = $p->getProduct($id);

    	$this->loadTemplate('edit', $data);
    }

    public function del($id) {
        $p = new Products();

        if(!empty($id)) {
            $p->delProduct($id);
        }

        header('Location: '.BASE_URL);
    }

}








