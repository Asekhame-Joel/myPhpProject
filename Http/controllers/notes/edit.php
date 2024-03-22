<?php
use core\App;
use core\Database;

$db = App::resolve(Database::class);

$currentuserID = 13;

    $note = $db->Query(
        "SELECT * FROM notes WHERE  id = :id",
        [
            'id' => $_GET['id']
        ]
    )->findorFail();
    authorize($note['user_id'] === $currentuserID);

view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'errors' => [], 
    'note' => $note
]);
 