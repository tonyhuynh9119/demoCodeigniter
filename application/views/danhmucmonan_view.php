<?php
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
	<title> Danh mục món ăn </title>
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
					<h1 class="display-4">Thêm Danh mục Món ăn</h1>
					<p class="lead">Thêm danh mục buổi sáng, buổi trưa, buổi tối cho các món ăn hằng ngày.</p>
					<hr class="my-4">
				</div>
				<!-- <form action="Monan/themDanhMuc" method="post"> -->
					<div class="form-group">
						<label for="formGroupExampleInput">Tên danh mục món ăn</label>
						<input name="tendanhmuc" type="text" class="form-control" id="tendanhmuc" placeholder="Vui lòng nhập tên danh mục món ăn">
					</div>
					<!-- <input type="submit" name="submit" class="form-control btn btn-outline-primary" value="Thêm danh mục"> -->
					<input type="button" name="submit" class="form-control btn btn-outline-primary btnThemDanhMuc" value="Thêm danh mục">
				<!-- </form> -->
			</div>
			<div class="col-sm-6 danhmucmonan">
				<div class="jumbotron">
					<h1 class="display-4">Danh sách Danh mục Món ăn</h1>
					<p class="lead">Danh sách danh mục tất cả các món ăn hằng ngày.</p>
					<hr class="my-4">
				</div>
				<?php foreach ($data as $value): ?>
				<div class="card mb-4">
					<div class="card-body">
						<div class="btnThaoTac float-right">
							<a href="<?= base_url() ?>Monan/suaDanhMuc/<?= $value['id'] ?>" class="btn btn-outline-success btnSuaDanhMuc"><i class="fa fa-pencil"></i></a>
							<a href="<?= $value['id'] ?>" class="btn btn-outline-danger btnXoaDanhMuc"><i class="fa fa-remove"></i></a>
						</div>
						<h5 class="card-title"><?= $value['tendanhmuc'] ?></h5>

						<form class="form-inline">
							<input type="hidden" name="id" id="ajax_tendanhmuc" value="<?= $value['id'] ?>">
							<div class="form-group">
								<input type="text" class="ajax_tendanhmuc form-control d-none" name="tendanhmuc" value="<?= $value['tendanhmuc'] ?>" placeholder="Vui lòng nhập tên danh mục">
							</div>
							<input type="button" name="submit" value="Update" class="ajax_btnUpdate btn btn-success form-control ml-auto d-none">
						</form>

					</div>
				</div>
				<?php endforeach ?>

			</div>
			
		</div>
		
	</div>
			


	<script src="<?= base_url() ?>vendor/js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/popper.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/script.js" type="text/javascript"></script>
	 
	<script type="text/javascript">
		$(document).ready(function() {
			duongdan = "<?= base_url(); ?>";

			//CODE XỬ LÝ JQUERY AJAX --> Thêm danh mục mới --> Khi nhấn nút thêm danh mục
			$('.btnThemDanhMuc').click(function(event) {
				// tendanhmuc = $('#tendanhmuc').val();
				// console.log(tendanhmuc);

				$.ajax({
					url: duongdan + 'Monan/addAjaxDanhMuc',
					type: 'post',
					dataType: 'json',
					data: {tendanhmuc: $('#tendanhmuc').val()},
				})
				.done(function() {
					console.log("success");
				})
				.fail(function() {
					//console.log("error");
				})
				.always(function(res) {
					// console.log(res);
					content = '<div class="card mb-4">';
					content += '<div class="card-body">';
					content += '<div class="btnThaoTac float-right">';
					content += '<a href="'+ res +'" class="btn btn-outline-success btnSuaDanhMuc"><i class="fa fa-pencil"></i></a>';
					content += '<a href="'+ res +'" class="btn btn-outline-danger btnXoaDanhMuc"><i class="fa fa-remove"></i></a>';
					content += '</div>';
					content += '<h5 class="card-title">' + $('#tendanhmuc').val() + '</h5>'; 
					content += '<form class="form-inline">';
					content += '<input type="hidden" name="id" id="ajax_tendanhmuc" value="<?= $value['id'] ?>">';
					content += '<div class="form-group">';
					content += '<input type="text" class="ajax_tendanhmuc form-control d-none" name="tendanhmuc" value="'+ $('#tendanhmuc').val() +'" placeholder="Vui lòng nhập tên danh mục">';
					content += '</div>';
					content += '<input type="button" name="submit" value="Update" class="ajax_btnUpdate btn btn-success form-control ml-auto d-none">';
					content += '</form>';
					content += '</div>';
					content += '</div>';

					$('.danhmucmonan').append(content);
					$('#tendanhmuc').val('');
				});
				
			});

			//CODE JQUERY-AJAX XỬ LÝ -> XOÁ DANH MỤC
			$('body').on('click', '.btnXoaDanhMuc', function(event) {
				event.preventDefault();

				id = $(this).attr('href');
				// console.log(id);
				objRemove = $(this).parent().parent().parent();

				$.ajax({
					url: duongdan + 'Monan/xoaDanhmuc/' + id,
					type: 'post',
					dataType: 'json',
				})
				.done(function() {
					console.log("success");
				})
				.fail(function() {
					//console.log("error");
				})
				.always(function() {
					//console.log("complete");
					objRemove.remove(); //Xoá bỏ thẻ
				});
			});
			
			//CODE JQUERY-AJAX XỬ LÝ -> SỬA DANH MỤC
			$('body').on('click', '.btnSuaDanhMuc', function(event) {
				//demo
				// $('.ajax_tendanhmuc, .ajax_btnUpdate').removeClass('d-none');
				// $('.card-title, .btnThaoTac').addClass('d-none');
				
				$(this).parent().next().next().find('.ajax_tendanhmuc').removeClass('d-none');
				$(this).parent().next().next().find('.ajax_btnUpdate').removeClass('d-none');
				$(this).parent().addClass('d-none');
				$(this).parent().next().addClass('d-none');

				event.preventDefault();
			});

			$('body').on('click', '.ajax_btnUpdate', function(event) {
				value_id = $(this).prev().prev().val();
				value_tendanhmuc =$(this).prev().find('.ajax_tendanhmuc').val();

				// console.log(value_id);
				// console.log(value_tendanhmuc);

				$(this).addClass('d-none');
				$(this).prev().find('.ajax_tendanhmuc').addClass('d-none');
				data = $(this).prev().find('.ajax_tendanhmuc').val();

				$(this).parent().prev('.card-title').html(data).removeClass('d-none');
				$(this).parent().prev().prev('.btnThaoTac').removeClass('d-none');

				$.ajax({
					url: duongdan + 'Monan/capNhatDanhMuc',
					type: 'post',
					dataType: 'json',
					data: {
						id: value_id,
						tendanhmuc: value_tendanhmuc
					},
				})
				.done(function() {
					console.log("success");
				})
				.fail(function() {
					//console.log("error");
				})
				.always(function() {
					//console.log("complete");
				});
				
				event.preventDefault();
			});
		});
	</script>
</body>
</html>