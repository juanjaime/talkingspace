<?php
/**
 * Created by PhpStorm.
 * User: jmontemayor
 * Date: 09/06/2016
 * Time: 11:51 AM
 */
session_start();
require_once ('config/config.php');
require_once ('Helpers/system_helper.php');
require_once ('Helpers/format.php');
require_once ('Helpers/db_helper.php');
function __autoload($class_name){
    require_once ('libraries/'.$class_name.'.php');

}