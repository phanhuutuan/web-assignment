<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>BKShop | Mua Online Quần &#193;o Thời Trang Nam Nữ Gi&#225; Rẻ - BKShop.vn</title>
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="site/view/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="site/view/stylesheet/font-awesome.min.css">
	
	<script src="site/view/js/jquery-3.1.0.min.js"></script>
	<script src="site/view/bootstrap/js/bootstrap.min.js"></script>


	<!-- INCLUDE PAGE CSS -->
	<link rel="stylesheet" href="site/view/stylesheet/css/index.css">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<!--<% login = logins[0] %>-->
	<?php

if (isset($_SESSION['msg']))
	{
	$messages = $_SESSION['msg'];
	unset($_SESSION['msg']);
	foreach($messages as $message)
		{
?>
	<div class="alert alert-<?php
		echo $message['type'] ?> alert-dismissible" role="alert" style="text-align:center; margin-bottom: 0px;">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	    <?php
		echo $message['msg'] ?>
	</div>
	<?php
		}
	}

?>
	
	<?php
require_once PATH_APPLICATION . '/view/snippet/header.php';

require_once PATH_APPLICATION . '/view/' . $view . '.php';

require_once PATH_APPLICATION . "/view/snippet/footer.php";

?>

</body>
</html>