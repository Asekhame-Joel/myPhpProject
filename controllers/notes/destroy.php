<?php
use core\App;
use core\Database;

$db = App::resolve(Database::class);

$currentuserID = 1;

$note = $db->Query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();
authorize($note['user_id'] === $currentuserID);
$db->Query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);
header('location: /notes');
exit();