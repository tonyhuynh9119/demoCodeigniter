<!DOCTYPE html>
<html lang="en">
<head>
	<title> Arctica </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/css/stylesheet.css">
</head>
<body>
	
	<div class="topHeader">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="social float-sm-left text-center text-sm-left">
						<a href="#"><i class="fab fa-facebook-f"></i></a>
						<a href="#"><i class="fab fa-twitter"></i></a>
						<a href="#"><i class="fab fa-mixcloud"></i></a>
						<a href="#"><i class="fab fa-tumblr"></i></a>
					</div> <!-- social -->
					<div class="txt01 float-sm-left text-center text-sm-left">
						Call for reservation: +011 29 345 678
					</div><!-- text01 -->
				</div>
				<div class="col-sm-6">
					<div class="txt01 txt02 float-sm-right text-center text-sm-left">
						Opening Hours : 9:00am - 10:00pm
					</div><!-- text01 -->
				</div>
			</div>
		</div> <!-- container -->
	</div> <!-- topHeader -->
	<div class="menuTop">
		<nav class="navbar navbar-expand-sm">
			<div class="container">
				<a class="navbar-brand logo" href="#">
					<img src="images/logo_menuTop.png" alt="">
				</a>
				<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#mtop">
					&#9776;
				</button>
				<div class="collapse navbar-collapse" id="mtop">
					
					<ul class="nav navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="index.html">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="about.html">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url() ?>Monan">Menu</a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="<?= base_url() ?>Tintuc">Blog</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contactUs.html">Contact Us</a>
						</li>
						<li class="nav-item">
							<a class="nav-link btn01" href="#">Revervation</a>
						</li>
					</ul>
				</div> <!-- #mtop -->
			</div><!-- .container -->
		</nav>
	</div><!-- menuTop -->

	<div class="tiedenews">
		<div class="container">
			<div class="row bannerBlog">
				<div class="col-sm-6 offset-sm-3 text-center">
					<h3 class="headingDancingB32">Tips for new dishes</h3>
					<h5 class="headingRobotoB28">News Details</h5>
				</div>
			</div> <!-- row bannerBlog -->
			<div class="row contentBlog">
				<div class="col-sm-9 leftBlog">
					<?php foreach ($data as $value): ?>
					<div class="_1news">						
						<div class="card">
							<img class="card-img-top" src="<?= $value['anhtin'] ?>" alt="Card image cap">
							<div class="card-block">
								<h4 class="card-title"><?= $value['tieude'] ?></h4>
								<p class="card-text"><?= $value['trichdan'] ?></p>
								<p class="card-text">
									Ngày đăng bài: <?= date('d/m/Y - h:i - A',$value['ngaytao']) ?>
									<span class="customer"> - <?= $value['tendanhmuc'] ?></span>
								</p>
								<?= $value['noidungtin'] ?>
							</div>
						</div>
					</div>
					<?php endforeach ?>
					
					<div class="row">
						<div class="col-sm-12">
							<h3>Các tin khác</h3>
							<hr>
						</div>
						<?php foreach ($tinlienquan as $value): ?>
						<div class="col-sm-4">
							<div class="card-group">
								<div class="card">
									<a href="<?= $value['id'] ?>"><img class="card-img-top img-fluid" src="<?= $value['anhtin'] ?>" alt="Card image cap"></a>
									<div class="card-body">
										<h5 class="card-title"><?= $value['tieude'] ?></h5>
										<p class="card-text"><?= $value['trichdan'] ?></p>
										<p class="card-text"><small class="text-muted">Ngày đăng bài: <?= date('d/m/Y - h:i - A',$value['ngaytao']) ?>
									<span class="customer"> - <?= $value['tendanhmuc'] ?></span></small></p>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach ?>
					</div>
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
	</div> <!-- tiedenews -->	

	<footer>
		<div class="topFooter">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col1_4col">
						<img src="images/logo_footer.png" alt="" class="img-fluid">
						<p>Marsh mallow muffin soufflé jelly-o tart cake Marshmallow macaroon jelly jubes dont tiramisu croissant cake.</p>
						<div class="contact">
							<i class="far fa-paper-plane"></i> 
							<span>Address : 44 New Design Street, Melbourne 005</span>
						</div>
						<div class="contact"><i class="fas fa-phone"></i> <span>Phone : (01) 800 433 633</span></div>
						<div class="contact"><i class="far fa-envelope"></i> <span>Email : info@Example.com</span></div>
					</div>
					<div class="col-sm-2 col2_4col">
						<h5 class="titleFooter">usefull links</h5>
						<a href="#">About Company</a>
						<a href="#">Reservation</a>
						<a href="#">Help Center</a>
						<a href="#">Our Blog</a>
						<a href="#">Careers</a>
						<a href="#">Contact us</a>
					</div>
					<div class="col-sm-3 col3_4col">
						<h5 class="titleFooter">Latest Blog Post</h5>
						<div class="blockPost">
							<img src="images/service01.jpg" alt="" class="img-fluid">
							<div class="title">Peaceful Hostel</div>
							<div class="updateTime">25th June 2016</div>
						</div>
						<div class="blockPost">
							<img src="images/service01.jpg" alt="" class="img-fluid">
							<div class="title">Peaceful Hostel</div>
							<div class="updateTime">25th June 2016</div>
						</div>
						<div class="blockPost">
							<img src="images/service01.jpg" alt="" class="img-fluid">
							<div class="title">Peaceful Hostel</div>
							<div class="updateTime">25th June 2016</div>
						</div>	
							
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
	
	<script src="<?= base_url() ?>vendor/js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/bootstrap.bundle.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/isotope.pkgd.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/imagesloaded.pkgd.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/myScript.js" type="text/javascript"></script>
</body>
</html>