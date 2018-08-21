<?php 

$prodID_message = "";		//Validation for Product ID
$prodID_style = "";
$prodID_input = "";

$prodName_message = "";		//Validation for Product Name
$prodName_style = "";
$prodName_input = "";

$prodPrice_message = "";	//Validation for Product Price
$prodPrice_style = "";
$prodPrice_input = "";

$category_message = "";		//Validation for Category
$category_style = "";
$category_input = "";

$prodImage = "";			//Product Image

if(isset($_POST['btnBack'])){
	header('Location: index.php');	
}

if(isset($_POST['btnSave']) ){

	//Local Variables
	$id = $_POST['txtProdID'];
	$prodName = $_POST['txtProdName'];
	$categoryName = $_POST['category'];
	$prodPrice = $_POST['txtProdPrice'];

	$conn = new mysqli('localhost', 'root', '', 'ecommerce_sample');

	//Product ID Validation
	if(empty($id)){
		$prodID_message = '<p class="text-danger"><small><i class="fa fa-exclamation-triangle"></i> Product ID required</small></p>';
		$prodID_style = 'style="border: 1px solid red;"';
	}

	else if(!is_numeric($id) || $id <= 0){
		$prodID_message = '<p class="text-danger"><small><i class="fa fa-exclamation-triangle"></i> Product ID invalid</small></p>';
		$prodID_style = 'style="border: 1px solid red;"';
	}
	
	else{
		$query = "SELECT ProductID FROM Product WHERE ProductID = '" . $_POST['txtProdID'] . "'"; 

		$records = $conn->query($query);

		if($records->num_rows > 0){
			$prodID_message = '<p class="text-danger"><small><i class="fa fa-exclamation-triangle"></i> Product ID already exists</small></p>';
			$prodID_style = 'style="border: 1px solid red;"';
		}

		else{
			$prodID_message = '<i class=" text-success fa fa-check-circle"></i>';
			$prodID_style = 'style="border: 1px solid green"';
			$prodID_input = $_POST['txtProdID'];
		}
		
	}

	//Category Validation
	if(empty($categoryName)){
		$category_message = '<p class="text-danger"><small><i class="fa fa-exclamation-triangle"></i> Category required</small></p>';
		$category_style = 'style="border: 1px solid red;"';
	}

	else{
		$category_message = '<i class=" text-success fa fa-check-circle"></i>';
		$category_style = 'style="border: 1px solid green"';
		$category_input =  $_POST['category'];
	}

	//Product Name Validation
	if(empty($prodName)){
		$prodName_message = '<p class="text-danger"><small><i class="fa fa-exclamation-triangle"></i> Product Name required</small></p>';
		$prodName_style = 'style="border: 1px solid red;"';
	}

	else{
		$prodName_message = '<i class=" text-success fa fa-check-circle"></i>';
		$prodName_style = 'style="border: 1px solid green"';
		$prodName_input = $_POST['txtProdName'];
	}

	//Product Price Validation
	if(empty($prodPrice)){
		$prodPrice_message = '<p class="text-danger"><small><i class="fa fa-exclamation-triangle"></i> Product Price required</small></p>';
		$prodPrice_style = 'style="border: 1px solid red;"';
	}

	else if(!is_numeric($_POST['txtProdPrice']) || $_POST['txtProdPrice'] <= 0){
		$prodPrice_message = '<p class="text-danger"><small><i class="fa fa-exclamation-triangle"></i> Product Price invalid</small></p>';
		$prodPrice_style = 'style="border: 1px solid red;"';
	}

	else{
		$prodPrice_message = '<i class=" text-success fa fa-check-circle"></i>';
		$prodPrice_style = 'style="border: 1px solid green"';
		$prodPrice_input = $_POST['txtProdPrice'];
	}

	//To avoid creating unwanted data.
	if($prodID_input == '' && $category_input == '' && $prodName_input == '' && $prodPrice_input == ''){
		return;
	}

	//Inserting data
	if($_FILES['btnImage']['tmp_name'] != ''){
		$check = getimagesize($_FILES['btnImage']['tmp_name']);

		if($check == TRUE)
			$prodImage = base64_encode(file_get_contents($_FILES['btnImage']['tmp_name']));
		else
			return;
	}
	else
		$prodImage = base64_encode(file_get_contents('Assets/Images/empty.png'));

	$query = "INSERT INTO Product(ProductID, ProductName, CategoryName, ProductPrice, ProductImage) VALUES ('$id', '$prodName', '$categoryName', '$prodPrice', '$prodImage' )"; 

	$records = $conn->query($query);

	//If inserting data is success
	if($records === TRUE)
		header('location: success.php');

	//Inserting data fails
	// else{

	// 	$query = "SELECT ProductID FROM Product WHERE ProductID = '" . $_POST['txtProdID'] . "'"; 

	// 	$records = $conn->query($query);

	// 	if($records->num_rows > 0){
	// 		$prodID_message = '<p class="text-danger"><small><i class="fa fa-exclamation-triangle"></i> Product ID already exists</small></p>';
	// 		$prodID_style = 'style="border: 1px solid red;"';
	// 	}
	// }
}