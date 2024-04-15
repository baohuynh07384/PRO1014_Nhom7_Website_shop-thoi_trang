<?php

namespace App\Core;

class Validation
{

    public static function ValidationEmail($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function CheckEmtpy($value)
    {
        return empty($value);
    }

    public static function ValidationPhone($value)
    {
        if (!preg_match('/^[Z0-9]+$/', $value)) {
            return false;
        }

        return true;
    }
    
    public static function ValidationPassword($value)
    {

        if (
            preg_match('/^.{8,}$/', $value) &&
            preg_match('/[A-Z]/', $value) &&
            preg_match('/[a-z]/', $value) &&
            preg_match('/\d/', $value)
        )
            return true;
    }
    
    public static function required($value)
    {
        return empty($value);   
    }
    public static function isNumber ($value){
        return is_numeric($value) && $value;
    }

   
    
}
