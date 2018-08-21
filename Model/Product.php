<?php

class Product{

	private $id;
	private $name;
	private $category;
	private $price;

	private $imageList = "";

	function GetAllProducts(){

		$imageList = "";

		$conn = new mysqli('localhost', 'root', '', 'ecommerce_sample');

		$query = "SELECT * FROM product ORDER BY ProductID";

		$records = $conn->query($query);

		if($records->num_rows > 0)
		{

			while($item = $records->fetch_assoc())
			{
				$imageList = $imageList . '<div class="col-sm-4 p-3"><a href="item.php?categoryName=' . $item['CategoryName'] . '&id=' . $item['ProductID'] . '"><img class="img-fluid mx-auto d-block" src="data:image;base64,' . $item['ProductImage'] . '" width="200" height="200"></a><p>' . $item['ProductName'] . '</p><p>' . $item['ProductPrice'] . '</p></div>';
			}
		}

		else
			$imageList = '<h1>Record not found</h1>';

		return $imageList;
	}

	function GetProductByCategory(){
		$id = $_GET['categoryName'];
		$_SESSION['Category'] = $id;

		$imageList = "";

		$conn = new mysqli('localhost', 'root', '', 'ecommerce_sample');

		$query = "SELECT * FROM product WHERE CategoryName = '$id' ";

		$records = $conn->query($query);

		if($records->num_rows > 0)
		{

			while($item = $records->fetch_assoc())
			{
				$imageList = $imageList . '<div class="col-sm-4 p-3"><a href="item.php?id=' . $item['ProductID'] . '"><img class="img-fluid mx-auto d-block" src="data:image;base64,' . $item['ProductImage'] . '" width="200" height="200"></a><p>' . $item['ProductName'] . '</p><p>' . $item['ProductPrice'] . '</p></div>';
			}
		}

		else{
			$query = "SELECT CategoryName FROM Category WHERE CategoryName = '$id'";
			$records = $conn->query($query);

			if($records->num_rows > 0)
				$imageList = '<h1>No Products Found</h1>';

			else
				$imageList = '<h1>Category doesn\'t exists</h1>';

		}

		return $imageList;
	}

	function GetProductImageById(){
		$id = $_GET['id'];

		$imageList = "";

		$conn = new mysqli('localhost', 'root', '', 'ecommerce_sample');

		$query = "SELECT ProductImage FROM product WHERE ProductID = '$id' ";

		$records = $conn->query($query);

		if($records->num_rows > 0){

			while($item = $records->fetch_assoc())
				$imageList = $imageList . '<img class="img-fluid" src="data:image;base64,' . $item['ProductImage'] . '" width="200" height="200">' ;

			return $imageList;
		}
	}

	public function GetInfoById(){
		$id = $_GET['id'];
		$imageList = "";

		$conn = new mysqli('localhost', 'root', '', 'ecommerce_sample');

		$query = "SELECT * FROM product WHERE ProductID = '$id' ";

		$records = $conn->query($query);

		if($records->num_rows > 0){

			while($item = $records->fetch_assoc())
				$imageList = array($item['ProductID'], $item['ProductName'], $item['ProductPrice'], $item['CategoryName']);

			return $imageList;
		}
	}

	public function GetProductName(){
		$id = $_GET['id'];

		$conn = new mysqli('localhost', 'root', '', 'ecommerce_sample');

		$query = "SELECT ProductName FROM product WHERE ProductID = '$id' ";

		$records = $conn->query($query);

		if($records->num_rows > 0){

			while($item = $records->fetch_assoc())
				return $item['ProductName'];
		}
	}
}