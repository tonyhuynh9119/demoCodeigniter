<!DOCTYPE html>
<html lang="en">
<head>
	<title> Form thông tin quản trị viên </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/css/stylesheet.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 offset-2">
				<div class="jumbotron">
					<h3 class="display-3">Thông tin quản trị</h3>
					<p class="lead">Thông tin thành viên quản trị web</p>
					<hr class="my-4">
					</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8 offset-2">
				<?php foreach ($data as $value): ?>
				<form method="post" action="<?= base_url() ?>Admin/capnhat">
					<input type="hidden" name="id" value="<?= $value['id'] ?>">
					<div class="form-group">
						<label for="formGroupExampleInput">User Name</label>
						<input name="username" type="text" class="form-control" id="formGroupExampleInput" value="<?= $value['username'] ?>">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Password</label>
						<input name="password" type="password" class="form-control" id="formGroupExampleInput2" value="<?= $value['password'] ?>">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Email</label>
						<input name="email" type="email" class="form-control" id="formGroupExampleInput2" value="<?= $value['email'] ?>">
					</div>
					<div class="form-group">
						<input type="submit" class="form-control btn btn-outline-primary" value="Cập nhật">
					</div>
					
				</form>
				<?php endforeach ?>
			</div>
		</div>
	</div>


	<script src="<?= base_url() ?>vendor/js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/popper.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/script.js" type="text/javascript"></script>
</body>
</html>