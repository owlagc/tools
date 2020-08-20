<?php
function getdomain($url) {
    $host = parse_url($url, PHP_URL_HOST);
    if(filter_var($host,FILTER_VALIDATE_IP)) {
        return $host;
    }
    $domain_array = explode(".", str_replace('www.', '', $host));
    $count = count($domain_array);
    if( $count>=3 && strlen($domain_array[$count-2])==2 ) {
        return implode('.', array_splice($domain_array, $count-3,3));
    } else if( $count>=2 ) {
        return implode('.', array_splice($domain_array, $count-2,2));
    }
}
?>
