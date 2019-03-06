<!DOCTYPE html>
<html lang="en">
<head>
	<title> Add slides - JSON </title>
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
					<h1 class="display-4">Thêm Slide Ảnh</h1>
					<p class="lead">Thêm slide ảnh mới.</p>
					<hr class="my-4">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 offset-3">
				<form action="Slides/addSlidesJson" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="title">Tiêu đê: </label>
						<input name="title" type="text" class="form-control" id="title" placeholder="Vui lòng nhập title">
					</div>
					<div class="form-group">
						<label for="description">Mô tả: </label>
						<input name="description" type="text" class="form-control" id="description" placeholder="Vui lòng nhập description">
					</div>
					<div class="form-group">
						<label for="btn_link">Link của nút </label>
						<input name="btn_link" type="text" class="form-control" id="btn_link" placeholder="Vui lòng nhập btn_link">
					</div>
					<div class="form-group">
						<label for="btn_text">Text của nút</label>
						<input name="btn_text" type="text" class="form-control" id="btn_text" placeholder="Vui lòng nhập btn_text">
					</div>
					<div class="form-group">
						<input name="slide_img" type="file" class="form-control" id="slide_img">
					</div>
					<div class="form-group">
						<button class="btn btn-outline-primary btn-block" type="submit">Thêm Slide</button>
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