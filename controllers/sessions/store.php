<?php

use core\Validator;
use core\Database;
use core\App;
$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (!Validator::email($email)){
$errors['email'] = "Please provide a valid email address";
}

if (!Validator::string($password)){
    $errors['password'] = "Please provide a  valid password";
    }

if(! empty($errors)){
    return view('sessions/create.view.php',[
        'errors' => $errors 
    ]);
}

//match the user
$user = $db->Query('select * from user where email = :email', [
    'email' => $email
])->find();

if($user){
    
    if(password_verify($password, $user['password'])){

        login([
            'email' => $email
        ]);
        
        header('location: /');
        exit();
        }
}

//verify password 
return view('sessions/create.view.php',[
    'errors' => [
        'email' => 'No matching email address and password !'
    ] 
]);

