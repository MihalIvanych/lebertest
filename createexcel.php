<?php
require( __DIR__ . '/vendor/autoload.php' );
use Gogol\Lebertest\Excel\Excel as Excel;
if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email'])&& isset($_POST['count'])){
    new Excel($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['count']);
}
else{
    return "THERE IS NO ANY DATA!";
}