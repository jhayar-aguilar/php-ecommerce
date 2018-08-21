<?php
include('Model/Category.php');

include('Controller/addProduct_backend.php');
$c = new Category;
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
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

		<nav class="mt-3">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item active">Add Product</li>
			</ol>
		</nav>

		<div class="row">
			<div class="col-sm-4">
				<!-- <div class="mb-3">
					<span class="warning"> * Required</span>
				</div> -->

				<div class="border-bottom mb-3">
					<h3>Add a New Product</h3>
				</div>

				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="lblEmail">Product ID:<span class="text-danger"> * </span></label>
						<input type="number" class="form-control" name="txtProdID" id="txtProdID" placeholder="Enter product ID" <?php echo $prodID_style; ?> value="<?= $prodID_input; ?>">
						<?php echo $prodID_message; ?>
					</div>
					<div class="form-group">
						<label for="category">Category:<span class="text-danger"> * </span></label>
						<select id="category" class="form-control" name="category" <?php echo $category_style?>>
							<option value="">Select a category</option>
							<?= $c -> DisplayCategories($category_input); ?>
						</select>
						<span class="warning"><?php echo $category_message;?></span>
					</div>
					<div class="form-group">
						<label for="txtProdName">Product Name:<span class="text-danger"> * </span></label>
						<input type="text" class="form-control" name="txtProdName" id="txtProdName" placeholder="Enter product Name" value="<?php echo $prodName_input; ?>" <?php echo $prodName_style; ?>>
						<?php echo $prodName_message;?>
					</div>
					<div class="form-group">
						<label for="txtProdPrice">Product Price:<span class="text-danger"> * </span></label>
						<input type="text" class="form-control" name="txtProdPrice" id="txtProdPrice" placeholder="Enter product Price" <?php echo $prodPrice_style; ?> value="<?= $prodPrice_input; ?>">
						<span class="warning"><?php echo $prodPrice_message;?></span>
					</div>
					<div class="form-group">
						<label for="btnImage">Image:</label>	
						<input type="file" class="form-control-file" name="btnImage" id="btnImage" value="Insert photo" accept="image/*">
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

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>