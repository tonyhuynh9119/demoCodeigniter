<!DOCTYPE html>
<html lang="en">
<head>
	<title> Arctica </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="vendor/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/css/stylesheet.css">
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
							<a class="nav-link" href="menuList.html">Menu</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="blog.html">Blog</a>
						</li>
						<li class="nav-item active">
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
	
	<div class="infoChef sendAMessage">
		<div class="container">
			<div class="row">
				<div class="col-sm-5">
					<img src="images/chef.jpg" alt="" class="img-fluid">
				</div> <!-- col-sm-4 -->
				<div class="col-sm-7">
					<h3 class="headingDancingB32">Send A Message</h3>
					<h5 class="headingRobotoB24">Leave A Message Here</h5>
					<form action="<?= base_url() ?>ContactUsController/sendMail" method="post"class="form-row">
						<div class="col-sm-6">
							<input name="ten" type="text" class="form-control" name="input_name" id="input_name" placeholder="Name">
						</div>
						<div class="col-sm-6">
							<input name="email" type="email" class="form-control" name="input_email" id="input_email" placeholder="Email">
						</div>
						<div class="col-sm-6">
							<input name="sodienthoai" type="number" class="form-control" name="input_phone" id="input_phone" placeholder="Phone">
						</div>
						<div class="col-sm-6">
							<input name="website" type="text" class="form-control" name="input_website" id="input_website" placeholder="Web">
						</div>
						<div class="col-sm-12">
							<textarea name="tinnhan" id="txtarea_description" class="form-control" rows="6" placeholder="Your need & Description"></textarea>
						</div>
						<button class="btn btn-warning btn02">Send Message</button>
					</form>
				</div> <!-- col-sm-7 -->
			</div> <!-- row -->
		</div> <!-- container -->
	</div><!-- infoChef sendAMessage -->

	<div class="titleMenu bannerContactUs">
		<div class="container">
			<div class="row">
				<div class="col-2"></div>
				<div class="col-sm-8 text-center">
					<h5>Thanks For Visit Us</h5>
					<h3>We Make Stay Fresh Food & Wounderful View</h3>
				</div>
			</div><!-- row -->
		</div> <!-- container -->
	</div> <!-- titleMenu bannerContactUs-->

	<div class="blockNewUpdates blockLocations">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h1>Get In Touch</h1>
					<h3>Our Branch Locations</h3>
				</div>
			</div>
			<div class="row">
				<div class="card-deck-wrapper">
					<div class="card-deck">
						<div class="card">
							<img class="card-img-top" src="images/newupdate01.jpg" alt="Card image cap">
							<div class="card-block">
								<ul>
									<li>
										<i class="far fa-paper-plane"></i>
										<span class="address">A: 44 First Floor New Design Street,  Melbourne 005</span>
									</li>
									<li>
										<i class="fas fa-phone"></i>
										<span class="address">P: + (01) 800 433 633  (or)  + (01) 800 433 589</span>
									</li>
									<li>
										<i class="far fa-envelope"></i>
										<span class="address">E: Arctica@Example.com  (or)  info@arctica.com</span>
									</li>
								</ul>
								<a href="#" class="getDir">Get Direction</a>
							</div>
						</div>
						<div class="card">
							<img class="card-img-top" src="images/newupdate02.jpg" alt="Card image cap">
							<div class="card-block">
								<ul>
									<li>
										<i class="far fa-paper-plane"></i>
										<span class="address">A: 44 First Floor New Design Street,  Melbourne 005</span>
									</li>
									<li>
										<i class="fas fa-phone"></i>
										<span class="address">P: + (01) 800 433 633  (or)  + (01) 800 433 589</span>
									</li>
									<li>
										<i class="far fa-envelope"></i>
										<span class="address">E: Arctica@Example.com  (or)  info@arctica.com</span>
									</li>
								</ul>
								<a href="#" class="getDir">Get Direction</a>
							</div>
						</div>
						<div class="card">
							<img class="card-img-top" src="images/newupdate03.jpg" alt="Card image cap">
							<div class="card-block">
								<ul>
									<li>
										<i class="far fa-paper-plane"></i>
										<span class="address">A: 44 First Floor New Design Street,  Melbourne 005</span>
									</li>
									<li>
										<i class="fas fa-phone"></i>
										<span class="address">P: + (01) 800 433 633  (or)  + (01) 800 433 589</span>
									</li>
									<li>
										<i class="far fa-envelope"></i>
										<span class="address">E: Arctica@Example.com  (or)  info@arctica.com</span>
									</li>
								</ul>
								<a href="#" class="getDir">Get Direction</a>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div> <!-- blockNewUpdates blockLocations-->
	
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
	
	<script src="vendor/js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="vendor/js/bootstrap.bundle.min.js" type="text/javascript"></script>
	<script src="vendor/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="vendor/js/isotope.pkgd.min.js" type="text/javascript"></script>
	<script src="vendor/js/imagesloaded.pkgd.min.js" type="text/javascript"></script>
	<script src="vendor/js/myScript.js" type="text/javascript"></script>
</body>
</html>