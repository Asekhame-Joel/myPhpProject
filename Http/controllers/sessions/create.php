<?php 
use core\Session;

$_SESSION =[];

view("sessions/create.view.php",[
    'errors' => Session::get('errors')
]);