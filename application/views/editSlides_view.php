<!DOCTYPE html>
<html lang="en">
<head>
	<title> Edit slides - JSON </title>
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
					<h4 class="display-4">Sửa Slide Ảnh</h4>
					<p class="lead">Sửa tất cả slide.</p>
					<hr class="my-4">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 offset-3">
				<form action="Slides/updateSilde" method="post" enctype="multipart/form-data">
					<?php $i=0; ?>
					<?php foreach ($data as $value): ?>
					<?php $i++; ?>

					<h3>Slide số <?= $i ?> :</h3>
					<hr/>
					<div class="form-group">
						<label for="title">Tiêu đê: </label>
						<input name="title[]" type="text" class="form-control" id="title" value="<?= $value['title'] ?>">
					</div>
					<div class="form-group">
						<label for="description">Mô tả: </label>
						<input name="description[]" type="text" class="form-control" id="description" value="<?= $value['description'] ?>">
					</div>
					<div class="form-group">
						<label for="btn_link">Link của nút </label>
						<input name="btn_link[]" type="text" class="form-control" id="btn_link" value="<?= $value['btn_link'] ?>">
					</div>
					<div class="form-group">
						<label for="btn_text">Text của nút</label>
						<input name="btn_text[]" type="text" class="form-control" id="btn_text" value="<?= $value['btn_text'] ?>">
					</div>
					<div class="form-group">
						<label for="btn_text">File upload</label>
						<img src="<?= $value['slide_img'] ?>" alt="slide-image" class="img-fluid">
						<input name="slide_img_old[]" type="text" class="form-control" id="slide_img_old" value="<?= $value['slide_img'] ?>">
						<input name="slide_img[]" type="file" class="form-control" id="slide_img">
					</div>
					<?php endforeach ?>
					<div class="form-group">
						<button class="btn btn-outline-primary btn-block" type="submit">Lưu Slides</button>
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