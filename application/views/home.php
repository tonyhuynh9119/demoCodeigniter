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
							<?php if($value['tieude'] != 'Home'){ ?>
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

	<div class="slidesTop">
		<div id="slidesHome" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#slidesHome" data-slide-to="0" class="active"></li>
				<li data-target="#slidesHome" data-slide-to="1"></li>
				<li data-target="#slidesHome" data-slide-to="2"></li>
				<li data-target="#slidesHome" data-slide-to="3"></li>

			</ol>
			<div class="carousel-inner" role="listbox">
				<?php
				$data = json_decode($data, true);
				$dem = 1;
				 ?>
				<?php foreach ($data as $value): ?>
				<div class="carousel-item <?php if($dem == 1){ echo "active"; $dem++;} ?>">
					<img src="<?= $value['slide_img'] ?>" alt="slides" class="img-fluid">
					<div class="carousel-caption">
						<div class="container">
							<div class="row">
								<div class="col-sm-8 text-left">
									<img src="images/iconSlide.png" alt="icon">
									<h1><?= $value['title'] ?></h1>
									<p><?= $value['description'] ?></p>
									<a href="<?= $value['btn_link'] ?>" class="btn btn-warning btnBuyNow"><?= $value['btn_text'] ?></a>		
								</div>
							</div>
						</div>
					</div> <!-- carousel-caption -->
				</div> <!-- carousel-item -->
				<?php endforeach ?>
			</div>
			<a class="carousel-control-prev" href="#slidesHome" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#slidesHome" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div><!-- slidesTop -->
	<div class="blockService">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 text-center _1service">
					<img src="images/service01.jpg" alt="images/service01.jpg" class="img-fluid">
					<h5>Our Restaruant Story</h5>
					<p>Sed ut perspiciatis unde omnis iste natus errorsit voluptatem accusantium doloremque laudantium thes hatles tooest surf totam rem aperiam.</p>
					<a href="#">Read More</a>
				</div> <!-- col-sm-4 -->
				<div class="col-sm-4 text-center _1service">
					<img src="images/service02.jpg" alt="images/service02.jpg" class="img-fluid">
					<h5>Our Restaruant Story</h5>
					<p>Sed ut perspiciatis unde omnis iste natus errorsit voluptatem accusantium doloremque laudantium thes hatles tooest surf totam rem aperiam.</p>
					<a href="#">Read More</a>
				</div> <!-- col-sm-4 -->
				<div class="col-sm-4 text-center _1service">
					<img src="images/service03.jpg" alt="images/service03.jpg" class="img-fluid">
					<h5>Our Restaruant Story</h5>
					<p>Sed ut perspiciatis unde omnis iste natus errorsit voluptatem accusantium doloremque laudantium thes hatles tooest surf totam rem aperiam.</p>
					<a href="#">Read More</a>
				</div> <!-- col-sm-4 -->
				
			</div> <!-- row -->
		</div> <!-- container -->
	</div><!-- blockService -->

	<div class="adMenu">
		<div class="titleMenu">
			<div class="container">
				<div class="row">
					<div class="col-2"></div>
					<div class="col-sm-8 text-center">
						<h5>Our Delicious Menu Items</h5>
						<h3>Fresh And Healthy Food Available</h3>
					</div>
				</div>	
			</div>
		</div> <!-- titleMenu -->
		<div class="menuDetails">
			<div class="tagMenu">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<ul>
								<li class="active"><a href="#" data-dish="*">All</a></li>
								<li><a href="#" data-dish=".1">Break Fast</a></li>
								<li><a href="#" data-dish=".2">Lunch</a></li>
								<li><a href="#" data-dish=".12">Dinner</a></li>
							</ul>
							
						</div> <!-- col-sm-6 -->
					</div> <!-- row -->
				</div><!-- container -->
			</div><!-- tagMenu -->
			<div class="contentMenu">
				<div class="container">
					<div class="row ctmenu">
						<?php foreach ($dataAllMonAn as $value): ?>
						<div class="col-12 col-sm-6 _1dish <?= $value['iddanhmuc'] ?>">
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
										<div class="price"><?= $value['gia'] ?> VNĐ</div>
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
		</div> <!-- menuDetails -->	
	</div><!-- adMenu -->
	
	<div class="slidesDish">
		<div class="container-fluid">
			<div class="row">
				<div class="col-1"></div>
				<div class="col-sm-6">
					<h4 class="title">Our Special Dishes</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div id="slide-dishes-restaurant" class="carousel slide" data-interval="3000" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slide-dishes-restaurant" data-slide-to="0" class="active"></li>
							<li data-target="#slide-dishes-restaurant" data-slide-to="1"></li>
							<li data-target="#slide-dishes-restaurant" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner" role="listbox">
							<div class="carousel-item active">
								<div class="row">
									<div class="_4dish">
										<img src="images/silde3dish01.jpg" alt="" class="img-fluid">
										<div class="price float-sm-right">$100</div>
										<div class="name">Trio Sausages</div>
										<div class="describe">Mussel with tomato sauce, wine</div>		
									</div> <!-- _4dish -->
									<div class="_4dish">
										<img src="images/silde3dish02.jpg" alt="" class="img-fluid">
										<div class="price float-sm-right">$100</div>
										<div class="name">Trio Sausages</div>
										<div class="describe">Mussel with tomato sauce, wine</div>		
									</div> <!-- _4dish -->
									<div class="_4dish">
										<img src="images/silde3dish03.jpg" alt="" class="img-fluid">
										<div class="price float-sm-right">$100</div>
										<div class="name">Trio Sausages</div>
										<div class="describe">Mussel with tomato sauce, wine</div>		
									</div> <!-- _4dish -->
									<div class="_4dish">
										<img src="images/silde3dish01.jpg" alt="" class="img-fluid">
										<div class="price float-sm-right">$100</div>
										<div class="name">Trio Sausages</div>
										<div class="describe">Mussel with tomato sauce, wine</div>		
									</div> <!-- _4dish -->
									<div class="_4dish">
										<img src="images/silde3dish02.jpg" alt="" class="img-fluid">
										<div class="price float-sm-right">$100</div>
										<div class="name">Trio Sausages</div>
										<div class="describe">Mussel with tomato sauce, wine</div>		
									</div> <!-- _4dish -->
								</div> <!-- row -->
							</div> <!-- carousel-item -->
							<div class="carousel-item">
								<div class="row">
									<div class="_4dish">
										<img src="images/silde3dish03.jpg" alt="" class="img-fluid">
										<div class="price float-sm-right">$100</div>
										<div class="name">Trio Sausages</div>
										<div class="describe">Mussel with tomato sauce, wine</div>		
									</div> <!-- _4dish -->
									<div class="_4dish">
										<img src="images/silde3dish01.jpg" alt="" class="img-fluid">
										<div class="price float-sm-right">$100</div>
										<div class="name">Trio Sausages</div>
										<div class="describe">Mussel with tomato sauce, wine</div>		
									</div> <!-- _4dish -->
									<div class="_4dish">
										<img src="images/silde3dish02.jpg" alt="" class="img-fluid">
										<div class="price float-sm-right">$100</div>
										<div class="name">Trio Sausages</div>
										<div class="describe">Mussel with tomato sauce, wine</div>		
									</div> <!-- _4dish -->
									<div class="_4dish">
										<img src="images/silde3dish03.jpg" alt="" class="img-fluid">
										<div class="price float-sm-right">$100</div>
										<div class="name">Trio Sausages</div>
										<div class="describe">Mussel with tomato sauce, wine</div>		
									</div> <!-- _4dish -->
									<div class="_4dish">
										<img src="images/silde3dish01.jpg" alt="" class="img-fluid">
										<div class="price float-sm-right">$100</div>
										<div class="name">Trio Sausages</div>
										<div class="describe">Mussel with tomato sauce, wine</div>		
									</div> <!-- _4dish -->
								</div> <!-- row -->
							</div> <!-- carousel-item -->
							<div class="carousel-item">
								<div class="row">
									<div class="_4dish">
										<img src="images/silde3dish02.jpg" alt="" class="img-fluid">
										<div class="price float-sm-right">$100</div>
										<div class="name">Trio Sausages</div>
										<div class="describe">Mussel with tomato sauce, wine</div>		
									</div> <!-- _4dish -->
									<div class="_4dish">
										<img src="images/silde3dish03.jpg" alt="" class="img-fluid">
										<div class="price float-sm-right">$100</div>
										<div class="name">Trio Sausages</div>
										<div class="describe">Mussel with tomato sauce, wine</div>		
									</div> <!-- _4dish -->
									<div class="_4dish">
										<img src="images/silde3dish01.jpg" alt="" class="img-fluid">
										<div class="price float-sm-right">$100</div>
										<div class="name">Trio Sausages</div>
										<div class="describe">Mussel with tomato sauce, wine</div>		
									</div> <!-- _4dish -->
									<div class="_4dish">
										<img src="images/silde3dish02.jpg" alt="" class="img-fluid">
										<div class="price float-sm-right">$100</div>
										<div class="name">Trio Sausages</div>
										<div class="describe">Mussel with tomato sauce, wine</div>		
									</div> <!-- _4dish -->
									<div class="_4dish">
										<img src="images/silde3dish03.jpg" alt="" class="img-fluid">
										<div class="price float-sm-right">$100</div>
										<div class="name">Trio Sausages</div>
										<div class="describe">Mussel with tomato sauce, wine</div>		
									</div> <!-- _4dish -->
								</div> <!-- row -->
							</div> <!-- carousel-item -->
							
						</div>
						<a class="carousel-control-prev" href="#slide-dishes-restaurant" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#slide-dishes-restaurant" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div> <!-- col-sm-12 -->     
			</div><!-- row -->	
		</div> <!-- container -->
	</div><!-- slidesDish -->
	<div class="infoChef">
		<div class="container">
			<div class="row">
				<div class="col-sm-5">
					<img src="images/chef.jpg" alt="" class="img-fluid">
				</div> <!-- col-sm-4 -->
				<div class="col-sm-7">
					<h1 class="nameChef">Stevan Smith</h1>
					<h3 class="duty">The Master of Cooking</h3>
					<p class="text1">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.ut labore et dolore magnam aliquam quaerat voluptatem.</p>
					<div class="social">
						<a href="#"><i class="fab fa-facebook-f"></i></a>
						<a href="#"><i class="fab fa-twitter"></i></a>
						<a href="#"><i class="fab fa-mixcloud"></i></a>
						<a href="#"><i class="fab fa-tumblr"></i></a>
					</div>
				</div> <!-- col-sm-7 -->
			</div> <!-- row -->
		</div> <!-- container -->
	</div><!-- infoChef -->

	<div class="bannerReservation">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h2>Enjoy Pleasant Pastime With Friends and Partners</h2>
					<h1>Relaxing Atmosphere</h1>
				</div>
			</div>
		</div>
	</div> <!-- bannerReservation -->

	<div class="blockReservation">
		<div class="container">
			<div class="row infoReservation">
				<div class="col-3"></div>
				<div class="col-sm-6 text-center">
					<h2 class="title">Make A Reservation</h2>
					<p class="text01">Booking a table has never been so easy with free & instant online restaurant reservations, booking now!!</p>
					<p class="text02">Monday to Friday  <span class="time">9:00am - 23:00pm</span> Saturday to Sunday <span class="time">10:00am - 22:00pm</span><br>Note: Arctica Restaurant is closed on holidays.</p>
					<div class="phone">0844.335.1211</div>
				</div>
			</div> <!-- infoReservation -->
			<div class="row">
				<div class="col-2"></div>
				<div class="col-sm-8">
					<hr>
				</div>
			</div>

			<div class="row bookOnline">
				<div class="col-sm-12 text-center">
					<h2 class="title">Book Your Table Online</h2>
				</div>
				<form action="<?= base_url() ?>Trangchu/datban" method="post">
					<div class="form-row">
						<div class="col-sm-4">
							<div class="form-group">
							    <input name="tenkh" type="text" class="form-control" id="yourname" placeholder="Your Name *">
							</div>
						</div> <!-- form-group -->
						<div class="col-sm-4">
							<div class="form-group">
							    <input name="email" type="email" class="form-control" id="youremail" placeholder="Your Email *">
							</div>
						</div> <!-- form-group -->
						<div class="col-sm-4">
							<div class="form-group">
							    <input name="sdt" type="number" class="form-control" id="mobileNumber" placeholder="Mobile Number *">
							</div>
						</div> <!-- form-group -->
						<div class="col-sm-4">
							<div class="form-group">
							    <input name="ngaydatban" type="date" class="form-control" id="date" placeholder="Date *">
							</div>
						</div> <!-- form-group -->
						<div class="col-sm-4">
							<div class="form-group">
							    <input name="giodatban" type="time" class="form-control" id="time" placeholder="Time *">
							</div>
						</div> <!-- form-group -->
						<div class="col-sm-4">
							<div class="form-group">
							    <input name="songuoi" type="text" class="form-control" id="noOFPersons" placeholder="No. of Persons *">
							</div>
						</div> <!-- form-group -->
						<button class="btn btn-warning" type="submit">BOOK NOW</button>
					</div> <!-- form-row -->
				</form>
			</div> <!-- bookOnline -->

		</div> <!-- container -->
	</div> <!-- blockReservation -->
	
	<div class="slidesFeedback">
		<div class="container-fluid">
			<div class="row">
				<div id="slide-feedback" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#slide-feedback" data-slide-to="0" class="active"></li>
						<li data-target="#slide-feedback" data-slide-to="1"></li>
						<li data-target="#slide-feedback" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active">
							<div class="row">
								<div class="col-2"></div>
								<div class="col-sm-8">
									<div class="quote text-center">
										<i class="fas fa-quote-left fa-3x"></i>
										<p class="text">We enjoy sharing the projects and posts we make just as much as we enjoy creating them. consectetur adipiscing elit, sed do eiusmod tempor incididunt Sit back & take a moment to browse through some of our recent completed work</p>
										<div class="customer">Stevan Smith</div>
									</div>
								</div>
							</div>
						</div>
						<div class="carousel-item">
							<div class="row">
								<div class="col-2"></div>
								<div class="col-sm-8">
									<div class="quote text-center">
										<i class="fas fa-quote-left fa-3x"></i>
										<p class="text">Ipsam morbi, mus. Rem nec taciti, molestias fuga platea! Maxime! Unde labore. Cupidatat incididunt dignissim nulla pellentesque magnis! Molestiae aliquet illo semper, tempora possimus, tempora quidem.</p>
										<div class="customer">Stevan Smith</div>
									</div>
								</div>
							</div>
						</div>
						<div class="carousel-item">
							<div class="row">
								<div class="col-2"></div>
								<div class="col-sm-8">
									<div class="quote text-center">
										<i class="fas fa-quote-left fa-3x"></i>
										<p class="text">Optio, neque voluptatibus! Odio, minima laudantium per, ridiculus ad eum ullamco corrupti autem, tempora mi viverra. Facere veniam nec. Error sed natoque assumenda cumque quas! Minim laboriosam excepturi.</p>
										<div class="customer">Stevan Smith</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<a class="carousel-control-prev" href="#slide-feedback" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#slide-feedback" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a> 
				</div> <!-- #slide-feedback -->
			</div><!--  row -->
		</div> <!-- container-fluid -->
	</div> <!-- slidesFeedback -->

	<div class="blockNewUpdates">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h1>Our Blog</h1>
					<h3>Latest New Updates</h3>
				</div>
			</div>
			<div class="row">
				<div class="card-deck-wrapper">
					<div class="card-deck">
						<div class="card">
							<img class="card-img-top" src="images/newupdate01.jpg" alt="Card image cap">
							<div class="card-block">
								<h4 class="card-title">Ingredients For Cooking Pasta</h4>
								<p class="card-text">
									10 June 2016
									<span class="customer">by Peter Parker</span>
								</p>
								<p class="card-text">Curabitur quas nets lacusets nulat iaculis loremis etis nisle varius vitae seditum fugiatum ligul aliquam qui sequi nets lacusets nulat</p>
								<div class="like float-right">10 <span class="like">Likes</span></div>
								<a href="#" class="rm">Read More</a>
							</div>
						</div>
						<div class="card">
							<img class="card-img-top" src="images/newupdate03.jpg" alt="Card image cap">
							<div class="card-block">
								<h4 class="card-title">Ingredients For Cooking Pasta</h4>
								<p class="card-text">
									10 June 2016
									<span class="customer">by Peter Parker</span>
								</p>
								<p class="card-text">Curabitur quas nets lacusets nulat iaculis loremis etis nisle varius vitae seditum fugiatum ligul aliquam qui sequi nets lacusets nulat</p>
								<div class="like float-right">10 <span class="like">Likes</span></div>
								<a href="#" class="rm">Read More</a>
							</div>
						</div>
						<div class="card">
							<img class="card-img-top" src="images/newupdate02.jpg" alt="Card image cap">
							<div class="card-block">
								<h4 class="card-title">Ingredients For Cooking Pasta</h4>
								<p class="card-text">
									10 June 2016
									<span class="customer">by Peter Parker</span>
								</p>
								<p class="card-text">Curabitur quas nets lacusets nulat iaculis loremis etis nisle varius vitae seditum fugiatum ligul aliquam qui sequi nets lacusets nulat</p>
								<div class="like float-right">10 <span class="like">Likes</span></div>
								<a href="#" class="rm">Read More</a>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div> <!-- blockNewUpdates -->
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
	
	<script src="<?= base_url() ?>vendor/js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/bootstrap.bundle.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/isotope.pkgd.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/imagesloaded.pkgd.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/myScript.js" type="text/javascript"></script>
</body>
</html>