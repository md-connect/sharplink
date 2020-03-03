<?php session_start();
include("./includes/dbconfig.php");
if (!empty($_GET["action"])) {

    switch ($_GET["action"]) {
            //code for adding product in cart
            // code for removing product from cart
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["code"] == $v['code'])
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
    <title>Customer Account</title>
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

                            <li class="label1" data-label1="hot">
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

                <li class="label1" data-label1="hot">
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

    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Customer Account
            </span>
        </div>
    </div>
    <?php
    $id = $_SESSION['cus_id'];
    $sql = "SELECT * FROM customers WHERE cus_id='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows === 1) {
        $row = mysqli_fetch_array($query);
        // $id = $row['pd_id'];
        $name = $row['name'];
        /* $description = $row['description'];
        $category = $row['pd_category'];
        $type = $row['pd_type']; */
    }
    ?>
    <!-- Customer Orders -->
    <div class="container bg0 p-t-75 p-b-85">
        <div class="row">
            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        My Information
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Name:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl2">
                                <?php echo $_SESSION['cus_name']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Phone:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl2">
                                <?php echo $_SESSION['cus_phone']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Email:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-10 cl2">
                                <?php echo $_SESSION['username']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Address:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-10 cl2">
                                <?php echo $_SESSION['address']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <h6 class="mtext-109 cl2 p-b-30">
                            My Measurement
                        </h6>
                        <?php
                        $sql2 = "SELECT * FROM customers WHERE cus_id = '$id'";
                        $query = $conn->query($sql2);
                        $row = mysqli_fetch_array($query);
                        if (!empty($row['s_len']) && !empty($row['t_len'])) {
                            $t_len = $row['t_len'];
                            $t_waist = $row['t_waist'];
                            $t_flap = $row['t_flap'];
                            $t_lap = $row['t_lap'];
                            $t_hip = $row['t_hip'];
                            $t_knee = $row['t_knee'];
                            $t_feet = $row['t_feet'];
                            $s_glen = $row['s_glen'];
                            $s_len = $row['s_len'];
                            $s_chest = $row['s_chest'];
                            $s_stomach = $row['s_stomach'];
                            $s_shoulder = $row['s_shoulder'];
                            $s_neck = $row['s_neck'];
                            $s_arm = $row['s_arm'];
                            $s_wrist = $row['s_wrist'];
                            $s_sleeve = $row['s_sleeve'];
                            $s_rsleeve = $row['s_rsleeve'];
                            echo "
                                <p class='mtext-109 cl2 p-b-30'>
                                    Trouser Measurement
                                </p>
                                <div class='table-responsive'>
                                    <table class='table'>
                                        <tr class='table_head'>
                                            <th>Length</th>
                                            <th>Waist</th>
                                            <th>Flap</th>
                                            <th>Lap</th>
                                            <th>Hip</th>
                                            <th>Knee</th>
                                            <th>Feet</th>
                                        </tr>
                                        <tr class='table_row'>
                                            <td>$t_len</td>
                                            <td>$t_waist </td>
                                            <td>$t_flap</td>
                                            <td>$t_lap</td>
                                            <td>$t_hip</td>
                                            <td>$t_knee</td>
                                            <td>$t_feet</td>
                                        </tr>
                                    </table>
                                </div>
                                 <p class='mtext-109 cl2 p-b-30'>
                                    Shirt/Cassock Measurement
                                </p>
                                <div class='table-responsive'>
                                    <table class='table'>
                                        <tr class='table_head'>
                                            <th>Gown Length</th>
                                            <th>Length</th>
                                            <th>Chest</th>
                                            <th>Stomach</th>
                                            <th>Shoulder</th>
                                            <th>Neck</th>
                                            <th>Arm</th>
                                            <th>Wrist</th>
                                            <th>Sleeve</th>
                                            <th>R/Sleeve</th>
                                        </tr>
                                        <tr class='table_row'>
                                            <td>$s_glen</td>
                                            <td>$s_len</td>
                                            <td>$s_chest</td>
                                            <td>$s_stomach</td>
                                            <td>$s_shoulder</td>
                                            <td>$s_neck</td>
                                            <td>$s_arm</td>
                                            <td>$s_wrist</td>
                                            <td>$s_sleeve</td>
                                            <td>$s_rsleeve</td>
                                        </tr>
                                    </table>
                                </div>
                                    ";
                        } else {
                            echo "<h3>You have not added your measurement info yet.</h3><br>
                                    <a href='measurement.php?id=$id&url=' class='flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10'>
                                    Add Measurement
                                    </a>";
                        }
                        ?>

                        <!-- <table class="table-responsive">
                            <tr class="table_head">
                                <th>Product</th>
                                <th>AA</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>

                            <tr class="table_row">
                                <td>
                                    12121
                                </td>
                                <td>Fresh </td>
                                <td>$ 36.00</td>
                                <td>
                                    1212121
                                </td>
                                <td>$ 36.00</td>
                            </tr>

                        </table> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <h4 class="mtext-109 cl2 p-b-30">
                        My Orders
                    </h4>
                    <?php
                    $sql3 = "SELECT 
                    products.picture, products.pd_name, products.price, orders.quantity, orders.order_no, orders.date, orders.amount FROM orders 
                                                INNER JOIN products
                                                ON orders.pd_id=products.pd_id
                                                WHERE cus_id = '$id'
                                                ORDER BY id DESC";
                    $query = $conn->query($sql3);
                    if ($query->num_rows > 0) {
                    ?>
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">Order No</th>
                                    <th class="column-1">Product</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Price</th>
                                    <th class="column-4">Quantity</th>
                                    <th class="column-5">Total</th>
                                    <th class="column-6">Date</th>
                                </tr>
                                <?php
                                while ($row = mysqli_fetch_array($query)) {
                                    echo "
                            <tr class='table_row'>
                                <td class='column-1'>" . $row['order_no'] . "</td>
                                <td class='column-1'>
                                    <div class='how-itemcart1'>
                                        <img src='images/" . $row['picture'] . "' alt='IMG'>
                                    </div>
                                </td>
                                <td class='column-2'>" . $row['pd_name'] . "</td>
                                <td class='column-3'>" . $row['price'] . "</td>
                                <td class='column-1'> " . $row['quantity'] . " </td>
                                <td class='column-5'>" . $row['amount'] . "</td>
                                <td class='column-6'>" . $row['date'] . "</td>
                            </tr>";
                                }
                                ?>
                            </table>
                        </div>
                    <?php
                    } else {
                        echo "<h3>You haven't order anything from Sharplink yet.</h3><br>
                        <a href='product.php' class='flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10'>
						Shop Now
					</a>";
                    }
                    ?>

                </div>
            </div>


        </div>
    </div>
    <!-- place below the html form -->
    <script>
        function payWithPaystack() {
            var handler = PaystackPop.setup({
                key: 'pk_test_0739a8b130f2807de84fc543778c2c816c7ab24d',
                email: 'mondayoke93@gmail.com',
                amount: 10000,
                ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                metadata: {
                    custom_fields: [{
                        display_name: "Mobile Number",
                        variable_name: "mobile_number",
                        value: "+2348068869769"
                    }]
                },
                callback: function(response) {
                    alert('success. transaction ref is ' + response.reference);
                },
                onClose: function() {
                    alert('window closed');
                }
            });
            handler.openIframe();
        }
    </script>





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