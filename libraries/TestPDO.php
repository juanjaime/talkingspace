<?php

/**
 * Created by PhpStorm.
 * User: jmontemayor
 * Date: 17/06/2016
 * Time: 11:44 AM
 */
class TestPDO
{
    private $db;
    public function __construct(){
        $this->db= new Database();
    }
    public function testfunction(){
        $this->db->query('SELECT * FROM users');
        $results = $this->db->resultset();
        print_r($results);
        return $results;
    }
    static function simpleFunction(){
        echo "Test function for functioning";
    }
}