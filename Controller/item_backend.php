<?php

session_start();

$changes = "";

if(isset($_POST['btnBack'])){

	header('location: items.php?categoryName=' . $_SESSION['Category']);
}

if(isset($_POST['btnBackIndex'])){
	header('location: index.php');
}

if(isset($_POST['btnUpdate'])){
	$id = $_GET['id'];
	$page = $_SERVER['PHP_SELF'];

	$conn = new mysqli('localhost', 'root', '', 'ecommerce_sample');

	$query = "UPDATE Product SET";
	$name = "";
	$price = "";

	$image = "";

	if(!empty($_POST['txtProdName']))
	 	$name = " ProductName = '" . $_POST['txtProdName'] . "'";

	if(!empty($_POST['txtProdPrice']) && is_numeric($_POST['txtProdPrice']) && $_POST['txtProdPrice'] > 0){
		$price = " ProductPrice = " . $_POST['txtProdPrice'];

		if($name != '')
			$price = "," . $price;
	}

	if($_FILES['btnImage']['tmp_name'] != ''){
		$check = getimagesize($_FILES['btnImage']['tmp_name']);

		if($check == TRUE){
			$image = " ProductImage = '" . base64_encode(file_get_contents($_FILES['btnImage']['tmp_name'])) . "'";

			if($name != '')
				$image = ", ". $image;
		}
		
	}

	$query = $query . $name . $price . $image . ' WHERE ProductID = ' . $id;
	$records = $conn->query($query);

	if($records === TRUE)
		header('Refresh: 3; url: $page');

	else
		$changes = '<div class="alert alert-info alert-dismissible fade show mt-3"><button type="button" class="close" data-dismiss="alert">&times;</button>No data is being updated.</div>';
}

if(isset($_POST['btnDelete'])){
	$id = $_GET['id'];
	$category = $_SESSION['Category'];

	$conn = new mysqli('localhost', 'root', '', 'ecommerce_sample');

	$query = "DELETE FROM Product WHERE ProductID = '$id'";

	$records = $conn->query($query);

	if($records === TRUE)
		header("location: items.php?categoryName=" . $category);
}