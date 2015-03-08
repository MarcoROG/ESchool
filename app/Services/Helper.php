<?php
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 03/03/15
 * Time: 21:40
 */

namespace App\Services;


class Helper {
    public static function generateString($length=10) {
        $characters='0123456789qwertyuiopasdfghjklzxcvbnm';
        $string='';
        for($i=0;$i<$length;$i++){
            $string.= $characters[mt_rand(0,strlen($characters)-1)];
        }
        return $string;
    }
    public static function generateToken(){
        return Md5(microtime()*microtime());
    }
}