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
