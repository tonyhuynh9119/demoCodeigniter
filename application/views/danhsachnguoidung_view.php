<?php 
date_default_timezone_set("Asia/Ho_Chi_Minh");
if($this->session->has_userdata('email') && $this->session->has_userdata('password') ){
 ?>

 <?php
	}else{
		redirect('Admin','refresh');
	}
?>	
<!DOCTYPE html>
<html lang="en">
<head>
	<title> Form đăng ký quản trị viên </title>
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
					<h3 class="display-4">Danh sách người dùng</h3>
					<p class="lead">Danh sách thành viên quản trị</p>
					<hr class="my-4">
					</p>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach ($data as $value): ?>
			<div class="col-sm-6">
				<div class="card-group">
				  <div class="card">
				    <div class="card-body">
				      <h5 class="card-title">User name: <?= $value['username'] ?></h5>
				      <p class="card-text">Password: **************</p>
				      <p class="card-text">Email: <?= $value['email'] ?></p>
				      <p class="card-text"><small class="text-muted">Đăng ký: <?= date('d/m/y - h:i - A', $value['ngaytao']) ?></small></p>

				      <a href="<?= base_url() ?>Admin/sua/<?= $value['id'] ?>" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				      <a href="<?= base_url() ?>Admin/xoa/<?= $value['id'] ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></i></a>

				    </div>
				  </div>				
				</div>
			</div>
			<?php endforeach ?>
		</div>
	</div>


	<script src="<?= base_url() ?>vendor/js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/popper.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/script.js" type="text/javascript"></script>
</body>
</html>