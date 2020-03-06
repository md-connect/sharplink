<?php session_start();
include('./includes/dbconfig.php');
$errors = "";
$input_err = "";
$status = "";

function test_input($data)
{
    include("../includes/dbconfig.php");
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}


$id = $_GET['id'];

//* Measurement uploading scripts */
if (isset($_POST['add-measurement'])) {
    if (empty($_POST["t_len"])) {
        $t_len = "";
        $input_err = "* This field is required";
    } else {
        $t_len = test_input($_POST['t_len']);
    }
    if (empty($_POST["t_waist"])) {
        $t_waist = "";
        $input_err = "* This field is required";
    } else {
        $t_waist = test_input($_POST['t_waist']);
    }


    if (empty($_POST["t_flap"])) {
        $t_flap = "";
        $input_err = "* This field is required";
    } else {
        $t_flap = test_input($_POST['t_flap']);
    }

    if (empty($_POST["t_lap"])) {
        $t_lap = "";
        $input_err = "* This field is required";
    } else {
        $t_lap = test_input($_POST["t_lap"]);
    }

    if (empty($_POST["t_hip"])) {
        $t_hip = "";
        $input_err = "* This field is required";
    } else {
        $t_hip = test_input($_POST['t_hip']);
    }

    if (empty($_POST["t_knee"])) {
        $t_knee = "";
        $input_err = "* This field is required";
    } else {
        $t_knee = test_input($_POST['t_knee']);
    }
    if (empty($_POST["t_feet"])) {
        $t_feet = "";
        $input_err = "* This field is required";
    } else {
        $t_feet = test_input($_POST['t_feet']);
    }
    if (empty($_POST["s_glen"])) {
        $s_glen = "";
        $input_err = "* This field is required";
    } else {
        $s_glen = test_input($_POST['s_glen']);
    }
    if (empty($_POST["s_len"])) {
        $s_len = "";
        $input_err = "* This field is required";
    } else {
        $s_len = test_input($_POST['s_len']);
    }


    if (empty($_POST["s_chest"])) {
        $s_chest = "";
        $input_err = "* This field is required";
    } else {
        $s_chest = test_input($_POST['s_chest']);
    }

    if (empty($_POST["s_stomach"])) {
        $s_stomach = "";
        $input_err = "* This field is required";
    } else {
        $s_stomach = test_input($_POST["s_stomach"]);
    }

    if (empty($_POST["s_shoulder"])) {
        $s_shoulder = "";
        $input_err = "* This field is required";
    } else {
        $s_shoulder = test_input($_POST['s_shoulder']);
    }

    if (empty($_POST["s_neck"])) {
        $s_neck = "";
        $input_err = "* This field is required";
    } else {
        $s_neck = test_input($_POST['s_neck']);
    }
    if (empty($_POST["s_arm"])) {
        $s_arm = "";
        $input_err = "* This field is required";
    } else {
        $s_arm = test_input($_POST['s_arm']);
    }
    if (empty($_POST["s_wrist"])) {
        $s_wrist = "";
        $input_err = "* This field is required";
    } else {
        $s_wrist = test_input($_POST['s_wrist']);
    }

    if (empty($_POST["s_sleeve"])) {
        $s_sleeve = "";
        $input_err = "* This field is required";
    } else {
        $s_sleeve = test_input($_POST['s_sleeve']);
    }
    if (empty($_POST["s_rsleeve"])) {
        $s_rsleeve = "";
        $input_err = "* This field is required";
    } else {
        $s_rsleeve = test_input($_POST['s_rsleeve']);
    }

    if ($input_err == "") {
        $insert = mysqli_query($conn, "UPDATE customers SET (t_len='$t_len', t_waist='$t_waist', t_flap='$t_flap', t_lap='$t_lap', t_hip='$t_hip', t_knee='$t_knee', t_feet='$t_feet', s_glen='$s_glen', s_len='$s_len', s_chest='$s_chest', s_stomach='$s_stomach', s_shoulder='$s_shoulder', s_neck='$s_neck', s_arm='$s_arm', s_wrist='$s_wrist', s_sleeve='$s_sleeve', s_rsleeve='$s_rsleeve') WHERE cus_id='$pd_id'");
        if ($insert) {
            $status .= '<div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Measurement was uploaded successfully!</strong>
                        </div>';
        } else {
            $status .= '<div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Unable upload measurement into the database currently, please try again later.</strong>
                        </div>';
        }
    } else {
        $status .= '<div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Some important field(s) are empty.</strong>
                    </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shopping Cart</title>
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
                        Free shipping for standard order around Okokomaiko Axis
                    </div>

                    <div class="right-top-bar flex-w h-full">
                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            Help & FAQs
                        </a>

                        <?php if (isset($_SESSION['username'])) {
                            $customer = $_SESSION['username'];
                            echo "<a href='account.php' class='flex-c-m p-lr-10 trans-04'>
                            $customer
                        </a>";
                        } else {
                            echo "<a href='login.php' class='flex-c-m p-lr-10 trans-04'>
                            My Account
                        </a>";
                        } ?>

                        <!-- <a href="#" class="flex-c-m trans-04 p-lr-25">
							EN
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							USD
						</a> -->
                    </div>
                </div>
            </div>

            <div class="wrap-menu-desktop">
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

                            <li>
                                <a href="product.php">Shop</a>
                            </li>

                            <li class="label1 active-menu" data-label1="hot">
                                <a href="shoping-cart.php">Features</a>
                            </li>

                            <li>
                                <a href="about.php">About Us</a>
                            </li>

                            <li>
                                <a href="contact.php">Contact Us</a>
                            </li </ul> </div> <!-- Icon header -->
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

                                <ul>
                                    <li>
                                        <?php
                                        if (isset($_SESSION['username'])) {
                                            $id = $_SESSION['cus_id'];
                                        ?>
                                            <div class="dropdown">
                                                <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="zmdi zmdi-account-o" style="color: green;"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="account.php">My Account</a>
                                                    <a class="dropdown-item" href="account.php">My Orders</a>
                                                    <a class="dropdown-item" href="change-password.php?id=<?php echo $id; ?>">Change Password</a>
                                                    <a class="dropdown-item" href="logout.php">Log Out</a>
                                                </div>
                                            </div>

                                        <?php
                                        } else {
                                        ?>
                                            <div class="dropdown">
                                                <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="zmdi zmdi-account-o" style="color: orange;"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="login.php">Sign in</a>
                                                    <a class="dropdown-item" href="login.php">Sign Up</a>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </li>
                                </ul>
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

                <ul>
                    <li>
                        <?php
                        if (isset($_SESSION['username'])) {
                            $id = $_SESSION['cus_id'];
                        ?>
                            <div class="dropdown">
                                <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="zmdi zmdi-account-o" style="color: green;"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="account.php">My Account</a>
                                    <a class="dropdown-item" href="account.php">My Orders</a>
                                    <a class="dropdown-item" href="change-password.php?id=<?php echo $id; ?>">Change Password</a>
                                    <a class="dropdown-item" href="logout.php">Log Out</a>
                                </div>
                            </div>

                        <?php
                        } else {
                        ?>
                            <div class="dropdown">
                                <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="zmdi zmdi-account-o" style="color: orange;"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="login.php">Sign in</a>
                                    <a class="dropdown-item" href="login.php">Sign Up</a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </li>
                </ul>
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

                    <div class="right-top-bar flex-w h-full">
                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            Help & FAQs
                        </a>

                        <?php if (isset($_SESSION['username'])) {
                            $customer = $_SESSION['username'];
                            echo "<a href='account.php' class='flex-c-m p-lr-10 trans-04'>
                            $customer
                        </a>";
                        } else {
                            echo "<a href='login.php' class='flex-c-m p-lr-10 trans-04'>
                            My Account
                        </a>";
                        } ?>
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

                <li class="label1 active-menu data-label1=" hot">
                    <a href="shoping-cart.php">Features</a>
                </li>

                <li>
                    <a href="about.php">About Us</a>
                </li>

                <li>
                    <a href="contact.php">Contact Us</a>
                </li>

                <!-- <li>
					<a href="login.php">Login | Sign Up</a>
				</li> -->
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

                            <?php
                            $items = "";
                            $qty = 0;
                            $num_item = ($_SESSION["cart_item"]);
                            // die();
                            foreach ($_SESSION["cart_item"] as $item) {
                                if (count($num_item) == 1) {
                                    $items = $item["code"];
                                    $qty += $item["quantity"];
                                } else {
                                    $items .= '+' . $item["code"];
                                    $qty += $item["quantity"];
                                }
                            }

                            ?>
                            <form method="POST" action="initialize.php">
                                <div class="flex-w flex-m m-r-20 m-tb-5">
                                    <input hidden class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="cus_email" placeholder="Customer's Email" value="<?php echo $cus_email; ?>">
                                    <input hidden class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="cus_phone" placeholder="Customer's Phone" value="<?php echo $cus_phone; ?>">
                                    <input hidden class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="items" placeholder="Customer's Items" value="<?php echo $items; ?>">
                                    <input hidden class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="quantity" placeholder="Quantity" value="<?php echo $qty; ?>">
                                    <input hidden class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="amount" placeholder="Amount" value="<?php echo $total_price; ?>">
                                </div>
                                <button name="pay" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10" type="submit">
                                    Check Out
                                </button>
                            </form>
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

                <div class="no-records">
                    <h3 style="text-align: center; padding-bottom: 50px;">Your Cart is Empty</h3>
                </div>
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

    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Design Upload Form
            </span>
        </div>
    </div>
    <!-- End of flyout cart -->
    <!-- Content page -->
    <section class="bg0 p-t-104 p-b-116" style="padding-left: 30%;">
        <div class="container">
            <form method="POST" action="" enctype="multipart/form-data">
                <?php echo $status; ?>
                <div class="flex-w flex-tr">
                    <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            DESIGN UPLOAD
                        </h4>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="pd_name" placeholder="Enter product name">
                        </div>
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="desc" placeholder="Enter Product Description">
                        </div>
                        <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                            <select class="js-select2" name="pd_category">
                                <option>Select a Product Category...</option>
                                <option value="men">Men</option>
                                <option value="women">Women</option>
                                <option value="children">Children</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                            <select class="js-select2" name="pd_type">
                                <option>Select a Product Type...</option>
                                <option value="native">Natives</option>
                                <option value="suit">Suits</option>
                                <option value="senator">Senator Materials</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <label style="padding-left: 10%;" for="input-id" class="">You can select up to 3 images for the same design</label>
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="file" name="images[]" placeholder="Choose images" multiple>
                        </div>


                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="upload-design" type="submit">
                            upload <Measurement></Measurement>
                        </button>
            </form>
        </div>

        <!-- <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    <div class="flex-w w-full p-b-42">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-map-marker"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Address
                            </span>

                            <p class="stext-115 cl6 size-213 p-t-18">
                                Coza Store Center 8th floor, 379 Hudson St, New York, NY 10018 US
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full p-b-42">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-phone-handset"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Lets Talk
                            </span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                +1 800 1236879
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-envelope"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Sale Support
                            </span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                contact@example.com
                            </p>
                        </div>
                    </div>
                </div> -->
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
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <!--===============================================================================================-->
    <script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
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

</body>

</html>