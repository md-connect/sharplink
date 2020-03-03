<?php session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
} elseif (empty($_SESSION['cart_item'])) {
    header("Location: product.php");
} elseif (!isset($_POST['pay'])) {
    header("Location: shoping-cart.php");
}

function test_input($data)
{
    include("./includes/dbconfig.php");
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}

$curl = curl_init();
if (isset($_POST['pay']) && !empty($_POST['cus_email']) && !empty($_POST['cus_phone'])) {
    $email = filter_var(test_input($_POST['cus_email']), FILTER_SANITIZE_EMAIL);
    $amount = $_POST['amount'] * 100;  //the amount in kobo. 
    //$pid = test_input($_POST['items']);

    $item = $_SESSION['cart_item'];
    //$pid = explode("+", $pid);
    $quantity = test_input($_POST['quantity']);
    //echo $email . ";" . $amount . ";" . $quantity;
    foreach ($item as $list) {
        $cus_id = $_SESSION['cus_id'];
        $pid = $list['code'];
        $qty = $list['quantity'];
        $price = $list['price'];
        $amount2 = $qty * $price;
        //echo $pid . ";" . $cus_id . ";" . $qty .";". $price . ";" . $amount."<br>";
        //print_r($list);

    }
    //echo $amount;
    //die();
    // url to go to after payment
    $callback_url = 'localhost/projects/sharplink/callback.php';

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode([
            'amount' => $amount,
            'email' => $email,
            'callback_url' => $callback_url
        ]),
        CURLOPT_HTTPHEADER => [
            "authorization: Bearer sk_test_b8c183e423468294f5c886ce06c6acc05f61ce4c", //replace this with your own test key
            "content-type: application/json",
            "cache-control: no-cache"
        ],
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    if ($err) {
        // there was an error contacting the Paystack API
        die('Curl returned error: ' . $err);
    }

    $tranx = json_decode($response, true);

    if (!$tranx->status) {
        // there was an error from the API
        print_r('API returned error: ' . $tranx['message']);
    }

    // comment out this line if you want to redirect the user to the payment page
    //print_r($tranx);


    // redirect to page so User can pay
    // uncomment this line to allow the user redirect to the payment page
    header('Location: ' . $tranx['data']['authorization_url']);
}
