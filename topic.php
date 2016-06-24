<?php
require ('core/init.php');
$topic = new Topic();
$topicid = $_GET['topicid'];
$template = new Template('templates/onetopic.php');
$template->topics =$topic->getAllTopics();
$template->totalTopics =$topic->getTotalTopics();
$template->totalCategories =$topic->getTotalCategories();
$template->topic =$topic->getTopic($topicid);
$template->replies =$topic->getReplies($topicid);
$template->topiccategory =$topic->getCategory($topic->getTopic($topicid)->category_id)->name;
$template->title=$topic->getTopic($topicid)->title;
echo $template;
?>