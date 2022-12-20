<?php
require( __DIR__ . '/vendor/autoload.php' );
use Gogol\Lebertest\Watermark\Watermark as Watermark;
if(isset($_POST['type']) && isset($_POST['num'])){
    new Watermark($_POST['type'], $_POST['num']);
}
else{
    return "THERE IS NO ANY DATA!";
}