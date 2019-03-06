<!DOCTYPE html>
<html lang="en">
<head>
	<title> Đăng nhập quản trị viên </title>
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
					<h3 class="display-4">Đăng nhập</h3>
					<p class="lead">Form đăng nhập thành viên quản trị web</p>
					<hr class="my-4">
					</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8 offset-2">
				<form method="post" action="<?= base_url() ?>Admin/dangnhap">
					<div class="form-group">
						<label for="formGroupExampleInput">Email</label>
						<input name="email" type="email" class="form-control" id="formGroupExampleInput" placeholder="Vui lòng nhập email">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Password</label>
						<input name="password" type="password" class="form-control" id="formGroupExampleInput2" placeholder="Vui lòng nhập mật khẩu">
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<a href="<?= base_url() ?>Admin/quenmk">Quên mật khẩu</a>
						</div>
						<div class="form-group col-sm-6 text-right">
							<a href="<?= base_url() ?>Admin/dangky">Đăng ký</a>
						</div>
					</div>
				
					<div class="form-group">
						<input type="submit" class="form-control btn btn-outline-primary" value="Đăng nhập">
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