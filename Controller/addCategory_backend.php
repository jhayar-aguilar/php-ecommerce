<?php 

$category_error = "";
$category_style = "";

if(isset($_POST['btnBack'])){
	header('Location: index.php');	
}

if(isset($_POST['btnSave'])){
	
	$name = $_POST['txtCategoryName'];

	if(empty($name)){
		$category_error = '<p class="text-danger"><small><i class="fa fa-exclamation-triangle"></i> Category required</small></p>';
		$category_style = 'style="border: 1px solid red;"';

		return;
	}

	$conn = new mysqli('localhost', 'root', '', 'ecommerce_sample');

	$query = "INSERT INTO Category(CategoryName) VALUES ('" . $name . "')"; 

	$records = $conn->query($query);

	if($records === TRUE)
		header('location: success.php');

	else{
		$query = "SELECT CategoryName FROM Category WHERE CategoryName = '$name'";
		$records = $conn->query($query);

		if($records->num_rows > 0){
			$category_error = '<p class="text-danger"><small><i class="fa fa-exclamation-triangle"></i> Category already exists</small></p>';
			$category_style = 'style="border: 1px solid red;"';
		}
	}
}