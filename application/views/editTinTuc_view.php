<?php 
date_default_timezone_set("Asia/Ho_Chi_Minh");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> Sửa Tin Tức </title>
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
					<h1 class="display-4 text-center">Sửa chi tiết tin</h1>
					<p class="lead text-center">Chỉnh sửa chi tiết bài biết</p>
					<hr class="my-4">
				</div>
				<form action="<?= base_url() ?>Tintuc/capNhatTin" method="post" enctype= multipart/form-data>
					<?php foreach ($data as $value): ?>
						
					<input type="hidden" name="id" value="<?= $value['id'] ?>">
					<div class="form-group">
						<label for="formGroupExampleInput">Tiêu đề tin</label>
						<input name="tieude" type="text" class="form-control" id="formGroupExampleInput" value="<?= $value['tieude'] ?>">
					</div>

					<div class="form-group">
						<img src="<?= $value['anhtin'] ?>" alt="<?= $value['anhtin'] ?>" class="img-fluid">
						<input type="hidden" name="anhtincu" value="<?= $value['anhtin'] ?>">
						<label for="formGroupExampleInput">Ảnh tin</label>
						<input name="anhtin" type="file" class="form-control">
					</div>

					<div class="form-group">
						<label for="formGroupExampleInput">Trích dẫn</label>
						<input name="trichdan" type="text" class="form-control" id="formGroupExampleInput" value="<?= $value['trichdan'] ?>">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput">Danh mục tin</label>
						<select name="iddanhmuc" class="form-control" id="exampleFormControlSelect1">
							<?php foreach ($load_danhmuc as $value_dm): ?>
								<?php if($value_dm['id'] == $value['iddanhmuc']){ ?>
									<option value="<?= $value['iddanhmuc'] ?>" selected="selected"><?= $tendanhmuc; ?></option>
								<?php }else{ ?>
									<option value="<?= $value_dm['id'] ?>"><?= $value_dm['tendanhmuc'] ?></option>
								<?php } ?>
								
							<?php endforeach ?>

								
							
						</select>
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput">Nội dung tin</label>
						<textarea name="noidungtin" id="noidungtin" rows="10" cols="30">
							<?= $value['noidungtin'] ?>
						</textarea>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<input type="submit" class="form-control btn btn-outline-success" value="Update Tin">
							</div>
							<div class="col-sm-6">
								<a href="<?= base_url() ?>Tintuc/xoatin/<?= $value['id'] ?>" class="btn btn-outline-danger form-control">Xoá tin</a>
							</div>

						</div>
						
					</div>
					<?php endforeach ?>
				</form>
			</div>

		</div>
	</div>


	<script src="<?= base_url() ?>vendor/js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/popper.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/script.js" type="text/javascript"></script>
	
	<script src="<?= base_url() ?>ckeditor/ckeditor.js"></script>
    <script src="<?= base_url() ?>ckeditor/ckfinder/ckfinder.js"></script>
	

	<script>
    	//CKEDITOR.replace( 'noidungtin' );
    	var editor = CKEDITOR.replace( 'noidungtin' );
		CKFinder.setupCKEditor( editor );
	</script>

</body>
</html>