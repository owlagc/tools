<?php
function proxi(){
        $cache = './proxies/';
        $proxy_files = $cache.'proxie.json';
        if(!file_exists(dirname($proxy_files))) { mkdir($proxy_files, 0777, true); }
        if(file_exists($proxy_filess)){
            $data = json_decode(@file_get_contents($proxy_files), true);
                if (filemtime($proxy_files) < ( time() - (3600) ) )
                {
                    unlink($proxy_files);
                }
        }else{
        $proxi = file_get_contents('https://raw.githubusercontent.com/TheSpeedX/PROXY-List/master/http.txt');
        $proxi = preg_match_all('/([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3})\:?([0-9]{1,5})?/', $proxi, $match);
        $proxi = json_encode($match[0],true);
        if(file_put_contents($proxy_files, $proxi)){
            $data = json_decode(@file_get_contents($proxy_files), true);
        }
        }
    if(is_array($data)){
        shuffle($data);
        return $data[0];
    }else{
        return false;
    }
    }
?>
