<?php
require_once('includes/dbconfig.php');
$actionName = $_POST["action"];
if ($actionName == "showPost") {
    $showPostFrom = $_POST["showPostFrom"];
    $showPostCount = $_POST["showPostCount"];
    //get rows query
    $query = "SELECT * FROM products ORDER BY pd_id DESC LIMIT " . $showPostFrom . "," . $showPostCount;
    $result = mysqli_query($conn, $query);
    //number of rows
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        $j = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $tutorial_id = $row["pd_id"]; ?>
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $row['pd_category'] . ' ' . $row['pd_type']; ?>">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="images/<?php echo $row['picture']; ?>" alt="IMG-PRODUCT" height="300">

                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" data-mod=<?php echo $j; ?>>
                            Quick View
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="product-detail.php?pid=<?php echo $row['pd_id']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
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
            $j++;
        }
    }
}
