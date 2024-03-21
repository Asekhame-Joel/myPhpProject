<?php

// use core\Validator;
use core\Authenticator;
use Http\Forms\LoginForm;
use core\Session;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm;
if ($form->Validate($email, $password)) {
    $auth = new Authenticator();

if ($auth->attempt($email, $password)) {
    redirect('/');
}else{
    $form->error('email', 'No matching email address and password!');

}
}
Session::flash('errors', $form->errors());
redirect('/login');


// return view('sessions/create.view.php', [
//     'errors' => $form->errors()
// ]);
 
// return view('sessions/create.view.php', [
//         'errors' => [
//             'email' => 'No matching email address and password!'
//         ]
//     ]);

;


// //match the user


// //verify password 

