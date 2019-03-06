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
	<title> Danh sách món ăn </title>
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
			<div class="col-sm-6">
				<div class="jumbotron">
					<h1 class="display-4">Thêm Danh sách Món ăn</h1>
					<p class="lead">Thêm danh các món ăn hằng ngày.</p>
					<hr class="my-4">
				</div>
				<form method="post" action="<?= base_url() ?>Monan/themMonAn" enctype="multipart/form-data">
					<div class="form-group">
						<label for="formGroupExampleInput">Ảnh món ăn: </label>
						<input name="anh" type="file" class="form-control" id="formGroupExampleInput" placeholder="Example input">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Tên món ăn: </label>
						<input name="ten" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Example input">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Giá: </label>
						<input name="gia" type="number" class="form-control" id="formGroupExampleInput2" placeholder="Example input">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Mô tả: </label>
						<textarea name="mota" class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Danh mục</label>
						<select name="iddanhmuc" class="form-control" id="exampleFormControlSelect1">
							<?php foreach ($loadDanhMuc as $value): ?>
								<option value="<?= $value['id'] ?>"><?= $value['tendanhmuc'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">New: </label>
						<input name="new" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Example input">
					</div>
					<input type="submit" name="submit" value="Thêm món ăn" class="form-control btn btn-outline-primary">
				</form>
			</div>
			<div class="col-sm-6">
				<div class="jumbotron">
					<h1 class="display-4">Danh sách các món ăn</h1>
					<p class="lead">Danh sách tất cả các món ăn hằng ngày.</p>
					<hr class="my-4">
				</div>
				<div class="card-group">
					<div class="row">
						<?php foreach ($data as $value): ?>
							<div class="col-sm-6">
								<div class="card">
									<img class="card-img-top img-fluid" src="<?= $value['anh'] ?>" alt="Card image cap">
									<div class="card-body">
										<h5 class="card-title">
											<span class="badge badge-secondary"><?= $value['new'] ?></span>
											<?= $value['ten'] ?>
										</h5>
										<b class="card-text">Giá: <?= $value['gia'] ?></b>
										<p class="card-text"><?= $value['mota'] ?></p>
									</div>
									<div class="card-footer">
										<small class="text-muted"><?= date('d/m/y - h:i - A',$value['ngaytao']) ?></small>
										<a href="<?= base_url() ?>Monan/suaMonAn/<?= $value['id'] ?>" class="btn btn-outline-success"><i class="fa fa-pencil"></i></a>
									<a href="<?= base_url() ?>Monan/xoaMonAn/<?= $value['id'] ?>" class="btn btn-outline-danger"><i class="fa fa-remove"></i></a>
									</div>

								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>
			


	<script src="<?= base_url() ?>vendor/js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/popper.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/script.js" type="text/javascript"></script>
</body>
</html>