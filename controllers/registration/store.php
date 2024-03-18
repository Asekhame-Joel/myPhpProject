<?php 
use core\Validator;
use core\Database;
use core\App;

$email = $_POST['email'];
$password = $_POST['password'];

//validate the form
$errors = [];
if (!Validator::email($email)){
$errors['email'] = "Please provide a valid email address";
}

if (!Validator::string($password, 7, 255)){
    $errors['password'] = "Please provide a  minimum of 7 character";
    }

if(! empty($errors)){
    return view('registration/create.view.php',[
        'errors' => $errors 
    ]);
}
$db = App::resolve(Database::class);
$user = $db->Query('select * from user where email = :email',[
    'email' => $email
])->find();

//if yes, redirect to a login page
if($user){
    header('location: /');
    exit();   
}else{
     //if not, create it and login the user
    $db->Query('INSERT INTO user(email, password) VALUES(:email, :password)',[
    'email' => $email,
    'password' => password_hash($password, PASSWORD_DEFAULT)

    ]);
}
login($user);


header('location: /');
exit(); 