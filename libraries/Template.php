<?php

/**
 * Created by PhpStorm.
 * User: jmontemayor
 * Date: 09/06/2016
 * Time: 11:57 AM
 */
class Template
{
    protected $template;
    protected $vars = array();

    public function __construct($template)
    {
        $this->template=$template;
    }
    public function __get($key)
    {
        // TODO: Implement __get() method.
        return $this->vars[$key];
    }
    public function __set($key, $value)
    {
        // TODO: Implement __set() method.
        $this->vars[$key]=$value;

    }
    public function __toString()
    {

        extract($this->vars);
        chdir(dirname($this->template));
        ob_start();
        include basename($this->template);

        //echo $this->template;

        return ob_get_clean();


    }

}