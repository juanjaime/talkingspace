<?php

/**
 * Created by PhpStorm.
 * User: jmontemayor
 * Date: 09/06/2016
 * Time: 11:58 AM
 */
class Validator
{
public static function isRequired($fieldarray){
    foreach ($fieldarray as $field)
    {
        if($_POST[''.$field.'']==''){
            return false;
        }
    }
    return true;
}
    public static function validateemail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
            
        }
        else{
            return false;
        }
    }
    public static function validatepassword($password, $password2){
        if ($password==$password2){
            return true;
        }
        else{
            return  false;
        }
    }
    
}