<?php
/**
 * Created by PhpStorm.
 * User: jmontemayor
 * Date: 09/06/2016
 * Time: 12:03 PM
 */
require ('core/init.php');?>
<?php
$template = new Template('templates/register.php');
$user = new User();
if(isset($_POST["register"]))
{
    $data= array();
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['username'] = $_POST['username'];
    $data['password'] = sha1($_POST['password']);
    $data['password2'] = sha1($_POST['password2']);
    $data['about'] = $_POST['about'];
    $data['last_activity'] = date("Y-m-d M:i:s");
        if ($user->uploadAvatar()) {
            $data['avatar'] = $_FILES['avatar']['name'];
        }else {
            $data['avatar'] = 'gravatar.jpg';
        }
    if ($user->register($data)){
        redirect('register.php','Your profile has been created now you can login','success');
    }else{
        redirect('register.php','Please check that the data you entered is correct','error');
    }
}
$topic = new Topic();
$template->totalCategories =$topic->getTotalCategories();
echo $template;
?>