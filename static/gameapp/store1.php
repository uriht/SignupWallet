<?php
include("dbconnect.php");
extract($_REQUEST);
$fp=fopen("query.txt","r");
$qr=fread($fp,filesize("query.txt"));
fclose($fp);

$msg="";


?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>EndGam - Gaming Magazine Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="EndGam Gaming Magazine Template">
	<meta name="keywords" content="endGam,gGaming, magazine, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/animate.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<!--<div id="preloder">
		<div class="loader"></div>
	</div>-->

	<!-- Header section -->
	<header class="header-section">
		<div class="header-warp">
			<div class="header-social d-flex justify-content-end">
				<p>Follow us:</p>
				<a href="#"><i class="fa fa-pinterest"></i></a>
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-dribbble"></i></a>
				<a href="#"><i class="fa fa-behance"></i></a>
			</div>
			<div class="header-bar-warp d-flex">
				<!-- site logo -->
				<a href="index.html" class="site-logo">
					<img src="./img/logo.png" alt="">
				</a>
				<nav class="top-nav-area w-100">
					<div class="user-panel">
						<a href="login.php">Sign In</a> 
					</div>
					<!-- Menu -->
					<ul class="main-menu primary-menu">
						<li><a href="index.html">Home</a></li>
						<li><a href="games.html">Games</a>
							<ul class="sub-menu">
								<li><a href="game-single.html">Game Singel</a></li>
							</ul>
						</li>
						<li><a href="review.html">Reviews</a></li>
						<li><a href="blog.html">News</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg/4.jpg">
		<div class="page-info">
			<h2>Contact</h2>
			<div class="site-breadcrumb">
				<a href="">Home</a>  /
				<span>Contact</span>
			</div>
		</div>
	</section>
	<!-- Page top end-->


	<!-- Contact page -->
	<section class="contact-page">
		<div class="container">
			
			<div class="row">
				<div class="col-lg-7 order-2 order-lg-1">
				
					<form class="contact-form" name="form1" method="post">
					
				   <?php


$rdate=date("d-m-Y");
$mq=mysqli_query($connect,"select max(id) from game_register");
$mr=mysqli_fetch_array($mq);
$id=$mr['max(id)']+1;
$ins=mysqli_query($connect,"insert into game_register(id,rdate) values($id,'$rdate')");

$q3=mysqli_query($connect,"select * from signup_data where bcode='$bc' && upi_code='$upi' order by id desc");
$r3=mysqli_fetch_array($q3);
$qr2=$r3['url_data'];
//$fp1=fopen("data.txt","r");
//$qr2=@fread($fp1,filesize("data.txt"));
//fclose($fp1);

//$qr2="name=raj|gender=Male";

$v1=explode("|",$qr2);

if($qr!="")
{
$e1=explode(",",$qr);
	foreach($e1 as $e2)
	{
		foreach($v1 as $v2)
		{
		$v3=explode("=",$v2);
			if($e2==$v3[0])
			{
			
			mysqli_query($connect,"update game_register set $e2='$v3[1]' where id=$id");
			}
			if($v3[0]=="uname")
			{
			mysqli_query($connect,"update game_register set uname='$v3[1]' where id=$id");
			}
			if($v3[0]=="pass")
			{
			mysqli_query($connect,"update game_register set pass='$v3[1]' where id=$id");
			}
		
		}
		
	}
}
/////
/*$qr3=explode("|",$qr2);
foreach($qr3 as $qr4)
{
	$qr5=explode("=",$qr4);
	if($qr5[0]=="uname")
	{
	mysqli_query($connect,"update nin_register set uname='$qr5[1]' where id=$id");
	}
	if($qr5[0]=="pass")
	{
	mysqli_query($connect,"update nin_register set pass='$qr5[1]' where id=$id");
	}
}*/
////////
include("email.php");
extract($_REQUEST);
		$objEmail	=	new CI_Email();
		//$objEmail->from("iotcloudadmin@iotcloud.co.in", "Info");
		$objEmail->from("iotcloudadmin@iotcloud.co.in", "Info");
		
		$objEmail->to("$email");
		//$objEmail->cc($txt_cc);
		//$objEmail->bcc($txt_bcc);
		$objEmail->subject("Sign Up - Register Confirmation");
		
		
		$objEmail->message("$mess");
		
	
			/*if(file_exists("report.xls"))
			{
				$objEmail->attach("report.xls");
			}*/
			if ($objEmail->send())
			{	
			//echo 'mail sent successfully';
			}
			else
			{	
			//echo 'failed';
			}

?>

<h2 style="color:#99FF66">Registered Success</h2><br>
<h2 style="color:#99FF66">Username and Password sent to Your Mail...</h2>
					</form>
				</div>
				<div class="col-lg-5 order-1 order-lg-2 contact-text text-white">
					<h3>Howdy! Say hello</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.....</p>
					<div class="cont-info">
						<div class="ci-icon"><img src="img/icons/location.png" alt=""></div>
						<div class="ci-text">Main Str, no 23, New York</div>
					</div>
					<div class="cont-info">
						<div class="ci-icon"><img src="img/icons/phone.png" alt=""></div>
						<div class="ci-text">+546 990221 123</div>
					</div>
					<div class="cont-info">
						<div class="ci-icon"><img src="img/icons/mail.png" alt=""></div>
						<div class="ci-text">hosting@contact.com</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Contact page end-->


	<!-- Newsletter section -->
	<section class="newsletter-section">
		<div class="container">
			<h2>Subscribe to our newsletter</h2>
			<form class="newsletter-form">
				<input type="text" placeholder="ENTER YOUR E-MAIL">
				<button class="site-btn">subscribe <img src="img/icons/double-arrow.png" alt="#"/></button>
			</form>
		</div>
	</section>
	<!-- Newsletter section end -->


	<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			<!--<div class="footer-left-pic">
				<img src="img/footer-left-pic.png" alt="">
			</div>
			<div class="footer-right-pic">
				<img src="img/footer-right-pic.png" alt="">
			</div>-->
			<a href="#" class="footer-logo">
				<img src="./img/logo.png" alt="">
			</a>
			<ul class="main-menu footer-menu">
				<li><a href="">Home</a></li>
				<li><a href="">Games</a></li>
				<li><a href="">Reviews</a></li>
				<li><a href="">News</a></li>
				<li><a href="">Contact</a></li>
			</ul>
			<div class="footer-social d-flex justify-content-center">
				<a href="#"><i class="fa fa-pinterest"></i></a>
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-dribbble"></i></a>
				<a href="#"><i class="fa fa-behance"></i></a>
			</div>
			<div class="copyright"><a href=""></a> Game App</div>
		</div>
	</footer>
	<!-- Footer section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.sticky-sidebar.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
