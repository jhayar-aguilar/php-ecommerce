<?php

include('Controller/Connection.php');

class Category{

	public function DisplayCategories($value){
		$categoryList = "";

		$conn = new mysqli('localhost', 'root', '', 'ecommerce_sample');

		$query = "SELECT CategoryName FROM Category";

		$records = $conn->query($query);

		if($records->num_rows > 0){
			while($item = $records->fetch_assoc()){
				if($value == $item['CategoryName'])
					$categoryList = $categoryList . '<option value = "' . $item["CategoryName"] .'" selected="selected">' . $item["CategoryName"] . '</option>';
				else
					$categoryList = $categoryList . '<option value = "' . $item["CategoryName"] .'">' . $item["CategoryName"] . '</option>';	
			}
			return $categoryList;
			//return $item["CategoryName"];
		}
		else
			return "No categories found";
	}

	public function DisplayCategoriesLink(){
		$categoryList = "";

		$conn = new mysqli('localhost', 'root', '', 'ecommerce_sample');

		$query = "SELECT CategoryName FROM Category";

		$records = $conn->query($query);

		if($records->num_rows > 0){
			while($item = $records->fetch_assoc())
				$categoryList = $categoryList . '<div class="col-sm-4 p-3"><a class="btn btn-primary btn-block text-white" href="items.php?categoryName=' . $item['CategoryName'] . '">' . $item['CategoryName'] . '</a></div>';

				//$categoryList = $categoryList . '<div class="card bg-primary text-center"><div class="card-body"><a class="text-white" href="items.php?categoryName=' . $item["CategoryName"] . '">' . $item['CategoryName'] . '</a></div></div>';

				//'<a href="items.php?categoryName=' . $item["CategoryName"] . '">' . $item['CategoryName'] . '</a><br/>';

				//$categoryList = $categoryList . '<a href="items.php">' . $item["CategoryName"] . '</a><br/>';	
			return $categoryList;
			//return $item["CategoryName"];
		}
		else
			return "No categories found";
	}

	public function GetCategory(){
		return $_SESSION['Category'];
	}

	public function CheckCategory(){
		$category = $_GET['categoryName'];

		$conn = new mysqli('localhost', 'root', '', 'ecommerce_sample');

		$query = "SELECT CategoryName FROM Category WHERE CategoryName = '$category'";
		$records = $conn->query($query);

		if($records->num_rows > 0)
			return $category;
		else
			return '';
	}
	
}