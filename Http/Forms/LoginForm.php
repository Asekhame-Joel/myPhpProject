<?php 

namespace Http\Forms;
use core\Validator;
use core\Database;
use core\App;
class LoginForm{
protected $errors = [];
public function Validate($email, $password){

if (!Validator::email($email)){
$this->errors['email'] = "Please provide a valid email address";
}

if (!Validator::string($password)){
    $this->errors['password'] = "Please provide a  valid password";
    }

    return empty($this->errors);
}
public function errors(){
    return $this->errors;
}
public function error($field, $message){
$this->errors[$field] = $message;
}

}