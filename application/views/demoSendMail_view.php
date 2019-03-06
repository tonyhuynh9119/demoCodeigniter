<!DOCTYPE html>
<html lang="en">
<head>
	<title> Demo Send Mail </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/css/stylesheet.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 offset-sm-3">
				<form action="DemoSendMail/do_send" method="post">
					<div class="form-group">
						<label for="formGroupExampleInput">Tên Người Gửi</label>
						<input name="tengui" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Email người Nhận</label>
						<input name="emailnhan" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Example input">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Nội dụng</label>
						<textarea name="noidung" class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
					</div>

					<div class="form-group">
						<input type="submit" class="form-control btn btn-outline-primary" value="Gửi mail">
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