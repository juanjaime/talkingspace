<?php
/**
 * Created by PhpStorm.
 * User: jmontemayor
 * Date: 09/06/2016
 * Time: 12:03 PM
 */
require ('core/init.php');?>
<?php
if(isLogged())
{
    redirect('index.php');
}
$template = new Template('templates/register.php');
$user = new User();
//$validate= new Validator();
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
    $fieldarray= array('name','email','password','password2','username');
    if(Validator::isRequired($fieldarray)){
        if(Validator::validateemail($data['email'])){
            if(Validator::validatepassword($data['password'],$data['password2'])){
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
            else{
                redirect('register.php','Your Passwords do not match','error');
            }
        }
        else{
            redirect('register.php','Use a valid email address','error');
        }
    }
    else{
        redirect('register.php','Please fill all the required fields','error');
    }

}
$topic = new Topic();
$template->totalCategories =$topic->getTotalCategories();
echo $template;
?>