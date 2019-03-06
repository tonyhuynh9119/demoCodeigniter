<!DOCTYPE html>
<html lang="en">
<head>
	<title> Quản lý footer </title>
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
					<h4 class="display-3">Quản lý footer</h4>
					<p class="lead">Quản lý những thông tin, liên lạc, liên kết, tin tức, thời gian hoạt động footer</p>
					<hr class="my-4">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-8 offset-2">
				<form method="post" action="<?= base_url() ?>Tintuc/capnhatdlfooter" enctype="multipart/form-data">
					<?php foreach ($data as $key => $value): ?>
						<?php 
						if ($key == 'thongtin') {
							$thongtin = $value;
						}
						if ($key == 'lienkethuuich') {
							$lienkethuuich = $value;
						}
						 ?>
					<?php endforeach ?>
					<h3 class="alert alert-info" role="alert">Thông tin nhà hàng</h3>
					<div class="form-group">
						<label for="formGroupExampleInput">Logo footer</label>
						<img src="<?= $thongtin['logo'] ?>" alt="" class="img-fluid">
						<input type="hidden" name="logocu" value="<?= $thongtin['logo'] ?>">
						<input name="logo" type="file" class="form-control" id="formGroupExampleInput" placeholder="Example input">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Giới thiệu</label>
						<textarea name="gioithieu" class="form-control" rows="3"><?= $thongtin['gioithieu'] ?></textarea>
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Địa chỉ</label>
						<input value="<?= $thongtin['diachi'] ?>" name="diachi" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Điện thoại</label>
						<input value="<?= $thongtin['dienthoai'] ?>" name="dienthoai" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Email</label>
						<input value="<?= $thongtin['email'] ?>" name="email" type="email" class="form-control" id="formGroupExampleInput" placeholder="Example input">
					</div>

					<h3 class="alert alert-info" role="alert">Đường dẫn tiện ích</h3>
					<div class="form-group">
						<label for="formGroupExampleInput2">About Company: </label>
						<input value="<?= $lienkethuuich['aboutCompany'] ?>" name="aboutCompany" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Reservation: </label>
						<input value="<?= $lienkethuuich['reservation'] ?>" name="reservation" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Help Center: </label>
						<input value="<?= $lienkethuuich['helpCenter'] ?>" name="helpCenter" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Our Blog: </label>
						<input value="<?= $lienkethuuich['ourBlog'] ?>" name="ourBlog" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Careers: </label>
						<input value="<?= $lienkethuuich['careers'] ?>" name="careers" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Contact Us: </label>
						<input value="<?= $lienkethuuich['contactUs'] ?>" name="contactUs" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
					</div>
					<input type="submit" name="submit" class="form-control btn btn-outline-primary" value="Cập nhật">
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