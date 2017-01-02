<?php

function get_record_list($table, $condition = null, $columns = '*', $order = null) {
    $CI = & get_instance();
    $CI->db->select($columns);
    if ($order)
        $CI->db->order_by($order);
    if ($condition)
        $CI->db->where($condition);
    return $CI->db->get($table)->result();
}

function calculate_discount($order_id, $total, $foodTotal, $nonFoodTotal, $data) {
    $discount = 0;
    if ($data['func'] == 1) {
        if (isset($data['food']) && isset($data['nonfood'])) {
            if ($data['food'] == 'yes' && ($data['nonfood'] != '' || $data['nonfood'] == 'yes' )) {
                $discount = $total * $data['number'] / 100;
            } else if ($data['food'] == 'yes' && ($data['nonfood'] == '' || $data['nonfood'] == 'no' )) {
                $discount = $foodTotal * $data['number'] / 100;
            } else if (($data['food'] == '' || $data['food'] == 'no' ) && ($data['nonfood'] != '' && $data['nonfood'] == 'yes' )) {
                $discount = $nonFoodTotal * $data['number'] / 100;
            } else {
                $discount = $total * $data['number'] / 100;
            }
        } else if (isset($data['food']) && !isset($data['nonfood'])) {
            if ($data['food'] == 'yes') {
                $discount = $foodTotal * $data['number'] / 100;
            }
        } else if (!isset($data['food']) && isset($data['nonfood'])) {
            if ($data['nonfood'] == 'yes') {
                $discount = $nonFoodTotal * $data['number'] / 100;
            }
        } else {
            $discount = $total * $data['number'] / 100;
        }
    } else {
        $discount = $data['number'];
    }
    $CI = & get_instance();
    $CI->Orders_Model->set_discount_amount($order_id, $discount);
    return $discount;
}

function calculate_service_charge($order_id, $total, $data) {
    $service_charge = 0;
    if ($total > 0 && $order_id > 0 && $data['func'] == 1) {
        $service_charge = $total * $data['number'] / 100;
    } else {
        $service_charge = isset($data['number']) && $data['number'] > 0 ? $data['number'] : $service_charge;
    }
    $CI = & get_instance();
    $CI->Orders_Model->set_servicecharge_amount($order_id, $service_charge);
    return $service_charge;
}

function calculate_vat($order_id, $total, $vat_data) {
    $vat = 0;
    if ($vat_data['func'] == 1) {
        $vat = $total * $vat_data['number'] / 100;
    }
    $CI = & get_instance();
    $CI->Orders_Model->set_vat_amount($order_id, $vat);
    return $vat;
}

function gkpos_dateformat($php_format) {
    $SYMBOLS_MATCHING = array(
        // Day
        'd' => 'dd',
        'D' => 'd',
        'j' => 'd',
        'l' => 'dd',
        'N' => '',
        'S' => '',
        'w' => '',
        'z' => '',
        // Week
        'W' => '',
        // Month
        'F' => 'MM',
        'm' => 'mm',
        'M' => 'M',
        'n' => 'm',
        't' => '',
        // Year
        'L' => '',
        'o' => '',
        'Y' => 'yyyy',
        'y' => 'yy',
        // Time
        'a' => 'p',
        'A' => 'P',
        'B' => '',
        'g' => 'H',
        'G' => 'h',
        'h' => 'HH',
        'H' => 'hh',
        'i' => 'ii',
        's' => 'ss',
        'u' => ''
    );

    $bootstrap_format = "";
    $escaping = false;
    for ($i = 0; $i < strlen($php_format); $i++) {
        $char = $php_format[$i];
        if ($char === '\\') { // PHP date format escaping character
            $i++;
            if ($escaping)
                $bootstrap_format .= $php_format[$i];
            else
                $bootstrap_format .= '\'' . $php_format[$i];
            $escaping = true;
        }
        else {
            if ($escaping) {
                $bootstrap_format .= "'";
                $escaping = false;
            }
            if (isset($SYMBOLS_MATCHING[$char]))
                $bootstrap_format .= $SYMBOLS_MATCHING[$char];
            else
                $bootstrap_format .= $char;
        }
    }

    return $bootstrap_format;
}

function gkpos_chopstring($string, $x = 200) {
    $string = strip_tags(stripslashes($string)); // convert to plaintext
    return substr($string, 0, strpos(wordwrap($string, $x), "\n"));
}

if (!function_exists('postcodeFormat')) {

    function postcodeFormat($postcode) {
        //trim and remove spaces
        $cleanPostcode = preg_replace("/[^A-Za-z0-9]/", '', $postcode);

        //make uppercase
        $cleanPostcode = strtoupper($cleanPostcode);

        //if 5 charcters, insert space after the 2nd character
        if (strlen($cleanPostcode) == 5) {
            $postcode = substr($cleanPostcode, 0, 2) . " " . substr($cleanPostcode, 2, 3);
        }

        //if 6 charcters, insert space after the 3rd character
        elseif (strlen($cleanPostcode) == 6) {
            $postcode = substr($cleanPostcode, 0, 3) . " " . substr($cleanPostcode, 3, 3);
        }


        //if 7 charcters, insert space after the 4th character
        elseif (strlen($cleanPostcode) == 7) {
            $postcode = substr($cleanPostcode, 0, 4) . " " . substr($cleanPostcode, 4, 3);
        }

        return $postcode;
    }

}

function formatPhoneNumber($phoneNumber) {
    $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
    if (strlen($phoneNumber) > 10) {
        $countryCode = substr($phoneNumber, 0, strlen($phoneNumber) - 10);
        $areaCode = substr($phoneNumber, -10, 3);
        $nextThree = substr($phoneNumber, -7, 3);
        $lastFour = substr($phoneNumber, -4, 4);
        $phoneNumber = '+' . $countryCode . ' (' . $areaCode . ') ' . $nextThree . '-' . $lastFour;
    } else if (strlen($phoneNumber) == 10) {
        $areaCode = substr($phoneNumber, 0, 3);
        $nextThree = substr($phoneNumber, 3, 3);
        $lastFour = substr($phoneNumber, 6, 4);
        $phoneNumber = '(' . $areaCode . ') ' . $nextThree . '-' . $lastFour;
    } else if (strlen($phoneNumber) == 7) {
        $nextThree = substr($phoneNumber, 0, 3);
        $lastFour = substr($phoneNumber, 3, 4);
        $phoneNumber = $nextThree . '-' . $lastFour;
    }
    return $phoneNumber;
}

function get_order_type($id) {
    $ci = & get_instance();
    $sql = " SELECT *
                   FROM gkpos_order
               WHERE id = $id              
               ";
    return $ci->db->query($sql)->row()->order_type;
}
