<?php
class relatorioController extends Controller {

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
				BASE_URL.'home' => 'Voltar'
			)
		);
		$p = new Products();

		$data['list'] = $p->getLowQuantityProducts();

		$this->loadTemplate('relatorio', $data);
	}

	public function product_report($filtos='') {
		$data = array(
			'menu' => array(
				BASE_URL.'home' => 'Voltar'
			)
		);
		$p = new Products();
		$filtros = '';

		$data['filtros']['saida'] = array(
			'Devolução Fornecedor' => '',
			'Envio Loja' => '',
			'Envio Site' => ''
		);
		if(isset($_GET['filtros'])) {
			$data['filtros'] = $_GET['filtros'];
		}

		$data['list'] = $p->getProductReport($filtros);

		$this->loadTemplate('product_report', $data);
	}

}