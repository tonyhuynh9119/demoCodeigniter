<!DOCTYPE html>
<html lang="en">
<head>
	<title> Sửa Danh mục tin </title>
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
				<div class="jumbotron jumbotron-fluid">
					<div class="container">
						<h1 class="display-5">Sửa Danh Mục Tin</h1>
						<p class="lead">Form này cho phép Sửa danh mục tin vào CSDL</p>
					</div>
				</div>
				<form action="<?= base_url() ?>Tintuc/capnhatdanhmuc" method="post">
					<?php foreach ($data as $value): ?>
					
					<div class="form-group">
						<label for="formGroupExampleInput">Tên Danh Mục</label>
						<input type="hidden" name="id" value="<?= $value['id'] ?>">
						<input name="tendanhmuc" type="text" class="form-control" id="formGroupExampleInput" value="<?= $value['tendanhmuc'] ?>">
					</div>
					<?php endforeach ?>
					<div class="form-group">
						<input type="submit" class="form-control btn btn-outline-primary" value="Thêm Danh Mục">
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