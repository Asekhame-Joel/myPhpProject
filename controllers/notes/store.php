<?php 
use core\Validator;
use core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);
$errors =[];


    if (!Validator::string($_POST['body'], 1, 20)){
        $errors['body'] = "Body of no more than 20 words is required";
    }


    if(! empty($errors)){
        return view("notes/create.view.php",[
            'heading' => 'Create Note',
            'errors' => $errors
        ]);
    }
    
    if (empty($errors)) {

        $db->Query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }

header('location: /notes');
die();


