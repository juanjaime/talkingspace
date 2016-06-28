<?php
/**
 * Created by PhpStorm.
 * User: jmontemayor
 * Date: 09/06/2016
 * Time: 12:03 PM
 */
require ('core/init.php');?>
<?php
$topic = new Topic();
$user = new User();
$template = new Template('templates/frontpage.php');
$template->topics =$topic->getAllTopics();
$template->totalTopics =$topic->getTotalTopics();
$template->totalCategories =$topic->getTotalCategories();
$template->totalUsers =$user->getTotalUsers();
//TestPDO::simpleFunction()
echo $template;
?>