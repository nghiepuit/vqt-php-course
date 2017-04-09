<?php 
if (isset($_GET["act"])) {
	
	include 'models/Product.php';

	$act = $_GET["act"];
	switch ($act) {
		case 'add':
			include 'resources/views/product/add.php';
			break;
		case 'edit':
			include 'resources/views/product/edit.php';
			break;
		case 'delete':
			include 'resources/views/product/delete.php';
			break;
		case 'list':
			include 'resources/views/product/list.php';
			break;
		default:
			include 'resources/views/product/list.php';
			break;
	}
} else {
	include 'resources/views/product/list.php';
}
?>