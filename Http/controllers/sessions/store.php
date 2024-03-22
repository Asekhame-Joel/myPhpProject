<?php
// use core\Validator;
use core\Authenticator;
use Http\Forms\LoginForm;

$form = LoginForm::Validate(
    $attributes = [
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ]
);

$signedIn = (new Authenticator)->attempt($attributes['email'], $attributes['password']);
if (!$signedIn) {
    $form->error('email', 'No matching email address and password!')->throw();
}
redirect('/');


