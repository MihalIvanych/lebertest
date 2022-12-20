<?php

namespace Gogol\Lebertest\Watermark;
class Watermark
{
protected string $type;
protected int $num;

    /**
     * Watermark constructor.
     * @param $type
     * @param $num
     */
    public function __construct($type, $num){
    $this->type=$type;
    $this->num=$num;
    $this->watermarkIt();
}

    /**
     * Watermark image and save it
     * @throws \Exception
     */
    protected function watermarkIt(){
    try {
        $type=$this->type;
        // Create a new SimpleImage object
        $image = new \claviska\SimpleImage();
        $image
            ->fromFile($_SERVER['DOCUMENT_ROOT'].'/files/images/'.$type.'.'.$type) // Origin file
            ->autoOrient() //orientation
            ->overlay($_SERVER['DOCUMENT_ROOT'] .'/files/images/watermark.png', 'top right', 1, -100, 100)  // add a watermark image
            ->toFile($_SERVER['DOCUMENT_ROOT'] .'/files/images/generated/'.$this->num.'.'.$type); //save to file
    } catch(Exception $err) {
        // Handle errors
        echo $err->getMessage();
    }
}
}