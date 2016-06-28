<?php
/**
 * Created by PhpStorm.
 * User: jmontemayor
 * Date: 09/06/2016
 * Time: 11:59 AM
 */
function replyCount($topic_id)
{
    $db = new Database();
    $db->query('SELECT * FROM replies WHERE topic_id = :topic_id');
    $db->bind(':topic_id', $topic_id);
    $rows = $db->resultset();
    return $db->rowCount();
}
function categoryCount($category_id)
{
    $db = new Database();
    $db->query('SELECT * FROM categories  WHERE id = :category_id');
    $db->bind(':category_id', $category_id);
    $rows = $db->resultset();
    return $db->rowCount();
}
function totalTopicCount()
{
    $db = new Database();
    $db->query('SELECT * FROM topics  ');
    $rows = $db->resultset();
    return $db->rowCount();
}
function returnTopics($category_id)
{
    $db = new Database();
    $db->query('SELECT * FROM topics  WHERE category_id = :category_id');
    $db->bind(':category_id', $category_id);
    $rows = $db->resultset();
    return $rows;
}
function topicCount($category_id)
{
    $db = new Database();
    $db->query('SELECT * FROM topics  WHERE category_id = :category_id');
    $db->bind(':category_id', $category_id);
    $rows = $db->resultset();
    return $db->rowCount();
}
function categoryDisplay()
{
    $db = new Database();
    $db->query('SELECT * FROM categories ');
    $result = $db->resultset();
    return $result;
}
function userPostCount($user_id){
    $db =new Database();
    $db->query('SELECT * FROM topics
                WHERE user_id =:user_id');
    $db->bind(':user_id',$user_id);
    $rows =$db->resultset();
    $topic_count=$db->rowCount();

    $db->query('SELECT * FROM replies
                WHERE user_id=:user_id');
    $db->bind(':user_id',$user_id);
    $rows =$db->resultset();
    $reply_count = $db->rowCount();

    return $topic_count+$reply_count;

}