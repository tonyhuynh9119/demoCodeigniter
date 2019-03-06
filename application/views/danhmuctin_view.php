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
	<title> Thêm Danh Mục Tin Tức </title>
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
				<div class="jumbotron jumbotron-fluid">
					<div class="container">
						<h1 class="display-5">Thêm Danh Mục Tin</h1>
						<p class="lead">Form này cho phép thêm danh mục tin vào CSDL</p>
					</div>
				</div>
				<!-- <form action="Tintuc/themdanhmuc" method="post"> -->
					<div class="form-group">
						<label for="formGroupExampleInput">Tên Danh Mục</label>
						<input name="tendanhmuc" type="text" class="form-control" id="tendanhmuc" placeholder="Vui lòng nhập tên danh mục">
					</div>
					<div class="form-group">
						<input type="button" id="btnthemdanhmuc" class="form-control btn btn-outline-primary" value="Thêm Danh Mục">
					</div>
				<!-- </form>			 -->
			</div>
			<div class="col-sm-6 cacdanhmuc">
				<div class="jumbotron jumbotron-fluid">
					<div class="container">
						<h1 class="display-5">Danh sách - Danh mục Tin tức</h1>
						<p class="lead">Các danh mục tin tức đã thêm</p>
					</div>
				</div>
				<?php foreach ($data as $value): ?>
				<div class="card text-white bg-primary mb-3">
					<div class="card-body">
						<h5 class="card-title">
							<div class="btnthaotac">
								<a data-href="<?= $value['id'] ?>" class="btnDelete btn btn-danger float-right ml-1"><i class="fa fa-remove" aria-hidden="true"></i></a>
								<a href="<?= base_url() ?>Tintuc/suadanhmuc/<?= $value['id'] ?>" class="btnEdit btn btn-success float-right"><i class="fa fa-pencil" aria-hidden="true"></i></a>
							</div>
							 
							<div class="tendanhmuc">
								<?= $value['tendanhmuc'] ?>
							</div>
							<form class="form-inline">
								<div class="form-group">
									<input type="hidden" class="jquery_id" value="<?= $value['id'] ?>">
									<input type="text" class="jquery_tendanhmuc form-control d-none" value="<?= $value['tendanhmuc'] ?>">
								</div>
								<a href="" class="jquery_btnUpdate btn btn-success ml-auto d-none">Update</a>
							</form>
							
							
						</h5>						
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
		
		$(function(){
			duongdan = "<?= base_url() ?>";

			//bắt sự kiện nút #btnthemdanhmuc
			$('#btnthemdanhmuc').click(function(event) {
				// var tendanhmuc = $('#tendanhmuc').val();
				// console.log(tendanhmuc);

				$.ajax({
					url: duongdan + 'Tintuc/addAjaxDanhMuc', // gửi dữ liệu controller xử lý
					type: 'POST',
					dataType: 'json',
					data: {tendanhmuc: $('#tendanhmuc').val()}
				})
				.done(function() {
					//console.log("success");
				})
				.fail(function() {
					//console.log("error");
				})
				.always(function(res) {
					//Nhận dữ liệu controller qua tham số res
					console.log(res);

					//dùng jquery để vẽ ra nội dung thêm mới
					content = '<div class="card text-white bg-primary mb-3">';
					content += '<div class="card-body">';
					content += '<h5 class="card-title">';
					content += '<div class="btnthaotac">';
					content += '<a data-href="'+res+'" class="btnDelete btn btn-danger float-right ml-1"><i class="fa fa-remove" aria-hidden="true"></i></a>';
					content += '<a data-href="'+res+'" class="btnEdit btn btn-success float-right"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
					content += '</div>';
					content += '<div class="tendanhmuc">';
					content += $('#tendanhmuc').val();
					content += '</div>';
					content += '<form class="form-inline">';
					content += '<div class="form-group">';
					content += '<input type="text" class="jquery_tendanhmuc form-control d-none" value="<?= $value['tendanhmuc'] ?>">';
					content += '</div>';
					content += '<a href="" class="jquery_btnUpdate btn btn-success ml-auto d-none">Update</a>';
					content += '</form>';
					content += '</h5>';
					content += '</div>';
					content += '</div>';
					
					//vẽ và đưa nội dung vào
					$('.cacdanhmuc').append(content);
					//reset giá trị
					$('#tendanhmuc').val('');
				});
				
			});
			$('body').on('click', '.btnDelete', function(event) {
				
				id = $(this).data('href');	
				objDelete = $(this).parent().parent().parent().parent();

				$.ajax({
					url: duongdan +  '/Tintuc/xoadanhmuc/' + id,
					type: 'post',
					dataType: 'json',

				})
				.done(function() {
					//console.log("success");
				})
				.fail(function() {
					//console.log("error");
				})
				.always(function() {
					//console.log("complete");
					objDelete.remove();
				});
			});
			
			$('body').on('click', '.btnEdit', function(event) {
				
				// $('.tendanhmuc, .btnthaotac').addClass('d-none');
				// $('.jquery_btnSubmit, .jquery_tendanhmuc').removeClass('d-none');

				$(this).parent().addClass('d-none');
				$(this).parent().next().addClass('d-none');
				$(this).parent().next().next().find('.jquery_tendanhmuc').removeClass('d-none');
				$(this).parent().next().next().find('.jquery_btnUpdate').removeClass('d-none');

				event.preventDefault();
			});

			$('body').on('click', '.jquery_btnUpdate', function(event) {
				//Xử lý ajax để kết nối controller cập nhật dữ liệu
				value_id = $(this).prev().children('.jquery_id').val();
				value_tendanhmuc = $(this).prev().children('.jquery_tendanhmuc').val();
				// console.log(value_id);
				// console.log(value_tendanhmuc);

				//Xử lý vẽ jquery khi nhấn nút Update dữ liệu sẽ được cập nhật 
				$(this).addClass('d-none');
				$(this).prev().children('.jquery_tendanhmuc').addClass('d-none');
				data = $(this).prev().children('.jquery_tendanhmuc').val();
				$(this).parent().parent().children('.btnthaotac').removeClass('d-none');
				$(this).parent().parent().children('.tendanhmuc').html(data).removeClass('d-none');
			
				
				$.ajax({
					url: duongdan + 'Tintuc/capnhatdanhmuc',
					type: 'POST',
					dataType: 'json',
					data: {
						id: value_id,
						tendanhmuc: value_tendanhmuc
					}
				})
				.done(function() {
					console.log("success");
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
				
				event.preventDefault();
			});
		})
	</script>
	
</body>
</html>


