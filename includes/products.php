<?php
include('dbconfig.php');

function result_exists($result_arr, $id)
{
    if (count($result_arr) > 0) {
        foreach ($result_arr as $result) {
            if ($result['id'] == $id) {
                return True;
            }
        }
        return False;
    }
    return False;
}

if (isset($_POST["search"])) {
    $result_found = false;
    $result_arr = array();
    $search_str = $_POST['search'];
    $Search_str = mysqli_real_escape_string($conn, $search_str);
    $search_arr = explode(' ', $search_str);
    foreach ($search_arr as $word) {
        if (strlen($word) >= 3) {
            $search_str = '%' . $word . '%';
            $query = "SELECT * FROM products WHERE keywords LIKE  '$search_str'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                $j = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    //$r_id = $rows['id'];
                    /*$id = $row['pd_id'];
                    $name = $row['pd_name'];
                    $description = $row['description'];
                    $category = $row['pd_category'];
                    $type = $row['pd_type'];
                    $price = $row['price'];
                    $picture = $row['picture'];
                    $picture2 = $row['picture2'];
                    $picture3 = $row['picture3']; */

                    echo "
                        <div class='col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item " . $row['pd_category'] . "  " . $row['pd_type'] . "'>
							<!-- Block2 -->
							<div class='block2'>
								<div class='block2-pic hov-img0'>
									<img src='images/" . $row['picture'] . "' alt='IMG-PRODUCT' height='300'>

									<a href='#' class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1' data-mod=$j>
										Quick View
									</a>
								</div>
                                <div class='block2-txt flex-w flex-t p-t-14'>
									<div class='block2-txt-child1 flex-col-l '>
										<a href='product-detail.php?pid=" . $row['pd_id'] . " class='stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6'>
											" . $row['pd_name'] . "
										</a>
										<span class='stext-105 cl3'>
											N " . $row['price'] . "
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
						</div>";
                }
                $array_list[] = $row;
                $j++;
            }
            $result_found = true;
        }
    }
}
