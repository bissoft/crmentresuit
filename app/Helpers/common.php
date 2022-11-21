<?php


function get_postid($get = "slug",$segment = "")
{
    $segment = (trim($segment)=="") ? request()->segment(1) : $segment;
    $route = $segment;
    $exp = explode("-", $route);
    $last_id = end($exp);
    $page_id = substr($last_id, 0, 1);
    $post_id = substr($last_id, 1, 1000);
    $cat_id = substr($post_id, 0, 1);
    $slug = str_replace("-" . $last_id, "", $route);
    $seg = array(
        "full" => $route,
        "last_id" => $last_id,
        "page_id" => (is_numeric($page_id)) ? $page_id : 0,
        "post_id" => $post_id,
        "cat_id" => $cat_id,
        "slug" => $slug,
        "type" => ((is_numeric($last_id)) ? "int" : "string"),
    );
    if ($get == "") {
        return "";
    } else {
        return $seg[$get];
    }
}


?>