<?php
/**
 * Created by PhpStorm.
 * User: jmontemayor
 * Date: 09/06/2016
 * Time: 12:04 PM
 */
include ('core/init.php');
if(isset($_POST['do_logout'])) {
    $user = new User();
    if ($user->logout()) {
        redirect($_SERVER['HTTP_REFERER'], 'You are now logged out', 'success');
    } else {
        redirect('index.php');
    }
}