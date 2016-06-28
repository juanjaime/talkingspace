<?php
include ('core/init.php');
/**
 * Created by PhpStorm.
 * User: jmontemayor
 * Date: 09/06/2016
 * Time: 12:04 PM
 */
if(isset($_POST['do_login'])){
    $username=$_POST['username'];
    $password=sha1($_POST['password']);
    $user=new User();
    if ($user->login($username,$password)) {
        redirect($_SERVER['HTTP_REFERER'], 'You have been loged in', 'success');
    }
    else{
        redirect($_SERVER['HTTP_REFERER'], 'The username or password is wrong', 'error');
        }

}else {
    redirect('index.php');
}
