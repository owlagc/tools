<?php
function get_desc($str,$desc = false) {
    $breaks = array("<br />","<br>","<br/>","br br");
    $str = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $str);
    $str = iconv("UTF-8", "UTF-8//IGNORE", $str);
    $str = preg_replace('/\s+/', ' ', $str);
    $str = preg_replace('/[^[:print:]\r\n]/', '',$str);
    $str = rem_alltags($str);
$str = preg_replace('/<br(\s+)?\/?>/i', "\n", $str);
$str = str_ireplace($breaks, ".\r\n\r\n", $str);
$str = rtrim($str,'br');
$str = ltrim($str,'br');
$str = trim($str,'br');
$str = str_replace('br ','',$str);
if($desc == true):$str = rem_alltags($str,true);$str = str_replace('"','',$str);$str = trim($str,'"');$str = substr($str,0,160). "...";endif;
return nl2br($str,true);
}
?>
