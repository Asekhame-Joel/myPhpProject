<?php
//connect to database
use core\Validator;
use core\App;
use core\Database;

$db = App::resolve(Database::class);

$currentuserID = 1;

//find the corresponding note
$note = $db->Query(
    "SELECT * FROM notes WHERE  id = :id",
    [
        'id' => $_POST['id']
    ]
)->findorFail();

//autorize the current user to edit note
authorize($note['user_id'] === $currentuserID);

//validate note

$errors =[];

if (! Validator::string($_POST['body'], 1, 100)){
    $errors['body'] = "Body of no more than 100 words is required";
}

//if  errors, reload the edit page and display errors
if(count($errors)){
    return view("notes/edit.view.php", [
        'heading' => 'Edit Note',
        'errors' => $errors, 
        'note' => $note
    ]);
}
$db->Query("update notes set body = :body where id = :id", [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

//redirect the user after updating
header('location: /notes');
die();
