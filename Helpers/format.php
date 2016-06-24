<?php
/**
 * Created by PhpStorm.
 * User: jmontemayor
 * Date: 09/06/2016
 * Time: 12:00 PM
 */
function formatDate($date)
{
    $date = date("l ,d/F/Y, g:i a ", strtotime($date));
    return $date;
}

function isactive($category)
{
    if (isset($_GET["category"])) {
        if ($_GET['category'] == $category) {
            return 'active';
        } else {
            return "";
        }
    }
    else if (isset($_GET["topicid"])) {
        $topic = new Topic();
        $topiccategory = $topic->getCategory($topic->getTopic($_GET['topicid'])->category_id)->id;
        if ($category == $topiccategory) {
            return 'active';
        }
        else {
            return "";
        }
        } else {
            if ($category == null) {
                return 'active';
            }
        }

}