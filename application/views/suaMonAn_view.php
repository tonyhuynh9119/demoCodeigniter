 <!DOCTYPE html>
<html lang="en">
<head>
	<title>Sửa món ăn theo id </title>
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
					<h1 class="display-4">Sửa thông tin món ăn</h1>
					<p class="lead">Sửa món ăn theo id món ăn.</p>
					<hr class="my-4">
				</div>
				<form method="post" action="<?= base_url() ?>Monan/capnhatMonAn" enctype="multipart/form-data">
					<?php foreach ($data as $value): ?>
						
					<input type="hidden" name="id" value="<?= $value['id'] ?>">
					<div class="form-group">
						<label for="formGroupExampleInput">Ảnh món ăn: </label>
						<img src="<?= $value['anh'] ?>" alt="<?= $value['anh'] ?>" class="img-fluid">
						<input name="anhcu" type="hidden" class="form-control" id="formGroupExampleInput" value="<?= $value['anh'] ?>">
						
						<input name="anh" type="file" class="form-control" id="formGroupExampleInput">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Tên món ăn: </label>
						<input name="ten" type="text" class="form-control" id="formGroupExampleInput2" value="<?= $value['ten'] ?>">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Giá: </label>
						<input name="gia" type="number" class="form-control" id="formGroupExampleInput2" value="<?= $value['gia'] ?>">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Mô tả: </label>
						<textarea name="mota" class="form-control" id="exampleFormControlTextarea1" rows="6"><?= $value['mota'] ?></textarea>
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Danh mục</label>
						<select name="iddanhmuc" class="form-control" id="exampleFormControlSelect1">
							<?php foreach ($loadanhmuc as $v_danhmuc): ?>
								<?php if($v_danhmuc['id'] == $value['iddanhmuc']){ ?>
									<option value="<?= $value['iddanhmuc'] ?>" selected><?= $tendanhmuc; ?></option>
								<?php }else{ ?>
									<option value="<?= $v_danhmuc['id'] ?>"><?= $v_danhmuc['tendanhmuc'] ?></option>
								<?php } ?>
								
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">New: </label>
						<input name="new" type="text" class="form-control" id="formGroupExampleInput2" value="<?= $value['new'] ?>">
					</div>
					<?php endforeach ?>
					<input type="submit" name="submit" value="Cập nhật" class="form-control btn btn-outline-primary">
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