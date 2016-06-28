<?php

/**
 * Created by PhpStorm.
 * User: jmontemayor
 * Date: 09/06/2016
 * Time: 11:58 AM
 */
class User
{
    private $db;
    public function __construct(){
        $this->db= new Database();
    }
    public function register($data){
        $this->db->query('INSERT INTO users (name,email,avatar,username, password,about,last_act)VALUES(:name,:email,:avatar,:username,:password,:about,:last_activity)');
        $this->db->bind(':name',$data['name']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':avatar',$data['avatar']);
        $this->db->bind(':username',$data['username']);
        $this->db->bind(':password',$data['password']);
        $this->db->bind(':about',$data['about']);
        $this->db->bind(':last_activity',$data['last_activity']);
        $this->db->bind(':name',$data['name']);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    public function uploadAvatar()
    {
        if($_FILES['avatar']['name']==''){
            return false;
        }
        $allowedEXT = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES['avatar']["name"]);
        $extension = end($temp);
        if (($_FILES['avatar']["type"] == "image/gif") ||
            ($_FILES["avatar"]["type"] == "image/jpeg") ||
            ($_FILES["avatar"]["type"] == "image/jpg") ||
            ($_FILES["avatar"]["type"] == "image/pjpeg") ||
            ($_FILES["avatar"]["type"] == "image/x-png") ||
            ($_FILES["avatar"]["type"] == "image/png") &&
            ($_FILES["avatar"]["size"] < 20000)&&
            in_array($extension,$allowedEXT)){
            if($_FILES["avatar"]["error"]>0)
            {
                redirect('register.php',$_FILES["avatar"]["error"],"error");
            }
            else{

                if(file_exists("images/avatars/".$_FILES["avatar"]["name"]))
                {
                    redirect('register.php','File already exists', 'error');
                }
                else{

                    move_uploaded_file($_FILES["avatar"]["tmp_name"],
                    "images/avatars/".$_FILES["avatar"]["name"]);

                    return true;
                }
            }
        }
        else{

            if (!in_array($extension,$allowedEXT)){

                redirect('register.php', 'Invalid File Type', 'error');

            }
            else {

                redirect('register.php','The image is too big','error');

            }

        }
    }

    /**
     * @return Database
     */
    public function login($username,$password)
    {
        $this->db->query("SELECT * FROM users WHERE username = :username AND  password= :password");
        $this->db->bind(":username",$username);
        $this->db->bind(":password",$password);
        $row=$this->db->single();
        if($this->db->rowCount()>0){
            $this->setUserData($row);
            return true;
        }
        else{
            return false;
        }
        
    }
    private function setUserData($row){
        $_SESSION['is_logged']=true;
        $_SESSION['user_id']=$row->id;
        $_SESSION['username']=$row->username;
        $_SESSION['name']=$row->name;
    }
    public function logout()
    {
       // echo "User Class";
        unset($_SESSION['is_logged']);
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['name']);
        return true;

    }
    public function getTotalUsers(){
        $this->db->query('SELECT * FROM users');
        $rows=$this->db->resultset();
        return$this->db->rowCount();
    }
}