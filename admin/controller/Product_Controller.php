<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Product_Controller extends Base_Controller
{
	public function indexAction()
	{
		$products = $this->database->query("SELECT * FROM product ORDER BY dateCreated DESC");
		$typeProduct = $this->database->query("SELECT NameType FROM typeproduct join product on typeproduct.idType = product.typeID ORDER BY product.dateCreated DESC");
		$this->view->load('product', array('products' => $products, 'typeProduct' => $typeProduct));
	}
	
	public function newAction()
	{
		$typeProduct = $this->database->query("SELECT * FROM typeproduct");
		$this->view->load('product/new_product',array('typeProduct' => $typeProduct ));
	}

	public function createAction()
	{
		$errors = array();
		
		$nameProduct = isset($_POST['name'])? $_POST['name'] : '';
		$price = isset($_POST['price'])? $_POST['price'] : '';
		$quantity = isset($_POST['quantity'])? $_POST['quantity']: '';
		$type = isset($_POST['typeProduct'])? $_POST['typeProduct']: '';
		$this->library->upload->upload($_FILES['image']);
		$new_image = $_FILES["image"]["name"];

		if(empty($nameProduct))
			$errors['name'] = "Chưa nhập tên sản phẩm";
		if(empty($price))
			$errors['price'] = "Chưa nhập giá sản phẩm";
		if(empty($quantity))
			$errors['quantity'] = "Chưa nhập số lượng sản phẩm";
		if (empty($new_image)) {
			$errors['image'] = "Chưa thêm hình ảnh sản phẩm";
		}

		if(count($errors) > 0)
		{
			$_SESSION['msg'][0] = array('type'=>'danger','msg'=>implode("<br>",$errors));
			header('Location: admin.php?c=product&a=new');
			exit();
		}
		
		$this->database->query("INSERT INTO product(Name, Price, Quantity, typeID, imageProduct) VALUES ('$nameProduct', $price, $quantity, $type, '$new_image')");
		$_SESSION['msg'][0] = array('type'=>'success','msg'=>'You have successfully created product');
		header('Location: admin.php?c=product');
	}

	public function editAction()
	{
		$product_id = $_GET['id'];
		$product = $this->database->query("SELECT * FROM product WHERE id = '$product_id'")->fetch();
		$typeProduct = $this->database->query("SELECT * FROM typeproduct");
		if($product){
			$this->view->load('product/edit_product',array('product' => $product,'typeProduct'=>$typeProduct));
		}
		else
		{
			die("cant find this product");
		}
	}

	public function updateAction()
	{
		$product_id = $_GET['id'];
		$product = $this->database->query("SELECT * FROM product WHERE id = '$product_id'")->fetch();
		if($product){
			$name = $_POST['name'];
			$price = $_POST['price'];
			$quantity = $_POST['quantity'];
			$type =$_POST['typeProduct'];
			$this->library->upload->upload($_FILES["image"]);
			$new_image = $_FILES["image"]["name"];

			$this->database->query("UPDATE product set Name='$name',Price = '$price', Quantity = '$quantity', typeID = $type WHERE id = $product_id  ");

			if (!empty($new_image)){
				$this->database->query("UPDATE product SET imageProduct = '$new_image' WHERE id = $product_id ");
			}

			$_SESSION['msg'][0] = array('type'=>'success','msg'=>'You have successfully updated product');

			header('Location: admin.php?c=product');

		}
		else
		{
			die("cant find this product");
		}
	}

	public function deleteAction()
	{
		$product_id = $_GET['id'];
		$this->database->query("DELETE FROM product WHERE id = '$product_id' ");
		$_SESSION['msg'][0] = array('type'=>'danger','msg'=>'You have successfully deleted product');
		header('Location: admin.php?c=product');
	}
}