<?php
require( __DIR__ . '/vendor/autoload.php' );
use Gogol\Lebertest\Employee\CreateEmployee as CreateEmployee;
if(isset($_POST['name']) && isset($_POST['age']) && isset($_POST['salary'])){
    new CreateEmployee($_POST['name'], $_POST['age'], $_POST['salary']);
}
else{
    return "THERE IS NO ANY DATA!";
}
?>
