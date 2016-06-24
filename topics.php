<?php
/**
 * Created by PhpStorm.
 * User: jmontemayor
 * Date: 09/06/2016
 * Time: 12:03 PM
 */
require ('core/init.php');
$topic = new Topic();
$category = isset($_GET['category']) ? $_GET['category'] : null;
$user_id = isset($_GET['user']) ? $_GET['user'] : null;
$template = new Template('templates/topics.php');
if(isset($category))
{
    $template->topics =$topic->getByCategory($category);
    $template->title='Posts in: "'.$topic->getCategory($category)->name.'"';
}
if(isset($user_id))
{
    $template->topics =$topic->getByUser($user_id);
    $template->title='Posts by: "'.$topic->getUser($user_id)->name.'"';
}
if(!isset($user_id)&&!isset($category)) {
    $template->topics =$topic->getAllTopics();
}

$template->totalTopics =$topic->getTotalTopics();
$template->totalCategories =$topic->getTotalCategories();

echo $template;
?>