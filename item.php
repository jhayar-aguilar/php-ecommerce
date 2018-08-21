<?php

include('Model/Product.php');
include('Model/Category.php');

include('Controller/item_backend.php');

$p = new Product;
$c = new Category;

?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=content-width, initial-scale=1.0">
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
				<li class="breadcrumb-item"><a href="items.php?categoryName=<?= $c -> GetCategory(); ?>"><?= $c -> GetCategory(); ?></a></li>
				<li class="breadcrumb-item active"><?php echo $p -> GetProductName() ?></li>
			</ol>
		</nav>

		<h3 class="headerText border-bottom p-1"><?php echo $p->GetProductName(); ?> Information</h3>

		<?= $changes; ?>

		<div class="p-3">
			<div class="row">
				<div class="col-sm-3 text-center">
					<?php echo $p -> GetProductImageById(); ?>
				</div>
				<div class="col-sm-6">
					
					<p class="display-4"><?php echo $p -> GetInfoById()[1]; ?></p>
					<h1><small>₱<?php echo $p -> GetInfoById()[2]; ?></small></h1>
					<h1><small><?php echo $p -> GetInfoById()[3]; ?></small></h1>

					<!-- <a class="btn btn-success btn-block" href="edit.php?categoryName=<?php echo $p -> GetInfoById()[3];?>&id=<?php echo $p -> GetInfoById()[0]; ?>">
						<i class="fa fa-refresh"></i> Update
					</a> -->

					<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#updateModal">
						<i class="fa fa-refresh"></i> Update
					</button>

					<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#deleteModal">
						<i class="fa fa-trash-o"></i> Delete
					</button>

				</div>
			</div>

			<div class="modal fade" id="updateModal">
				<div class="modal-dialog">
					<div class="modal-content">

						<div class="modal-header">
							<h4 class="modal-title"><i class="fa fa-refresh"></i> Update Information</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="txtProdID"><i class="fa fa-id-badge"></i> Product ID:</label>
									<input type="number" class="form-control" name="txtProdID" id="txtProdID" placeholder="<?php echo $p -> GetInfoById()[0]; ?>" disabled="disabled">
								</div>
								<div class="form-group">
									<label for="txtCategory"><i class="fa fa-id-tag"></i> Category:</label>
									<input type="text" class="form-control" name="txtCategory" id="txtCategory" placeholder="<?php echo $p -> GetInfoById()[3]; ?>" disabled="disabled">
								</div>
								<div class="form-group">
									<label for="txtProdName"><i class="fa fa-tag"></i> Product Name:</label>
									<input type="text" class="form-control" name="txtProdName" id="txtProdName" placeholder="Enter product Name">
								</div>
								<div class="form-group">
									<label for="txtProdPrice"><i class="fa fa-money"></i> Product Price:</label>
									<input type="number" class="form-control" name="txtProdPrice" id="txtProdPrice" placeholder="Enter product Price" min="0">
								</div>
								<div class="form-group">
									<label for="btnImage"><i class="fa fa-file-image-o"></i> Image:</label>	
									<input type="file" class="form-control-file" name="btnImage" id="btnImage" value="Insert photo" accept="image/*">
								</div>
								<div class="form-group">
									<button class="form-control btn btn-success" type="submit" name="btnUpdate"><i class="fa fa-refresh"></i> Update</button>
								</div>
								<div class="form-group">
									<button class="form-control btn btn-secondary" type="submit" name="btnCancel" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Cancel</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="deleteModal">
				<div class="modal-dialog">
					<div class="modal-content">

						<div class="modal-header">
							<h4 class="modal-title"><i class="fa fa-trash"></i> Delete Information</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							Would you like to delete this product?

							<form class="mt-3" method="post">
								<div class="form-group">
									<button type="submit" class="form-control btn btn-danger" name="btnDelete"><i class="fa fa-trash-o"></i> Confirm</button>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Cancel</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	</body>

	</html>