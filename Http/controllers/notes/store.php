<?php 
use core\Validator;
use core\Database;
use core\App;

$db = App::resolve(Database::class);
$errors =[];


    if (!Validator::string($_POST['body'], 1, 100)){
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
            'user_id' => 13
        ]);
    }

header('location: /notes');
die();


