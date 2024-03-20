<?php

//log user out
namespace core;
use core\Authenticator;
use Http\Forms\LoginForm;

logout();
redirect('/');
exit();