<!DOCTYPE html>
<html lang="en">
<head>
	<title> Quản lý Header </title>
	<meta charset="UTF-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/css/stylesheet.css">
</head>
<body>
	<?php include 'header_backend.php' ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-8 offset-2">
				<div class="jumbotron">
					<h1 class="display-4 text-center">Quản lý header</h1>
					<p class="lead text-center">Quản lý chi tiết header</p>
					<hr class="my-4">
				</div>
				<?php foreach ($data as $key => $value): ?>
					<?php 
					// echo '<pre>';
					// var_dump($key);
					// var_dump($value);
					// echo '</pre>'; 
					if($key == 'mangXaHoi'){
						$mangXaHoi = $value;
						// echo '<pre>';
						// var_dump($mangXaHoi);
						// echo '</pre>';
					}
					if($key == 'duongDayNong'){
						$duongDayNong = $value;
					}
					if($key == 'gioMoCua'){
						$gioMoCua = $value;
					}
					if($key == 'logo'){
						$logo = $value;
					}
					?>
				<?php endforeach ?>
				<form action="<?= base_url() ?>Tintuc/capNhatQuanLyHeader" method="post" enctype= multipart/form-data>
					<h4 class="alert alert-info" role="alert">Mạng xã hội</h4>	
					<div class="form-group">
						<label for="formGroupExampleInput">Link Facebook</label>
						<input value="<?= $mangXaHoi['linkfb'] ?>" name="linkfb" type="text" class="form-control" id="linkfb">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput">Link Twitter</label>
						<input value="<?= $mangXaHoi['linktwitter'] ?>" name="linktwitter" type="text" class="form-control" id="linktwitter">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput">Link Pinterest</label>
						<input value="<?= $mangXaHoi['linkpinterest'] ?>" name="linkpinterest" type="text" class="form-control" id="linkpinterest">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput">Link Google plus</label>
						<input value="<?= $mangXaHoi['linkgoogleplus'] ?>" name="linkgoogleplus" type="text" class="form-control" id="linkgoogleplus">
					</div>

					<h4 class="alert alert-info" role="alert">Đường dẫn nóng</h4>
					<div class="form-group">
						<label for="formGroupExampleInput">Text Hot Line</label>
						<input value="<?= $duongDayNong['textHotLine'] ?>" name="textHotLine" type="text" class="form-control" id="textHotLine">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput">Số điện thoại</label>
						<input value="<?= $duongDayNong['sdt'] ?>" name="sdt" type="text" class="form-control" id="sdt">
					</div>

					<h4 class="alert alert-info" role="alert">Giờ Mở Cửa</h4>
					<div class="form-group">
						<label for="formGroupExampleInput">Text Open Restaurants</label>
						<input value="<?= $gioMoCua['textOpenRestaurant'] ?>" name="textOpenRestaurant" type="text" class="form-control" id="textOpenRestaurant">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput">Thời gian</label>
						<input value="<?= $gioMoCua['thoigian'] ?>" name="thoigian" type="text" class="form-control" id="thoigian">
					</div>
					<h4 class="alert alert-info" role="alert">Logo</h4>
					<div class="form-group">
						<img src="<?= $logo ?>" alt="<?= $logo ?>" class="img-fluid">
						<input type="hidden" name="logocu" value="<?= $logo ?>">
						<label for="formGroupExampleInput">Hình ảnh logo</label>
						<input name="logo" type="file" class="form-control" id="logo">
					</div>
					
					<input type="submit" name="submit" value="Cập nhật" class="form-control btn btn-primary">
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