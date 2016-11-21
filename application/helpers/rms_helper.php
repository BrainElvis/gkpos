<?php

function debugPrint($object, $title = "", $isMarkup = false) {
    echo '<font color="red">Debug <<< START';
    if (!empty($title)) {
        echo "$title: ";
    }
    if ($isMarkup == false) {
        echo "<pre>";
        print_r($object);
        echo "</pre>";
    } else {
        echo htmlspecialchars($object);
    }
    echo 'END >>></font>';
}

if (!function_exists('objectToArray')) {

    function objectToArray($d) {
        if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }

        if (is_array($d)) {
            /*
             * Return array converted to object
             * Using __FUNCTION__ (Magic constant)
             * for recursive call
             */
            return array_map(__FUNCTION__, $d);
        } else {
            // Return array
            return $d;
        }
    }

}
if (!function_exists('get_mails')) {

    function get_mails() {
        $CI = & get_instance();
        $CI->db->limit(10);
        $CI->db->order_by('id', 'DESC');
        return $CI->db->get('contact')->result();
    }

}

function show_date($date, $time_stamp = false, $format = "d/m/Y") {
    if ($time_stamp) {
        return date($format, $date);
    } else {
        return date($format, strtotime($date));
    }
}

if (!function_exists('order_id')) {

    function order_id($id) {
        return sprintf("%06s", $id);
    }

}

function get_city_name($id) {
    $CI = & get_instance();
    $cities = $CI->session->userdata('cities');
    foreach ($cities as $city) {
        if ($city->CityId == $id) {
            return $city->CityName;
        }
    }
}

function get_area_name($id) {
    $CI = & get_instance();
    $areas = $CI->session->userdata('areas');
    foreach ($areas as $area) {
        if ($area->AreaId == $id) {
            return $area->AreaName;
        }
    }
}

function checkfile($path = '', $file = '') {
    $filename = $path . $file;
    if (file_exists($filename)) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function get_title($table, $condition = null, $columns = '*', $order = null) {
    $CI = & get_instance();
    $CI->db->select($columns);
    if ($order)
        $CI->db->order_by($order);
    if ($condition)
        $CI->db->where($condition);
    $CI->db->limit(1);
    return $CI->db->get($table)->row()->title;
}

function count_all($table, $condition = null) {
    $CI = & get_instance();
    if ($condition)
        $CI->db->where($condition);

    $CI->db->from($table);
    return $CI->db->count_all_results();
}


function getsliders() {
    $CI = & get_instance();
    $CI->db->where(array('is_published' => 1));
    $CI->db->where('image !=', '');
    $CI->db->from('slider');
    return $CI->db->get()->result();
}

function getfeaturedpost() {
    $CI = & get_instance();
    $CI->db->select('id,title,slug,content,image,modified_at,created_at');
    $CI->db->where(array('is_published' => 1, 'is_featured' => 1));
    $CI->db->where('image !=', '');
    $CI->db->from('post');
    return $CI->db->get()->result();
}

function chop_string($string,$x=200) {
  $string = strip_tags(stripslashes($string)); // convert to plaintext
  return substr($string, 0, strpos(wordwrap($string, $x), "\n"));
}
