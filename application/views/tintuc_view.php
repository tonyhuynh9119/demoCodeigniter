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
	<title> Tin Tức </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/css/stylesheet.css">
</head>
<body>
	<?php include('header_backend.php') ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6">
				<div class="jumbotron jumbotron-fluid text-center">
					<h1 class="display-4">Thêm mới tin</h1>
					<p class="lead">Thêm mới tin</p>
					<hr class="my-4">
				</div>
				<form action="<?= base_url() ?>Tintuc/themtin" method="post" enctype= multipart/form-data>
					<div class="form-group">
						<label for="formGroupExampleInput">Tiêu đề tin</label>
						<input name="tieude" type="text" class="form-control" id="formGroupExampleInput" placeholder="Vui lòng nhập tiêu đề tin">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput">Ảnh tin</label>
						<input name="anhtin" type="file" class="form-control">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput">Trích dẫn</label>
						<input name="trichdan" type="text" class="form-control" id="formGroupExampleInput" placeholder="Vui lòng nhập trích dẫn tin">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput">Danh mục tin</label>
						<select name="iddanhmuc" class="form-control" id="exampleFormControlSelect1">
							<?php foreach ($danhmuctin as $value): ?>
								<option value="<?= $value['id'] ?>"><?= $value['tendanhmuc'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput">Nội dung tin</label>
						<textarea name="noidungtin" id="noidungtin" rows="10" cols="30"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" class="form-control btn btn-outline-success" value="Thêm Tin">
					</div>
				</form>
			</div>
			<div class="col-sm-6">
				<div class="jumbotron jumbotron-fluid text-center">
					<h1 class="display-4">Danh mục tin</h1>
					<p class="lead">Danh mục tin</p>
					<hr class="my-4">
				</div>

				<div class="card-group">
					<div class="row">
						<?php foreach ($danhsachtin as $value): ?>
							<div class="col-sm-6">
								<div class="card">
									<?php if(empty($value['anhtin'])) {?>
										<img class="card-img-top img-fluid" src="https://placehold.it/500x500" alt="Card image cap">
									<?php }else{ ?>
										<img class="card-img-top img-fluid" src="<?= $value['anhtin'] ?>" alt="Card image cap">
									<?php } ?>
									
									<div class="card-body">
										<h5 class="card-title"><?= $value['tieude'] ?></h5>
										<p class="card-text"><?= $value['trichdan'] ?></p>
										<p class="card-text"><small class="text-muted">Ngày đăng bài: <?= date('d/m/Y - h:i - A', $value['ngaytao']) ?></small></p>
										<a href="<?= base_url() ?>Tintuc/suaTin/<?= $value['id'] ?>" class="btn btn-outline-success">
											<i class="fa fa-pencil"></i>
										</a>
									</div>
								</div> <!-- end card -->
							</div> <!-- end col-sm-6 -->
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
	
	<script src="<?= base_url() ?>ckeditor/ckeditor.js"></script>
    <script src="<?= base_url() ?>ckeditor/ckfinder/ckfinder.js"></script>
	

	<script>
    	//CKEDITOR.replace( 'noidungtin' );
    	var editor = CKEDITOR.replace( 'noidungtin' );
		CKFinder.setupCKEditor( editor );
	</script>

</body>
</html>