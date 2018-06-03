<?php
	session_start();
	require_once("conn.php"); 
?>
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>EZShoes | Check Out</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Downy Shoes Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //custom-theme -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/shop.css" type="text/css" media="screen" property="" />
	<link href="css/style7.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Owl-carousel-CSS -->
	<link rel="stylesheet" type="text/css" href="css/checkout.css">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome-icons -->
	<link href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
	<!-- banner -->
	<div class="banner_top innerpage" id="home">
		<div class="wrapper_top_w3layouts">
			<div class="header_agileits">
				<div class="logo inner_page_log">
					<h1><a class="navbar-brand" href="index.html"><span>ez</span> <i>ShoesJKT</i></a></h1>
				</div>
				<div class="overlay overlay-contentpush">
					<button type="button" class="overlay-close"><i class="fa fa-times" aria-hidden="true"></i></button>

					<nav>
						<ul>
							<li><a href="index1.html" class="active">Home</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="shop.html">Shop Now</a></li>
							<li><a href="testimoni.html">Testimoni</a></li>
						</ul>
					</nav>
				</div>
				<div class="mobile-nav-button">
					<button id="trigger-overlay" type="button"><i class="fa fa-bars" aria-hidden="true"></i></button>
				</div>
				<!-- cart details -->
				<div class="top_nav_right">
					<div class="shoecart shoecart2 cart cart box_1">
						<!--<li><a href="checkout.php">Checkout</a></li>-->
						<li><a href="logout.php">Logout</a></li>
					</div>
				</div>
			</div>
		</div>
		<!-- //cart details -->
		<!-- search -->
		<!--<div class="search_w3ls_agileinfo">
			<div class="cd-main-header">
				<ul class="cd-header-buttons">
					<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
				</ul>
			</div>
			<div id="cd-search" class="cd-search">
				<form action="#" method="post">
					<input name="Search" type="search" placeholder="Click enter after typing...">
				</form>
			</div>
		</div>
		<! //search -->
		<div class="clearfix"></div>
		<!-- /banner_inner -->
		<div class="services-breadcrumb_w3ls_agileinfo">
			<div class="inner_breadcrumb_agileits_w3">

				<ul class="short">
					<li><a href="index1.html">Home</a><i>|</i></li>
					<li>Check Out</li>
				</ul>
			</div>
		</div>
		<!-- //banner_inner -->
	</div>

	<!-- //banner -->
	<!-- top Products -->
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<div class="privacy about">
				<h3>Chec<span>kout</span></h3>

				<div class="checkout-right">
					<table class="table table-dark">
							<tr>
								<th><center>Kode Produk</center></th>
								<th><center>Nama Produk</center></th>
								<th><center>Quantity</center></th>
								<th><center>Harga</center></th>
								<th><center>Actions</center></th>
							</tr>
							<?php               
    						$total = 0;
    						if (isset($_SESSION['items'])) {
        						foreach ($_SESSION['items'] as $key => $qty) {
            						$query = mysqli_query($koneksi, "select barang.kode_brg, barang.nama_brg, barang.harga from barang where barang.kode_brg = '$key'");
            						$data = mysqli_fetch_array($query);

            						$jumlah_harga = $data["harga"] * $qty;
            						$total += $jumlah_harga;
            				?>
                			<tr>
                			<td><center><?php echo $data["kode_brg"]; ?></center></td>
                			<td><center><?php echo $data["nama_brg"]; ?></center></td>
                			<td><center><?php echo number_format($qty); ?></center></td>
                			<td><center><?php echo number_format($jumlah_harga); ?></center></td>
                			<td><center><a href="cart.php?act=plus&amp;kode_brg=<?php echo $key; ?>&amp;ref=checkout.php?kd=<?php echo $data['kode_brg'];?>" class="btn btn-xs btn-success">Tambah</a> <a href="cart.php?act=min&amp;kode_brg=<?php echo $key; ?>&amp;ref=checkout.php?kd=<?php echo $data['kode_brg'];?>" class="btn btn-xs btn-warning">Kurang</a> <a href="cart.php?act=del&amp;kode_brg=<?php echo $key; ?>&amp;ref=checkout.php?kd=<?php echo $data['kode_brg'];?>" class="btn btn-xs btn-danger">Hapus</a></center></td>
                			</tr>
                
							<?php			
								}
							}?>
                        <?php
						if($total == 0){
							echo '<td colspan="3" align="center">Cart Empty!</td>';
						} else {
							echo'<td colspan="3" align="right"><b>Total : Rp. '.number_format($total,2,",",".").' </b></td>';
						}
						?>
						<a href="shop.php" class="btn">&laquo; Continue Shopping</a>
						<a href="detailcheckout.php" class="btn"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> Proceed to checkout &raquo;</a>
                	</table> 
            	</div>
            
      			<div class="row">
            	<div class="col-sm-6">
                <?php                  
				$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE kode_brg = '$_GET[kd]'");
				$data  = mysqli_fetch_array($query);
				?>
        		<div class="span4">
          			<div class="icons-box">
                    <div class="hero-unit" style="margin-left: 20px;">
                    <table>
                    <tr>
                        <td rowspan="7"><img src="<?php echo $data["gambar"]; ?>" /></td>
                        </tr>
                        <tr>
                        <td colspan="4"><div class="title"><h3><?php echo $data["nama_brg"]; ?></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td size="200"><h3>Harga</h3></td>
                        <td><h3>:</h3></td>
						<td><div><h3>Rp.<?php echo number_format($data["harga"],2,",",".");?></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
						<td><div class="clear"> <a href="cart.php?act=add&amp;kode_brg=<?php echo $data['kode_brg']; ?>&amp;ref=checkout.php?kd=<?php echo $data['kode_brg'];?>" class="btn btn-lg btn-danger">Beli &raquo;</a></div></td>
                        </tr>
                    </table>
				</div>

					<div class="clearfix"> </div>


					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!-- //top products -->
		<div class="mid_slider_w3lsagile">
			<div class="col-md-3 mid_slider_text">
				<h5>Some More Shoes</h5>
			</div>
			<div class="col-md-9 mid_slider_info">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class=""></li>
						<li data-target="#myCarousel" data-slide-to="1" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="2" class=""></li>
						<li data-target="#myCarousel" data-slide-to="3" class=""></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="item">
							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g1.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g2.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g3.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g4.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
							</div>
						</div>
						<div class="item active">
							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g5.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g6.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g2.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g1.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g1.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g2.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g3.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g4.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g1.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g2.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g3.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g4.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
							</div>
						</div>
					</div>
					<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="fa fa-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="fa fa-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
					<!-- The Modal -->

				</div>
			</div>

			<div class="clearfix"> </div>
		</div>
		<!-- /newsletter-->
		

			<div class="clearfix"></div>
		</div>
		<!-- //newsletter-->
		<!-- footer -->
		<div class="footer_agileinfo_w3">
			<div class="footer_inner_info_w3ls_agileits">
				<div class="col-md-3 footer-left">
					<h2><a href="index.html"><span>EZ</span>ShoesJKT </a></h2>
					<p>The best online sneakers store</p>
					<ul class="social-nav model-3d-0 footer-social social two">
						<li>
							<a href="http://facebook.com/" class="facebook">
								<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
								<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
							</a>
						</li>
						<li>
							<a href="http://twitter.com/" class="twitter">
								<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
								<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
							</a>
						</li>
						<li>
							<a href="http://instagram.com/" class="instagram">
								<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
								<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
							</a>
						</li>
						<li>
							<a href="http://pinterest.com/" class="pinterest">
								<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
								<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
							</a>
						</li>
					</ul>
				</div>
				<div class="col-md-9 footer-right">
					<div class="sign-grds">
						<div class="col-md-4 sign-gd">
							<h4>Our <span>Information</span> </h4>
							<ul>
								<li><a href="index1.html">Home</a></li>
								<li><a href="about.html">About</a></li>
								<li><a href="testimoni.html">Testimoni</a></li>
							</ul>
						</div>

						<div class="col-md-5 sign-gd-two">
							<h4>Store <span>Information</span></h4>
							<div class="address">
								<div class="address-grid">
									<div class="address-left">
										<i class="fa fa-phone" aria-hidden="true"></i>
									</div>
									<div class="address-right">
										<h6>Phone Number</h6>
										<p>+62 812 6110 5834</p>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="address-grid">
									<div class="address-left">
										<i class="fa fa-envelope" aria-hidden="true"></i>
									</div>
									<div class="address-right">
										<h6>Email Address</h6>
										<p>Email :<a href="mailto:ezshoesjkt.cs@gmail.com"> ezshoesjkt.cs@gmail.com</a></p>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="address-grid">
									<div class="address-left">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
									</div>
									<div class="address-right">
										<h6>Location</h6>
										<p>Duta Bandara Permai
									</p>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
						
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>

				<p class="copy-right-w3ls-agileits">&copy 2018 EZShoesJKT. All rights reserved | Design by <a href="http://w3layouts.com/">W3Layouts</a></p>
			</div>
		</div>
	</div>
	<!-- //footer -->
    <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- //js -->
	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		shoe.render();

		shoe.cart.on('shoe_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
		});
	</script>
	<!-- //cart-js -->
	<!-- /nav -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="js/classie.js"></script>
	<script src="js/demo1.js"></script>
	<!-- //nav -->
	<!--search-bar-->
	<script src="js/search.js"></script>
	<!--//search-bar-->
	<!--quantity-->
	<script>
		$('.value-plus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) + 1;
			divUpd.text(newVal);
		});

		$('.value-minus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) - 1;
			if (newVal >= 1) divUpd.text(newVal);
		});
	</script>
	<!--quantity-->
	<script>
		$(document).ready(function (c) {
			$('.close1').on('click', function (c) {
				$('.rem1').fadeOut('slow', function (c) {
					$('.rem1').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close2').on('click', function (c) {
				$('.rem2').fadeOut('slow', function (c) {
					$('.rem2').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close3').on('click', function (c) {
				$('.rem3').fadeOut('slow', function (c) {
					$('.rem3').remove();
				});
			});
		});
	</script>

	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smoth-scrolling -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>


</body>

</html>