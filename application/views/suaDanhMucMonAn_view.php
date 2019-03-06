<!DOCTYPE html>
<html lang="en">
<head>
	<title> Sửa Danh mục món ăn </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/css/stylesheet.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 offset-3">
				<div class="jumbotron">
					<h1 class="display-4">Sủa Danh mục Món ăn</h1>
					<p class="lead">Sửa tên danh mục.</p>
					<hr class="my-4">
				</div>
				<form action="<?= base_url() ?>Monan/capNhatDanhMuc" method="post">
					<?php foreach ($data as $value): ?>
					<input type="hidden" name="id" value="<?= $value['id'] ?>">
					<div class="form-group">
						<label for="formGroupExampleInput">Tên danh mục món ăn</label>
						<input name="tendanhmuc" type="text" class="form-control" id="formGroupExampleInput" value="<?= $value['tendanhmuc'] ?>">
					</div>
					<input type="submit" name="submit" class="form-control btn btn-outline-primary">

					<?php endforeach ?>
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