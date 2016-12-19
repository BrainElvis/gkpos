<?php

define('API_ACCESS_KEY', 'EXct');
define('USER_ID', 'G9657');
define('API_SECRET', '7p9Qd');
if (isset($_REQUEST)) {
    addParcel($_REQUEST);
}

function addParcel($parcelArray) {
    $fields_string = '';
    $fields = array(
        'parcel' => 'order',
        'user_id' => USER_ID,
        'api_key' => API_ACCESS_KEY,
        'api_secret' => API_SECRET,
        'pid' => $parcelArray['productid'],
        'delivery_timing' => $parcelArray['delivery_timing'],
        'delivery_hour' => $parcelArray['delivery_hour'],
        'shipping_area' => $parcelArray['shipping_area'],
        'parcel_weight' => $parcelArray['parcel_weight'],
        'product_price' => $parcelArray['product_price'],
        'recipient_name' => $parcelArray['recipient_name'],
        'recipient_mobile' => $parcelArray['recipient_mobile'],
        'recipient_house' => $parcelArray['recipient_house'],
        'recipient_block' => $parcelArray['recipient_block'],
        'recipient_road' => $parcelArray['recipient_road'],
        'recipient_city' => $parcelArray['recipient_city'],
        'recipient_area' => $parcelArray['recipient_area'],
        'recipient_landmark' => $parcelArray['recipient_landmark'],
        'recipient_zip' => $parcelArray['recipient_zip']
    );

    foreach ($fields as $key => $value) {
        $fields_string .= $key . '=' . $value . '&';
    }
    //$url = 'http://www.ecourier.com.bd/api?'.$fields_string;
    $url = 'http://www.ecourier.com.bd/api';
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $fields,
        CURLOPT_FOLLOWLOCATION => true
    ));
    $result = curl_exec($ch);
    if ($result === false) {
        echo sprintf('<span>%s</span>CURL error:', curl_error($ch));
        return false;
    } else {
        $json_result = json_decode($result, true);
        if ($json_result != null) {
            $res = $json_result['Parcel']['ID'];
            echo $res;
        } else {
            echo 'Please Check Your Request Parameters';
        }
    }
    curl_close($ch);
}
