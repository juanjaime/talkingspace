<?php
/**
 * Created by PhpStorm.
 * User: jmontemayor
 * Date: 09/06/2016
 * Time: 12:00 PM
 */
function redirect ($page = FALSE, $message=NULL, $message_type=NULL){
    if(is_string($page)){

        $location=$page;
    }
    else{
        $location=$_SERVER['SCRIPT_NAME'];
    }
    if($message != NULL){
        $_SESSION['message']=$message;
    }
    if($message_type!=NULL){
        $_SESSION['message_type']=$message_type;
    }
    header('Location:'.$location);
    exit;
}
function displayMessage(){
    if (!empty($_SESSION['message'])){
        $message = $_SESSION['message'];

        if (!empty($_SESSION['message_type'])){
            $message_type=$_SESSION['message_type'];
            if($message_type=='error'){
                echo '<div class="alert alert-danger"> '.$message.' </div>';
            }
            else{
                echo '<div class="alert alert-success"> '.$message.' </div>';
            }
        }
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }else{
        echo '';
    }

}
function isLogged(){
    if(isset($_SESSION['is_logged'])){
        //echo $_SESSION['is_logged'];
        return true;
    }
    else {
        return false;
    }
}
function getUser(){
    $userArray= array();
    $userArray['user_id']=$_SESSION['user_id'];
    $userArray['username']=$_SESSION['username'];
    $userArray['name']=$_SESSION['name'];
    return $userArray;
}
