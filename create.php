<?php
/**
 * Created by PhpStorm.
 * User: jmontemayor
 * Date: 09/06/2016
 * Time: 12:03 PM
 */
require ('core/init.php');?>
<?php
if(!isLogged())
{
    redirect('index.php');
}
$template = new Template('templates/create.php');
$topic = new Topic();
$template->totalCategories =$topic->getTotalCategories();
if(isset($_POST['do_create'])){

    $data = array();
    $data['title']=$_POST['title'];
    $data['category_id']=$_POST['category'];
    $data['body']=$_POST['body'];
    $data['user']=getUser()['user_id'];
    $data['lastact']=date("Y-m-d M:i:s");
    $fieldarray= array('title','body','category');

    if(Validator::isRequired($fieldarray)) {

        if ($topic->create($data)) {

            redirect('create.php', 'Your topic has been posted', 'success');
        } else {
            redirect('create.php', 'An error ocurred', 'error');
       }
    }
    else {
        redirect('create.php', 'Please complete all the fields', 'error');
        }
}
echo $template;
?>