<?php
include('dbconfig.php');

if (isset($_POST['products'])) {

    $result = '';

    $sql = "SELECT * FROM products";
    $query = $conn->query($sql);
    if ($query->num_rows > 0) {
        while ($row = mysqli_fetch_array($query)) {
            $id = $row['pd_id'];
            $name = $row['pd_name'];
            $description = $row['description'];
            $category = $row['pd_category'];
            $type = $row['pd_type'];
            $price = $row['price'];
            $picture = $row['picture'];
            $picture2 = $row['picture2'];
            $picture3 = $row['picture3'];

            echo "
            <div class='col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item $category $type'>
					<!-- Block2 -->
					<div class='block2'>
						<div class='block2-pic hov-img0'>
							<img src='./images/$picture' alt='IMG-PRODUCT'>

							<a href='#' pid='$id' id='viewmodal' class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1' data-toggle='modal' data-target='#exampleModal'>
								Quick View
							</a>
						</div>

						<div class='block2-txt flex-w flex-t p-t-14'>
							<div class='block2-txt-child1 flex-col-l '>
								<a href='product-detail.html' class='stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6'>
									$name
								</a>

								<span class='stext-105 cl3'>
									N$price
								</span>
							</div>

							<div class='block2-txt-child2 flex-r p-t-3'>
								<a href='#' class='btn-addwish-b2 dis-block pos-relative js-addwish-b2'>
									<img class='icon-heart1 dis-block trans-04' src='images/icons/icon-heart-01.png' alt='ICON'>
									<img class='icon-heart2 dis-block trans-04 ab-t-l' src='images/icons/icon-heart-02.png' alt='ICON'>
								</a>
							</div>
						</div>
					</div>
				</div>
        ";
        }
    }
}

if (isset($_POST['productdetails'])) {
    $pid = $_POST['pid'];

    $sql = "SELECT * FROM products WHERE pd_id='$pid'";
    $query = $conn->query($sql);

    $row = mysqli_fetch_array($query);
    $id = $row['pd_id'];
    $name = $row['pd_name'];
    $description = $row['description'];
    $category = $row['pd_category'];
    $type = $row['pd_type'];
    $price = $row['price'];
    $picture = $row['picture'];
    $picture2 = $row['picture2'];
    $picture3 = $row['picture3'];

    echo "
    
    ";
}
