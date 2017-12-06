<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
class Home_Controller extends Base_Controller
{
	public function indexAction(){
		$products = $this->database->query("SELECT * FROM product ORDER BY dateCreated DESC LIMIT 4");
		$this->view->load('index',array('products'=>$products));
	}

	public function registerAction(){
		$this->view->load('register');
	}

	public function loginAction(){
		$this->view->load('login');
	}

	public function contactAction(){
		$this->view->load('contact');
	}

	public function searchAction(){
		$key = $_POST['key'];
		$data['products'] = $this->database->query("SELECT * FROM product WHERE Name LIKE '%$key%'");
		$data['result'] = 'Kết quả';
		$this->view->load('product-search-page', $data);
	}

	public function searchByTypeAction(){
		$key = $_GET['key'];
		switch ($key) {
			case 'hot':
			$data['products'] = $this->database->query("SELECT * FROM product ORDER BY rating DESC");
			$data['result'] = 'Kết quả';
			$this->view->load('productSearch', $data);
			break;
			
			case 'newest':
			$data['products'] = $this->database->query("SELECT * FROM product ORDER BY dateCreated DESC");
			$data['result'] = 'Kết quả';
			$this->view->load('productSearch', $data);
			break;

			case 'cheap':
			$data['products'] = $this->database->query("SELECT * FROM product ORDER BY Price ASC");
			$data['result'] = 'Kết quả';
			$this->view->load('productSearch', $data);
			break;
		}
	}


}
?>