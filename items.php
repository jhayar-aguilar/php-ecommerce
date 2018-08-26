<?php

include('Model/Product.php');
include('Model/Category.php');

$p = new Product;
$c = new Category;

session_start();

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

<body style="margin: 0;">

	<header>
		<nav class="navbar justify-content-center navbar-expand-sm bg-dark navbar-dark">
			<a class="navbar-brand" href="#">E-Commerce Sample</a>
		</nav>
	</header>

	<div class="container">
		<nav class="mt-3">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item active"><?= $c->CheckCategory(); ?></li>
			</ol>
		</nav>

		<h3 class="border-bottom p-1"><?php echo $_GET['categoryName'] . ':'; ?></h3>

		<div class="row mb-3 text-center">
			<?php echo $p -> GetProductByCategory(); ?>
		</div>
		<br/><br/><br/><br/>
		<!-- Pagination -->
		<!-- <ul class="pagination mt-3">
			<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
			<li class="page-item active"><a class="page-link" href="#">1</a></li>
			<li class="page-item"><a class="page-link" href="#">2</a></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
		</ul> -->

	</div>

	<footer class="bg-dark">

		<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom">
			<a class="btn btn-dark btn-block text-white" href="addCategory.php">
				<i class="fa fa-tag"></i> Add a Category
			</a>
			<a class="btn btn-dark btn-block text-white" href="addProduct.php">
				<i class="fa fa-dropbox"></i> Add a Product
			</a>
		</nav>
	</footer>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>