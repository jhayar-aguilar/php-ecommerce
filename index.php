<?php
include('Model/Category.php');

$c = new Category;

?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-commerce</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="Assets/Images/cart.ico">
</head>

<body>

	<header>
		<nav class="navbar justify-content-center navbar-expand-sm bg-dark navbar-dark">
			<a class="navbar-brand" href="#">E-Commerce Sample</a>
		</nav>
	</header>

	<div class="container">
		<div class="mt-3 mb-3">
			<nav class="mt-3">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active">Home</li>
				</ol>
			</nav>

			<h3 class="border-bottom p-1">Categories:</h3>
		</div>

		<div class="row">
			<?php echo $c -> DisplayCategoriesLink();?>
		</div>

	</div>

	<div class="container">
		<div class="mt-3 mb-3">
			<h3 class="border-bottom p-1">Options:</h3>
		</div>

		<div class="row">

			<div class="col-sm-4 p-3">
				<a class="btn btn-info btn-block text-white" href="products.php">
					<i class="fa fa-dropbox"></i> All Products
				</a>
			</div>

			<div class="col-sm-4 p-3">
				<a class="btn btn-info btn-block text-white" href="addCategory.php">
					<i class="fa fa-tag"></i> Add a Category
				</a>
			</div>

			<div class="col-sm-4 p-3">
				<a class="btn btn-info btn-block text-white" href="addProduct.php">
					<i class="fa fa-dropbox"></i> Add a Product
				</a>
			</div>
		</div>

	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>

</html>