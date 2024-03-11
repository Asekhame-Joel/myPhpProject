<?php
use core\Database;

$config = require base_path("config.php");
$db = new Database($config['database']);
$currentuserID = 1;

    $note = $db->Query(
        "SELECT * FROM notes WHERE  id = :id",
        [
            'id' => $_GET['id']
        ]
    )->findorFail();
    authorize($note['user_id'] === $currentuserID);


    view("notes/show.view.php", [
        'heading' => 'Note',
        'note' => $note
    ]);
