<?php
//how you require the files matters,
//for example, calling functions.php before views/about.views.php wont render the desired html page
view("about.view.php", [
    'heading' => 'About Us',
]);