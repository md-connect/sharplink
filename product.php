<?php session_start();
include("includes/dbconfig.php");

//code for Cart
if (!empty($_GET["action"])) {
	/* $exist = false;
	if (isset($_SESSION["cart_item"])){
		foreach ($_SESSION["cart_item"] as $k => $v) {
			if ($_GET["pid"] == $v['code']) {
				$exist = true;
			}
		}
	} */
	switch ($_GET["action"]) {
			//code for adding product in cart
		case "add":
			//if($exist == false){
			if (!empty($_POST["quantity"])) {
				$pid = $_GET["pid"];
				$result = mysqli_query($conn, "SELECT * FROM products WHERE pd_id='$pid'");
				while ($productByCode = mysqli_fetch_array($result)) {
					$itemArray = array($productByCode["pd_id"] => array('name' => $productByCode["pd_name"], 'code' => $productByCode["pd_id"], 'quantity' => $_POST["quantity"], 'price' => $productByCode["price"], 'image' => $productByCode["picture"]));
					if (!empty($_SESSION["cart_item"])) {
						if (in_array($productByCode["pd_id"], array_keys($_SESSION["cart_item"]))) {
							foreach ($_SESSION["cart_item"] as $k => $v) {
								if ($productByCode["pd_id"] == $k) {
									if (empty($_SESSION["cart_item"][$k]["quantity"])) {
										$_SESSION["cart_item"][$k]["quantity"] = 0;
									}
									$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
								}
							}
						} else {
							$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
						}
					} else {
						$_SESSION["cart_item"] = $itemArray;
					}
				}
			}
			//}
			break;

			// code for removing product from cart
		case "remove":
			if (!empty($_SESSION["cart_item"])) {
				foreach ($_SESSION["cart_item"] as $k => $v) {
					if ($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if (empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
				}
			}
			break;
			// code for if cart is empty
		case "empty":
			unset($_SESSION["cart_item"]);
			break;
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Products</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body class="animsition">

	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Free shipping for orders around Okokomaiko Axis
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							My Account
						</a>

						<!-- <a href="#" class="flex-c-m trans-04 p-lr-25">
							EN
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							USD
						</a> -->
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="#" class="logo">
						<img src="images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php">Home</a>

							</li>

							<li class="active-menu">
								<a href="product.php">Shop</a>
							</li>

							<li class="label1" data-label1="hot">
								<a href="shoping-cart.php">Features</a>
							</li>

							<!-- 	<li>
								<a href="blog.html">Blog</a>
							</li>
								 -->
							<li>
								<a href="about.php">About</a>
							</li>

							<li>
								<a href="contact.php">Contact</a>
							</li>

						</ul>
					</div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?php
																																	if (isset($_SESSION['cart_item'])) {
																																		echo count($_SESSION['cart_item']);
																																	} else {
																																		echo "0";
																																	} ?>">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>

						<!-- <a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a> -->
						<li>
							<a href="login.php">Login | Sign Up</a>
						</li>
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="index.php"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?php
																															if (isset($_SESSION['cart_item'])) {
																																echo count($_SESSION['cart_item']);
																															} else {
																																echo "0";
																															} ?>">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<!-- 	<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a> -->
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free shipping for standard order around Okokomaiko Axis
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>

						<!-- <a href="#" class="flex-c-m p-lr-10 trans-04">
							EN
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							USD
						</a> -->
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.php">Home</a>

				</li>

				<li>
					<a href="product.php">Shop</a>
				</li>

				<li>
					<a href="shoping-cart.php" class="label1 rs1" data-label1="hot">Features</a>
				</li>

				<!-- <li>
					<a href="blog.html">Blog</a>
				</li> -->

				<li>
					<a href="about.php">About</a>
				</li>

				<li>
					<a href="contact.php">Contact Us</a>
				</li>
				<li>
					<a href="contact.php">Login | Sign Up</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<?php
	if (isset($_SESSION["cart_item"])) {
		$total_quantity = 0;
		$total_price = 0;
	?>
		<!-- Cart -->
		<div class="wrap-header-cart js-panel-cart">
			<div class="s-full js-hide-cart"></div>

			<div class="header-cart flex-col-l p-l-65 p-r-25">
				<div class="header-cart-title flex-w flex-sb-m p-b-8">
					<span class="mtext-103 cl2">
						Your Cart
					</span>

					<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
						<i class="zmdi zmdi-close"></i>
					</div>
				</div>
				<div class="header-cart-content flex-w js-pscroll">
					<ul class="header-cart-wrapitem w-full">
						<?php
						foreach ($_SESSION["cart_item"] as $item) {
							$item_price = $item["quantity"] * $item["price"];
						?>
							<li class="header-cart-item flex-w flex-t m-b-12">
								<div class="header-cart-item-img">
									<img src="./images/<?php echo $item["image"]; ?>" alt="IMG">
								</div>

								<div class="header-cart-item-txt p-t-8">
									<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
										<?php echo $item["name"]; ?>
									</a>

									<span class="header-cart-item-info">
										<?php echo $item["quantity"] . "x N " . $item["price"]; ?>
									</span>
								</div>
							</li>

						<?php
							$total_quantity += $item["quantity"];
							$total_price += ($item["price"] * $item["quantity"]);
						}
						?>
					</ul>

					<div class="w-full">
						<div class="header-cart-total w-full p-tb-40">
							Total: <?php echo "N " . number_format($total_price, 2); ?>
						</div>

						<div class="header-cart-buttons flex-w w-full">
							<a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
								View Cart
							</a>

							<a href="initialize.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
								Check Out
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	} else {
	?>
		<div class="wrap-header-cart js-panel-cart">
			<div class="s-full js-hide-cart"></div>
			<div class="header-cart flex-col-l p-l-65 p-r-25">
				<div class="header-cart-title flex-w flex-sb-m p-b-8">
					<span class="mtext-103 cl2">
						Your Cart
					</span>

					<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
						<i class="zmdi zmdi-close"></i>
					</div>
				</div>

				<div class="no-records">Your Cart is Empty</div>
				<div class="header-cart-buttons flex-w w-full">
					<a href="product.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
						Shop Now
					</a>

					<!-- <a href="initialize.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a> -->
				</div>
			</div>
		</div>

	<?php
	}
	?>

	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
						Women
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
						Men
					</button>
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".senator">
						Senator Materials
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".native">
						Natives
					</button>
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".suit">
						Suits
					</button>


				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>

				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Default
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Popularity
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Average rating
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Newness
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$0.00 - $50.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$50.00 - $100.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$100.00 - $150.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$150.00 - $200.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$200.00+
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							<ul>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Black
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Blue
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Grey
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Green
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Red
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										White
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Tags
							</div>

							<div class="flex-w p-t-4 m-r--5">
								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Fashion
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Lifestyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Denim
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Streetstyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Crafts
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Pagination -->
			<?php

			if (isset($_GET['pageno'])) {
				$pageno = $_GET['pageno'];
			} else {
				$pageno = 1;
			}
			$no_of_records_per_page = 16;
			$offset = ($pageno - 1) * $no_of_records_per_page;


			$total_pages_sql = "SELECT COUNT(*) FROM products";
			$result = mysqli_query($conn, $total_pages_sql);
			$total_rows = mysqli_fetch_array($result)[0];
			$total_pages = ceil($total_rows / $no_of_records_per_page);

			?>
			<!-- Product grids -->
			<div class="row isotope-grid">
				<?php
				$array_list = array();
				$sql = mysqli_query($conn, "SELECT * FROM products LIMIT $offset, $no_of_records_per_page");
				if (mysqli_num_rows($sql) > 0) {
					$j = 0;
					while ($row = mysqli_fetch_assoc($sql)) {

				?>
						<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $row['pd_category'] . ' ' . $row['pd_type']; ?>">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-pic hov-img0">
									<img src="images/<?php echo $row['picture']; ?>" alt="IMG-PRODUCT" height="240">

									<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" data-mod=<?php echo $j; ?>>
										Quick View
									</a>
								</div>

								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l ">
										<a href="product-detail.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
											<?php echo $row['pd_name']; ?>
										</a>

										<span class="stext-105 cl3">
											N<?php echo $row['price']; ?>
										</span>
									</div>

									<div class="block2-txt-child2 flex-r p-t-3">
										<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
											<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
											<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
										</a>
									</div>
								</div>
							</div>
						</div>

					<?php
						//echo $pd_name;
						$array_list[] = $row;
						$j++;
					}
					?>



				<?php
				} else {
					echo "<h4 style='text-align:center;'>No product available in the store, please check back later.</h4>";
				}
				?>


			</div>

			<!-- Modal1 -->
			<div id="modal_box" class="wrap-modal1 js-modal1 p-t-60 p-b-20">
				<div class="overlay-modal1 js-hide-modal1"></div>

				<div class="container">
					<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
						<button class="how-pos3 hov3 trans-04 js-hide-modal1">
							<img src="images/icons/icon-close.png" alt="CLOSE">
						</button>

						<div class="row">
							<div class="col-md-6 col-lg-7 p-b-30">
								<div class="p-l-25 p-r-30 p-lr-0-lg">
									<div class="wrap-slick3 flex-sb flex-w">
										<div class="wrap-slick3-dots"></div>
										<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

										<div id="sidesImg" class="slick3 gallery-lb">
											<div id='si_img_1' class="item-slick3" data-thumb="">
												<div class="wrap-pic-w pos-relative">
													<img id='si1_1' src="" alt="IMG-PRODUCT">

													<a id='si1_2' class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="">
														<i class="fa fa-expand"></i>
													</a>
												</div>
											</div>

											<div id='si_img_2' class="item-slick3" data-thumb="">
												<div class="wrap-pic-w pos-relative">
													<img id='si2_1' src="" alt="IMG-PRODUCT">

													<a id='si2_2' class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="">
														<i class="fa fa-expand"></i>
													</a>
												</div>
											</div>

											<div id='si_img_3' class="item-slick3" data-thumb="">
												<div class="wrap-pic-w pos-relative">
													<img id='si3_1' src="" alt="IMG-PRODUCT">

													<a id='si3_2' class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="">
														<i class="fa fa-expand"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id='modal_info_panel' class="col-md-6 col-lg-5 p-b-30">
								<div class="p-r-50 p-t-5 p-lr-0-lg">
									<h4 id="m_title" class="mtext-105 cl2 js-name-detail p-b-14"></h4>

									<span id="m_price" class="mtext-106 cl2"></span>

									<p id="m_desc" class="stext-102 cl3 p-t-23"></p>

									<!--  -->
									<form method="post" id="cart_form" action="">

										<div class="p-t-33">
											<!-- <div class="flex-w flex-r-m p-b-10">
											<div class="size-203 flex-c-m respon6">
												Size
											</div>

											<div class="size-204 respon6-next">
												<div class="rs1-select2 bor8 bg0">
													<select class="js-select2" name="time">
														<option>Choose an option</option>
														<option>Size S</option>
														<option>Size M</option>
														<option>Size L</option>
														<option>Size XL</option>
													</select>
													<div class="dropDownSelect2"></div>
												</div>
											</div>
										</div> -->

											<!-- <div class="flex-w flex-r-m p-b-10">
											<div class="size-203 flex-c-m respon6">
												Color
											</div>

											<div class="size-204 respon6-next">
												<div class="rs1-select2 bor8 bg0">
													<select class="js-select2" name="time">
														<option>Choose an option</option>
														<option>Red</option>
														<option>Blue</option>
														<option>White</option>
														<option>Grey</option>
													</select>
													<div class="dropDownSelect2"></div>
												</div>
											</div>
										</div> -->

											<div class="flex-w flex-r-m p-b-10">
												<div class="size-204 flex-w flex-m respon6-next">
													<div class="size-203 flex-c-m respon6">
														Quantity:
													</div>
													<div class="wrap-num-product flex-w m-r-20 m-tb-10">
														<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
															<i class="fs-16 zmdi zmdi-minus"></i>
														</div>
														<input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="1">

														<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
															<i class="fs-16 zmdi zmdi-plus"></i>
														</div>
													</div>

													<button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
														Add to cart
													</button>
									</form>
								</div>
							</div>
						</div>
						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>

		<!-- Load more -->
		<div class="flex-c-m flex-w w-full p-t-45">
			<!-- introduction of pagination -->
			<ul class="pagination">
				<li><a href="?pageno=1" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">First</a></li>
				<li class="<?php if ($pageno <= 1) {
								echo 'disabled';
							} ?>">
					<a href="<?php if ($pageno <= 1) {
									echo '#';
								} else {
									echo "?pageno=" . ($pageno - 1);
								} ?>" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">Prev</a>
				</li>
				<li class="<?php if ($pageno >= $total_pages) {
								echo 'disabled';
							} ?>">
					<a href="<?php if ($pageno >= $total_pages) {
									echo '#';
								} else {
									echo "?pageno=" . ($pageno + 1);
								} ?>" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">Next</a>
				</li>
				<li><a href="?pageno=<?php echo $total_pages; ?>" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">Last</a></li>
			</ul>

			<!-- End of pagination  -->
			<!-- 			<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a> -->
		</div>
		</div>
	</section>


	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categories
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Women
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Men
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shoes
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Watches
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Help
					</h4>
					`
					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Track Order
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Returns
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shipping
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions? Let us know in office at 2, Taskforce Road, PPL, Okokomaiko, Lagos. or call us
						on 08156655541
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-whatsapp"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a class="m-all-1">
						<img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a class="m-all-1">
						<img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a class="m-all-1">
						<img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a class="m-all-1">
						<img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a class="m-all-1">
						<img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;
					<script>
						document.write(new Date().getFullYear());
					</script> All rights reserved | Developer
					07082614612, 08068869769</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
	<!-- ============================================================== -->



	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		let cont = <?php echo json_encode($array_list); ?>;
		console.log(cont);
		$('.js-show-modal1').click(function(e) {
			e.preventDefault();
			//get index
			var ind = $(this).attr('data-mod');
			//populate modal with contents from cont array
			//add thumbnail for sidebar
			$('.slick3-dots li:nth-child(1) img').attr('src', './images/' + cont[ind]['picture']);
			//add side images 1
			$('#si1_1').attr('src', './images/' + cont[ind]['picture']);
			$('#si1_2').attr('href', './images/' + cont[ind]['picture']);

			//add side image 2
			if (cont[ind]['picture2'] == '') {
				//add default image 1
				$('#si2_1').attr('src', './images/' + cont[ind]['picture']);
				$('#si2_2').attr('href', './images/' + cont[ind]['picture']);
				//add thumbnail for sidebar
				$('.slick3-dots li:nth-child(2) img').attr('src', './images/' + cont[ind]['picture']);
			} else {
				//add its image
				$('#si2_1').attr('src', './images/' + cont[ind]['picture2']);
				$('#si2_2').attr('href', './images/' + cont[ind]['picture2']);
				//add thumbnail for sidebar
				$('.slick3-dots li:nth-child(2) img').attr('src', './images/' + cont[ind]['picture2']);
			}
			//add side image 2
			if (cont[ind]['picture3'] == '') {
				//add default image 1
				$('#si3_1').attr('src', './images/' + cont[ind]['picture']);
				$('#si3_2').attr('href', './images/' + cont[ind]['picture']);
				//add thumbnail for sidebar
				$('.slick3-dots li:nth-child(3) img').attr('src', './images/' + cont[ind]['picture']);
			} else {
				//add its image
				$('#si3_1').attr('src', './images/' + cont[ind]['picture3']);
				$('#si3_2').attr('href', './images/' + cont[ind]['picture3']);
				//add thumbnail for sidebar
				$('.slick3-dots li:nth-child(3) img').attr('src', './images/' + cont[ind]['picture3']);
			}

			//add informations about the item
			$('#m_title').html(cont[ind]['pd_name']);
			$('#m_price').html('N' + cont[ind]['price']);
			$('#m_desc').html(cont[ind]['description']);
			$('#cart_form').attr('action', 'product.php?action=add&pid=' + cont[ind]['pd_id']);

		});
	</script>
	<script>
		$(document).ready(function() {
			$('#viewdetails').click(function(e) {
				e.preventDefault();

				alert(1);
			})
		})
	</script>

	<script>
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e) {
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function() {
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function() {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function() {
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!-- <script>
		$(document).ready(function() {
			function products() {
				$.ajax({
					url: 'includes/products.php',
					method: 'POST',
					data: {
						products: 1
					},
					success: function(data) {
						$('#allproducts').html(data);
					}
				})
			}
			products();

			$('body').delegate('.js-show-modal1', 'click', function(e) {
				e.preventDefault();
				$('.js-modal1').addClass('show-modal1');
			})

			$('body').delegate('.js-show-modal1', 'click', function(e) {
				e.preventDefault();
				var pid = $(this).attr('pid');
				alert(pid);
				$.ajax({
					url: 'includes/products.php',
					method: 'POST',
					data: {
						productdetails: 1,
						pid: pid
					},
					success: function(data) {
						$('#allproducts').html(data);
					}
				})

			})

			/* $('.js-hide-modal1').on('click', function() {
				$('.js-modal1').removeClass('show-modal1')
			}) */
		});
	</script> -->

</body>

</html>