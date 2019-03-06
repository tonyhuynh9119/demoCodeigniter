<!DOCTYPE html>
<html lang="en">
<head>
	<title> Danh sách món ăn hàng ngày </title>
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
							<?php if($value['tieude'] != 'Menu'){ ?>
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
	
	<div class="titleMenu bannerMenuList">
		<div class="container">
			<div class="row">
				<div class="col-2"></div>
				<div class="col-sm-8 text-center">
					<h5>Taste The Best Dishes.</h5>
					<h3>Our Menu List</h3>
				</div>
			</div><!-- row -->
		</div> <!-- container -->
	</div> <!-- titleMenu bannerMenuList-->

	<div class="blockMenuList">
		<div class="titleMenuList">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 offset-sm-3 text-center">
						<img src="images/menulist_bread.jpg" alt="" class="img-fluid">
						<h3 class="headingDancingB32">Our Fresh And Hot Dishes</h3>
						<h5 class="headingRobotoB28">Special BreakFast Menu Items</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="contentMenu">
			<div class="container">
				<div class="row ctmenu">
					
					<?php foreach ($buoisang as $value): ?>
					<div class="col-12 col-sm-6 _1dish dinner">
						<div class="row">
							<div class="col-4 col-sm-3">
								<?php if(empty($value['new'])){?>
								<!-- không làm gì hết -->
								<?php }else{ ?>
									<div class="newDish"><?= $value['new'] ?></div>
								<?php } ?>
								<img src="<?= $value['anh'] ?>" alt="<?= $value['anh'] ?>" class="img-fluid">
							</div>
							<div class="col-8 col-sm-9">
								<div class="top">
									<div class="name_1dish"><?= $value['ten'] ?></div>
									<div class="price">$ <?= $value['gia'] ?></div>
								</div> <!-- top -->
								<div class="bottom">
									<div class="describe"><?= $value['mota'] ?></div>
								</div> <!-- bottom -->
							</div>
						</div> <!-- row -->
					</div> <!-- col-sm-6 _1dish -->
					<?php endforeach ?>
					
				</div> <!-- row -->
			</div><!-- container -->
		</div><!-- contentMenu -->
	</div><!-- blockMenuList -->

	<div class="titleMenu bannerMenuList02">
		<div class="container">
			<div class="row">
				<div class="col-2"></div>
				<div class="col-sm-8 text-center">
					<img src="images/menulist_shrimp.png" alt="" class="img-fluid">
					<h5>With Meat, Fish or Vegetables</h5>
					<h3>Special Lunch Menu Items</h3>
				</div>
			</div><!-- row -->
		</div> <!-- container -->
	</div> <!-- titleMenu bannerMenuList-->

	<div class="blockMenuList02">
		<div class="titleMenuList">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 offset-sm-3 text-center">
						<h3 class="headingDancingB32">Our Fresh And Hot Dishes</h3>
						<h5 class="headingRobotoB28">Special BreakFast Menu Items</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="contentMenu">
			<div class="container">
				<div class="row ctmenu">
					<?php foreach ($buoitrua as $value): ?>
					<div class="col-12 col-sm-6 _1dish dinner">
						<div class="row">
							<div class="col-4 col-sm-3">
								<?php if(empty($value['new'])){?>
								<!-- không làm gì hết -->
								<?php }else{ ?>
									<div class="newDish"><?= $value['new'] ?></div>
								<?php } ?>
								<img src="<?= $value['anh'] ?>" alt="<?= $value['anh'] ?>" class="img-fluid">
							</div>
							<div class="col-8 col-sm-9">
								<div class="top">
									<div class="name_1dish"><?= $value['ten'] ?></div>
									<div class="price">$ <?= $value['gia'] ?></div>
								</div> <!-- top -->
								<div class="bottom">
									<div class="describe"><?= $value['mota'] ?></div>
								</div> <!-- bottom -->
							</div>
						</div> <!-- row -->
					</div> <!-- col-sm-6 _1dish -->
					<?php endforeach ?>

				</div> <!-- row -->
			</div><!-- container -->
		</div><!-- contentMenu -->
	</div><!-- blockMenuList -->

	<div class="titleMenu bannerMenuList02 bannerMenuList03">
		<div class="container">
			<div class="row">
				<div class="col-2"></div>
				<div class="col-sm-8 text-center">
					<img src="images/menulist_shrimp.png" alt="" class="img-fluid">
					<h5>With Meat, Fish or Vegetables</h5>
					<h3>Special Lunch Menu Items</h3>
				</div>
			</div><!-- row -->
		</div> <!-- container -->
	</div> <!-- titleMenu bannerMenuList-->

	<div class="blockMenuList02 blockMenuList03">
		<div class="titleMenuList">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 offset-sm-3 text-center">
						<h3 class="headingDancingB32">Our Fresh And Hot Dishes</h3>
						<h5 class="headingRobotoB28">Special BreakFast Menu Items</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="contentMenu">
			<div class="container">
				<div class="row ctmenu">
					<?php foreach ($buoitoi as $value): ?>
					<div class="col-12 col-sm-6 _1dish dinner">
						<div class="row">
							<div class="col-4 col-sm-3">
								<?php if(empty($value['new'])){?>
								<!-- không làm gì hết -->
								<?php }else{ ?>
									<div class="newDish"><?= $value['new'] ?></div>
								<?php } ?>
								<img src="<?= $value['anh'] ?>" alt="<?= $value['anh'] ?>" class="img-fluid">
							</div>
							<div class="col-8 col-sm-9">
								<div class="top">
									<div class="name_1dish"><?= $value['ten'] ?></div>
									<div class="price">$ <?= $value['gia'] ?></div>
								</div> <!-- top -->
								<div class="bottom">
									<div class="describe"><?= $value['mota'] ?></div>
								</div> <!-- bottom -->
							</div>
						</div> <!-- row -->
					</div> <!-- col-sm-6 _1dish -->
					<?php endforeach ?>

				</div> <!-- row -->
			</div><!-- container -->
		</div><!-- contentMenu -->
	</div><!-- blockMenuList -->
	
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