<!DOCTYPE html>
<html lang="en">
<head>
	<title> Arctica </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/css/stylesheet.css">
</head>
<body>
<?php 
	if($this->session->has_userdata('username') && ($this->session->userdata('username') == 'admin') ){
		?>
		<div class="alert alert-success" role="alert">
			<strong>Demo Session</strong> Đây là giá trị User name : 
			<?=  $this->session->userdata('username'); ?> và Password: <?= $this->session->userdata('password'); ?>
		</div>
		<?php
	}
?>
<?php foreach ($dataHeader as $key => $value): ?>
<?php 
if($key == 'mangXaHoi'){
	$mangXaHoi = $value;
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
	<div class="topHeader">
		<div class="container">  
			<div class="row">
				<div class="col-sm-6">

					<div class="social float-sm-left text-center text-sm-left">
						<a href="<?= $mangXaHoi['linkfb'] ?>"><i class="fab fa-facebook-f"></i></a>
						<a href="<?= $mangXaHoi['linktwitter'] ?>"><i class="fab fa-twitter"></i></a>
						<a href="<?= $mangXaHoi['linkpinterest'] ?>"><i class="fab fa-mixcloud"></i></a>
						<a href="<?= $mangXaHoi['linkgoogleplus'] ?>"><i class="fab fa-tumblr"></i></a>
					</div> <!-- social -->
					<div class="txt01 float-sm-left text-center text-sm-left">
						<?= $duongDayNong['textHotLine'] ?>: <?= $duongDayNong['sdt'] ?>
					</div><!-- text01 -->
				</div>
				<div class="col-sm-6">
					<div class="txt01 txt02 float-sm-right text-center text-sm-left">
						<?= $gioMoCua['textOpenRestaurant'] ?> : <?= $gioMoCua['thoigian'] ?>
					</div><!-- text01 -->
				</div>
			</div>
		</div> <!-- container -->
	</div> <!-- topHeader -->
	<div class="menuTop">
		<nav class="navbar navbar-expand-sm">
			<div class="container">
				<a class="navbar-brand logo" href="#">
					<img src="<?= $logo ?>" alt="<?= $logo ?>">
				</a>
				<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#mtop">
					&#9776;
				</button>
				<div class="collapse navbar-collapse" id="mtop">
					
					<ul class="nav navbar-nav ml-auto">
						<?php foreach ($dataMenuHeader as $value): ?>
							<?php if($value['tieude'] != 'Blog'){ ?>
								<li class="nav-item"><a class="nav-link" href="<?= base_url() ?><?= $value['linkmenu'] ?>"><?= $value['tieude'] ?></a></li>
							<?php }else{ ?>
								<li class="nav-item active"><a class="nav-link" href="<?= base_url() ?><?= $value['linkmenu'] ?>"><?= $value['tieude'] ?></a></li>
							<?php } ?>
						<?php endforeach ?>
						<li class="nav-item">
							<a class="nav-link btn01" href="#">Revervation</a>
						</li>
					</ul>
				</div> <!-- #mtop -->
			</div><!-- .container -->
		</nav>
	</div><!-- menuTop -->

	<div class="blockNewUpdates blockBlog">
		<div class="container">
			<div class="row bannerBlog">
				<div class="col-sm-6 offset-sm-3 text-center">
					<h3 class="headingDancingB32">Our Fresh And Hot Dishes</h3>
					<h5 class="headingRobotoB28">Special BreakFast Menu Items</h5>
				</div>
			</div> <!-- row bannerBlog -->
			<div class="row contentBlog">
				<div class="col-sm-9 leftBlog">
					<?php foreach ($tt_tin as $value_tin): ?>
					<div class="_1news">						
						<div class="card">
							<a href="<?= base_url() ?>Tintuc/chiTietTinTuc/<?= $value_tin['id'] ?>"><img class="card-img-top" src="<?= $value_tin['anhtin'] ?>" alt="Card image cap"></a>
							<div class="card-block">
								<a href="<?= base_url() ?>Tintuc/chiTietTinTuc/<?= $value_tin['id'] ?>"><h4 class="card-title"><?= $value_tin['tieude'] ?></h4></a>
								<p class="card-text">
									Ngày đăng bài: <?= date('d/m/Y - h:i - A',$value_tin['ngaytao']) ?>
									<span class="customer"> - <?= $value_tin['tendanhmuc'] ?></span>
								</p>
								<p class="card-text"><?= $value_tin['trichdan'] ?></p>
								<!-- <div class="like float-right">10 Comments</div> -->
								<a href="<?= base_url() ?>Tintuc/chiTietTinTuc/<?= $value_tin['id'] ?>" class="rm">Read More</a>
							</div>
						</div>
					</div><!--  _1news -->
					<?php endforeach ?>
				</div><!-- col-sm-9 leftBlog-->
				<div class="col-sm-3 rightBlog">
					<div class="blockSearch">
						<form action="<?= base_url() ?>Tintuc/timkiem" method="post">
							<input id="search" type="text" class="form-control" name="timkiem" placeholder="Search...">
							<button type="submit"><i class="fas fa-search"></i></button>
						</form>
					</div>

					<div class="category">
						<h5 class="headingOswaldR18">Categories</h5>
						<ul>
							<?php foreach ($danhmuctin as $value): ?>
								<li><i class="fas fa-circle"></i><a href="<?= base_url(); ?>Tintuc/danhmuc/<?= $value['id'] ?>"><?= $value['tendanhmuc'] ?></a></li>
							<?php endforeach ?>
							
						</ul>
					</div>
				</div><!-- col-sm-3 rightBlog -->
			</div><!-- row contentBlog -->
		</div><!-- container -->
	</div> <!-- blockNewUpdates -->
	<?php 
		$uri = $_SERVER['REQUEST_URI'];
		$uri = explode('/', $uri);
		$tranghientai = end($uri);
		//$tranghientai = $tranghientai - 1;
	?>
	<div class="blockPagination">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 offset-sm-3">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<?php 
								if($tranghientai == 1){

								}else{
									?>
										<li class="page-item prev"><a class="page-link" href="?= base_url()?>Tintuc/page/<?= $tranghientai - 1 ?>">Previous</a></li>
									<?php
								}

							 ?>
							
							<?php for ($i = 0;  $i < $sotrang; $i++) { ?>
								<?php if ($tranghientai == ($i+1)){ ?>
									<li class="page-item current"><a class="page-link" href="<?= base_url()?>Tintuc/page/<?= $i+1 ?>"><?= $i+1 ?></a></li>
								<?php }else{ ?>
									<li class="page-item"><a class="page-link" href="<?= base_url()?>Tintuc/page/<?= $i+1 ?>"><?= $i+1 ?></a></li>
								<?php } ?>
							<?php }	?>
							<?php 
								if ($tranghientai == $sotrang) {
									
								}else{
									?>
										<li class="page-item next"><a class="page-link" href="<?= base_url()?>Tintuc/page/<?= $tranghientai + 1 ?>">Next</a></li>
									<?php
								}

							 ?>

						</ul>
					</nav>
				</div>
			</div> <!-- row -->
		</div> <!-- container -->
	</div> <!-- blockPagination -->
	

	<footer>
		<div class="topFooter">
			<div class="container">
				<div class="row">
					<?php foreach ($dataFooter as $key => $value): ?>
						<?php 
						if($key == 'thongtin'){
							$thongtin = $value;
						}
						if($key == 'lienkethuuich'){
							$lienkethuuich = $value;
						}

						?>
						
					<?php endforeach ?>
					<div class="col-sm-4 col1_4col">
						<img src="<?= $thongtin['logo'] ?>" alt="" class="img-fluid">
						<p><?= $thongtin['gioithieu'] ?></p>
						<div class="contact"><i class="far fa-paper-plane"></i><span>Address : <?= $thongtin['diachi'] ?></span>
						</div>
						<div class="contact"><i class="fas fa-phone"></i> <span>Phone : <?= $thongtin['dienthoai'] ?></span></div>
						<div class="contact"><i class="far fa-envelope"></i> <span>Email : <?= $thongtin['email'] ?></span></div>
					</div>
					<div class="col-sm-2 col2_4col">
						<h5 class="titleFooter">usefull links</h5>
						<a href="<?= $lienkethuuich['aboutCompany'] ?>">About Company</a>
						<a href="<?= $lienkethuuich['reservation'] ?>">Reservation</a>
						<a href="<?= $lienkethuuich['helpCenter'] ?>">Help Center</a>
						<a href="<?= $lienkethuuich['ourBlog'] ?>">Our Blog</a>
						<a href="<?= $lienkethuuich['careers'] ?>">Careers</a>
						<a href="<?= $lienkethuuich['contactUs'] ?>">Contact us</a>
					</div>
					<div class="col-sm-3 col3_4col">
						<h5 class="titleFooter">Latest Blog Post</h5>
						<?php foreach ($laybatinmoinhat as $value): ?>
							<div class="blockPost">
								<img src="<?= $value['anhtin'] ?>" alt="" class="img-fluid">
								<div class="title"><?= $value['tieude'] ?></div>
								<div class="updateTime"><?= date('d M Y',$value['ngaytao']) ?></div>
							</div>
						<?php endforeach ?>	
					</div>
					<div class="col-sm-3 col4_4col">
						<h5 class="titleFooter">Opening Hours</h5>
						<div class="open">
							<div class="time float-right">9:00 am - 23:00 pm</div>
							<div class="date">Mon — Fri</div>
						</div>
						<div class="open">
							<div class="time float-right">10:00 am - 22:00 pm</div>
							<div class="date">Saturday</div>
						</div>
						<div class="open">
							<div class="time float-right">10:00 am - 21:00 pm</div>
							<div class="date">Sunday </div>
						</div>
						<p>Note: Arctica Restaurant is closed on holidays.</p>
					</div>
				</div>
			</div>
		</div> <!-- topFooter -->
		<div class="BottomFooter">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<div class="copyRight">Copyrights © 2015  All Rights Reserved.</div>
					</div>
				</div>
			</div>
		</div> <!-- BottomFooter -->
	</footer>
	
	<script src="<?= base_url(); ?>vendor/js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="<?= base_url(); ?>vendor/js/bootstrap.bundle.min.js" type="text/javascript"></script>
	<script src="<?= base_url(); ?>vendor/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?= base_url(); ?>vendor/js/isotope.pkgd.min.js" type="text/javascript"></script>
	<script src="<?= base_url(); ?>vendor/js/imagesloaded.pkgd.min.js" type="text/javascript"></script>
	<script src="<?= base_url(); ?>vendor/js/myScript.js" type="text/javascript"></script>
</body>
</html>