<!DOCTYPE html>
<html lang="en">
<head>
	<title> Add menu - JSON </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/css/stylesheet.css">
</head>
<body>
	<?php include 'header_backend.php' ?>

	<div class="container">
		<div class="row">
			<div class="col-sm-8 offset-2">
				<div class="jumbotron">
					<h4 class="display-4">Thêm menu header</h4>
					<p class="lead">Thêm những phần tử menu.</p>
					<hr class="my-4">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 offset-3">
				<form action="<?= base_url() ?>Slides/addMenu" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="title">Tiêu đê: </label>
						<input name="tieude" type="text" class="form-control" id="tieude" placeholder="Vui lòng nhập title">
					</div>
					<div class="form-group">
						<label for="link">Link của nút </label>
						<input name="linkmenu" type="text" class="form-control" id="linkmenu" placeholder="Vui lòng nhập linkmenu">
					</div>
					<div class="form-group">
						<button class="btn btn-outline-primary btn-block" type="submit">Thêm Menu</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<script src="<?= base_url() ?>vendor/js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/popper.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/script.js" type="text/javascript"></script>
</body>
</html>