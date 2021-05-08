<?php
namespace App\Helper;
class getConfigJson{

    public static function get($param){
        $path = storage_path() . "/lib/seting_web.json";
        $json = json_decode(file_get_contents($path), true);
        return $json[$param];
    }

}