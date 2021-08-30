<?php
class Products extends Model {

	public function getProducts($s='', $offset, $limit) {
		$array = array();

		if(!empty($s)) {
			$sql = "SELECT * FROM products WHERE cod = :cod OR name LIKE :name";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":cod", $s);
			$sql->bindValue(":name", '%'.$s.'%');
			$sql->execute();
		} else {
			$sql = "SELECT * FROM products LIMIT $offset, $limit";
			$sql = $this->db->query($sql);
		}

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	private function verifyProduct($cod, $name) {
		return true;
	}

	public function addProduct($cod, $name, $price, $quantity, $min_quantity) {

		if($this->verifyProduct($cod, $name)) {
			$sql = "INSERT INTO products(cod, name, price, quantity, min_quantity) VALUES (:cod, :name, :price, :quantity, :min_quantity)";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":cod", $cod);
			$sql->bindValue(":name", $name);
			$sql->bindValue(":price", $price);
			$sql->bindValue(":quantity", $quantity);
			$sql->bindValue(":min_quantity", $min_quantity);
			$sql->execute();
		} else {
			return false;
		}

	}

	public function editProduct($cod, $name, $price, $quantity, $min_quantity, $id) {

		if($this->verifyProduct($cod, $name)) {
			$sql = "UPDATE products SET cod = :cod, name = :name, price = :price, quantity = :quantity, min_quantity = :min_quantity WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":cod", $cod);
			$sql->bindValue(":name", $name);
			$sql->bindValue(":price", $price);
			$sql->bindValue(":quantity", $quantity);
			$sql->bindValue(":min_quantity", $min_quantity);
			$sql->bindValue(":id", $id);
			$sql->execute();
		} else {
			return false;
		}

	}

	public function delProduct($id) {
		$sql = "DELETE FROM products WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}

	public function getProduct($id) {
		$array = array();

		$sql = "SELECT * FROM products WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}

	public function getLowQuantityProducts() {
		$array = array();

		$sql = "SELECT * FROM products WHERE quantity < min_quantity";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function checkIfProductExists($data) {
		$sql = "SELECT * FROM products WHERE cod = :cod";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":cod", $data['cod']);
		$sql->execute();

		if($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function editQuantityOfProducts($data) {
		
		if($data['type_action'] == 1) {
			$sql = "UPDATE products SET quantity = ( quantity + :quantity ) WHERE cod = :cod";
		} else {
			$sql = "UPDATE products SET quantity = ( quantity - :quantity ) WHERE cod = :cod";
		}

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":quantity", $data['quantity']);
		$sql->bindValue(":cod", $data['cod']);
		$sql->execute();

		if($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function insertInformationInTheReport($data) {
		date_default_timezone_set('America/Sao_Paulo');
		$date_report = date("Y-m-d H:i:s");

		$sql = "INSERT INTO product_report 
		(user_number, cod_products, type_action, date_report, quantity, operacao) VALUES 
		(:user_number, :cod_products, :type_action, :date_report, :quantity, :operacao)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":user_number", $_SESSION['unumber']);
		$sql->bindValue(":cod_products", $data['cod']);
		$sql->bindValue(":type_action", $data['type_action']);
		$sql->bindValue(":date_report", $date_report);
		$sql->bindValue(":quantity", $data['quantity']);
		$sql->bindValue(":operacao", $data['operacao']);
		$sql->execute();

		if($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}


	public function getProductReport() {
		$array = array();

		$filtrostring = array('1=1');
		if(!empty($filtros['Devolução Fornecedor'])) {
			$filtrostring[] = 'product_report.operacao = operacao';
		}
		if(!empty($filtros['Envio Loja'])) {
			$filtrostring[] = 'product_report.operacao = operacao';
		}
		if(!empty($filtros['Envio Site'])) {
			$filtrostring[] = 'product_report.operacao = operacao';
		}

		if(!empty($filtros)) {
			$sql = "SELECT * FROM product_report WHERE operacao = :operacao WHERE ".implode(' AND ', $filtrostring)." ";
			$sql = $this->db->prepare($sql);

			if(!empty($filtros['Devolução Fornecedor'])) {
				$sql->bindValue(':operacao', $filtros['saida']);
			}
			if(!empty($filtros['Envio Loja'])) {
				$sql->bindValue(':operacao', $filtros['saida']);
			}
			if(!empty($filtros['Envio Site'])) {
				$sql->bindValue(':operacao', $filtros['saida']);
			}

			$sql->execute();
		} else {
			$sql = "SELECT * FROM product_report ORDER BY id DESC LIMIT 30";
			$sql = $this->db->query($sql);
		}

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getTotal() {
		$sql = "SELECT COUNT(*) as c FROM products";
		$sql = $this->db->query($sql);
		$sql = $sql->fetch();

		return $sql['c'];
	}

}