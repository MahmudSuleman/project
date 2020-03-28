<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/6/2020
 * Time: 4:07 PM
 */

class Validation {


    public static function valid($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function textfield($data, $fieldname,$min = 2, $max = 20)
    {
        global $errors;
        $data = self::valid($data);
        if(strlen($data)== 0){
           array_push($errors, "{$fieldname} cannot be blank");
        }elseif(strlen($data) < $min ){
            array_push($errors,"{$fieldname} cannot be less than {$min}");
        }elseif(strlen($data) > $max){
            array_push($errors,"{$fieldname} cannot be greater than {$max}");
        }
        return $data;
    }

} 