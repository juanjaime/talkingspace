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
if (isset($_POST['do_reply'])){

    $data= array();
    $data['topicid']=$topicid;
    $data['body']=$_POST['body'];
    $data['user']=getUser()['user_id'];
    $fieldarray= array('body');
    print_r($data);
    if(Validator::isRequired($fieldarray)) {

        if ($topic->reply($data)) {

            redirect('topic.php?topicid='.$topicid, 'Your reply has been posted', 'success');
        } else {
            redirect('topic.php?topicid='.$topicid, 'An error ocurred', 'error');
        }
    }
    else {
        redirect('topic.php?topicid='.$topicid, 'Please add content to your reply', 'error');
    }
}

echo $template;

?>