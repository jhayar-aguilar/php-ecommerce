<?php
include('Model/Product.php');
include('Controller/addCategory_backend.php');

$p = new Product;
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-commerce</title>
	<link rel="stylesheet" href="style.css"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="Assets/Images/cart.ico">
</head>

<body>

	<header>
		<!-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark">"

			<a class="navbar-brand" href="#">E-Commerce Sample</a>

			<button class="navbar-toggler" data-toggle="collapse" data-target="#target">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="target">
				<ul class="navbar-nav mr-auto">
					<li class="navbar-item">
						<a class="nav-link" href="#">Products</a>
					</li>
					<li>
						<a class="nav-link" href="#">Categories</a>	
					</li>
				</ul>

				<form class="form-inline">
					<div class="input-group">
						<input class="form-control" type="search" placeholder="Search" aria-label="Search">
						<div class="input-group-append">
							<button class="input-group-text fa fa-search" type="button"></button>
						</div>
					</div>
				</form>
			</div>
		</nav> -->

		<nav class="navbar justify-content-center navbar-expand-sm bg-dark navbar-dark">
			<a class="navbar-brand" href="#">E-Commerce Sample</a>
		</nav>
	</header>

	<div class="container">

		<div class="row">

			<div class="col-sm-12">
				<nav class="mt-3">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active">Add Category</li>
					</ol>
				</nav>

				<div class="border-bottom mb-3">
					<h3>Add a New Category</h3>
				</div>

				<span class="text-danger mb-3">* Required</span>
			</div>

			<div class="col-sm-4 mt-3">

				<form method="post">
					<div class="form-group">
						<label for="lblEmail">Category Name:<span class="text-danger"> *</span></label>
						<input type="text" class="form-control" name="txtCategoryName" id="txtCategoryName" placeholder="Enter category" <?= $category_style;?>>
						<?= $category_error; ?>
					</div>
					<div class="form-group">
						<button class="form-control btn btn-success" type="submit" name="btnSave">Save to Database</button>
					</div>
					<div class="form-group">
						<button class="form-control btn btn-secondary" type="submit" name="btnBack" formnovalidate="formnovalidate">Back</button>

					</div>
				</form>

			</div>


		</div>
	</div>

</body>

</html>