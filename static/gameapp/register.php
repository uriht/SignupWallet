<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);


if(isset($btn))
{
$rdate=date("d-m-Y");

$mq=mysqli_query($connect,"select max(id) from game_register");
$mr=mysqli_fetch_array($mq);
$id=$mr['max(id)']+1;


$ins=mysqli_query($connect,"insert into game_register(id,name,mobile,email,address,district,pincode,bank,customername,account,card,gnumber,uname,pass,rdate) values($id,'$name','$mobile','$email','$address','$district','$pincode','$bank','$customername','$account','$card','$gnumber','$uname','$pass','$rdate')");
	if($ins)
	{
	?>
	<script language="javascript">
	alert("Registered Successfully");
	window.location.href="login.php";
	</script>
	<?php
	}
	else
	{
	?>
	<script language="javascript">
	alert("Already Exist!");
	</script>
	<?php
	}
}



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
<script language="javascript">
function validate()
{
	if(document.form1.name.value=="")
	{
	alert("Enter the Name");
	document.form1.name.focus();
	return false;
	}
	if(document.form1.address.value=="")
	{
	alert("Enter the Address");
	document.form1.address.focus();
	return false;
	}
	if(document.form1.mobile.value=="")
	{
	alert("Enter the Mobile No.");
	document.form1.mobile.focus();
	return false;
	}
	if(isNaN(document.form1.mobile.value))
	{
	alert("Invalid Mobile No.");
	document.form1.mobile.select();
	return false;
	}
	if(document.form1.mobile.value.length!=10)
	{
	alert("Mobile No. must be 10 digits!");
	document.form1.mobile.select();
	return false;
	}
	if(document.form1.email.value=="")
	{
	alert("Enter the Email");
	document.form1.email.focus();
	return false;
	}
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.form1.email.value))  
	{
	
	}
	else
	{
	alert("Invalid E-mail!");
	document.form1.email.select();
	return false;
	}
	if(document.form1.uname.value=="")
	{
	alert("Enter the Username");
	document.form1.uname.focus();
	return false;
	}
	if(document.form1.pass.value=="")
	{
	alert("Enter the Password");
	document.form1.pass.focus();
	return false;
	}
	
return true;
}
</script>
</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

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
					<input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>">
					<input type="text" name="mobile" placeholder="Mobile No." value="<?php echo $mobile; ?>">
					<input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>">
					<input type="text" name="address" placeholder="Address" value="<?php echo $address; ?>">
					<input type="text" name="district" placeholder="District" value="<?php echo $district; ?>">
					<input type="text" name="pincode" placeholder="Pincode" value="<?php echo $pincode; ?>">
					<input type="text" name="bank" placeholder="Bank" value="<?php echo $bank; ?>">
					<input type="text" name="customername" placeholder="Bank Customer Name" value="<?php echo $customername; ?>">
					<input type="text" name="account" placeholder="Account No." value="<?php echo $account; ?>">
					<input type="text" name="card" placeholder="Debit Card No." value="<?php echo $card; ?>">
					<input type="text" name="gnumber" placeholder="G-Pay Number" value="<?php echo $gnumber; ?>">
					
						<input type="text" name="uname" placeholder="Username" value="<?php echo $uname; ?>">
						<input type="password" name="pass" placeholder="Password" value="<?php echo $pass; ?>">
						<button type="submit" name="btn" class="site-btn" onClick="return validate()">Sign Up<img src="img/icons/double-arrow.png" alt="#"/></button>
					</form>
					
					<br>
					<a href="check_up.php?qd=name,mobile,email,address,district,pincode,bank,customername,account,card,gnumber">Sign Up Wallet</a> 
					
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
