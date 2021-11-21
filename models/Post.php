<?php

class Post {
    //DB Stuff
    private $conn;
    private $table = 'posts';

    //Post Properties
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;
    
}

?>