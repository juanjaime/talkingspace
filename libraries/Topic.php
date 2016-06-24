<?php

/**
 * Created by PhpStorm.
 * User: jmontemayor
 * Date: 09/06/2016
 * Time: 11:57 AM
 */
class Topic
{
    private $db;
    public function __construct(){
        $this->db= new Database();
    }
    public function getAllTopics(){
        $this->db->query("Select topics.*, users.username, users.avatar, categories.name FROM topics 
                          INNER JOIN users
                           ON topics.user_id = users.id
                           INNER JOIN categories
                           ON topics.category_id = categories.id
                           ORDER By create_date DESC");

        $results = $this->db->resultset();
        return $results;
    }
    public function getByCategory($category_id){
        $this->db->query("Select topics.*, users.username, users.avatar, categories.name FROM topics 
                          INNER JOIN users
                           ON topics.user_id = users.id
                           INNER JOIN categories
                           ON topics.category_id = categories.id
                           WHERE topics.category_id= :category_id");
        $this->db->bind(":category_id",$category_id);
        $results = $this->db->resultset();
        return $results;
    }
    public function getByUser($user_id){
        $this->db->query("Select topics.*,categories.*, users.username, users.avatar FROM topics 
                           INNER JOIN categories
                           ON topics.category_id = categories.id
                           INNER JOIN users
                           ON topics.user_id = users.id
                           WHERE topics.user_id= :user_id");
        $this->db->bind(":user_id",$user_id);
        $results = $this->db->resultset();
        return $results;
    }
    public function getCategory($category_id){
        $this->db->query("SELECT * FROM categories  WHERE id = :category_id");
        $this->db->bind(":category_id", $category_id);
        $row = $this->db->single();
        return $row;
    }
    public function getUser($userid){
        $this->db->query("SELECT * FROM users  WHERE id = :userid");
        $this->db->bind(":userid", $userid);
        $row = $this->db->single();
        return $row;
    }
    public function getTotalTopics(){
        $this->db->query("SELECT * FROM topics");
        $rows = $this->db->resultset();
        return $this->db->rowCount();
    }
    public function getTotalCategories(){
        $this->db->query("SELECT * FROM categories");
        $rows = $this->db->resultset();
        return $this->db->rowCount();
    }
    public function getTotalReplies(){
        $this->db->query("SELECT * FROM replies");
        $rows = $this->db->resultset();
        return $this->db->rowCount();
    }
    public  function getTopic($id){
        $this->db->query("Select topics.*, users.username, users.avatar FROM topics 
                          INNER JOIN users
                           ON topics.user_id = users.id
                           WHERE topics.id= :id");
        $this->db->bind(":id", $id);
        $row = $this->db->single();
        return $row;
    }
    public  function getReplies($topicid){
        $this->db->query("Select replies.*, users.*FROM replies 
                          INNER JOIN users
                           ON replies.user_id = users.id
                           WHERE replies.topic_id= :topicid
                           ORDER BY  create_date ASC");
        $this->db->bind(":topicid", $topicid);
        $results = $this->db->resultset();
        return $results;
    }
}