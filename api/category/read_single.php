<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Category.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate category object
$category = new Category($db);

// Get ID
$category->id = isset($_GET['id']) ? $_GET['id'] : die();

// Category query
$result = $category->readSingle();

// Create array
$category_arr = array(
    'id' => $category->id,
    'name' => $category->name,
    'created_at' => $category->created_at
);

// Make JSON
print_r(json_encode($category_arr));

?>