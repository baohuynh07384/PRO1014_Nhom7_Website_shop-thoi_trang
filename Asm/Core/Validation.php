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

    public static function ValidationUsername($value)
    {

        $length = strlen($value);
        if ($length < 6 || $length > 12) {
            return false;
        }

        if (!preg_match('/^[a-zA-Z0-9]+$/', $value)) {
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
            preg_match('/\d/', $value) &&              
            preg_match('/[^a-zA-Z0-9]/', $value)       
        ) 
            return true;
        
    }


}