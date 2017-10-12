<pre>
<?php


echo __FILE__."<hr>";


interface Door{
    public function getWidth();
    public function getHeight();
}

class WoodenDoor implements Door{
    public $wight;
    public $height;    
    
    public function __construct($w, $h){
        $this->width = $w;
        $this->height = $h;        
    }
    
    public function getWidth() {
        return $this->width;
    }
    public function getHeight() {
        return $this->height;
    }
}

class WoodenFactory{
    public static function makeDoor($w,$h){
        return new WoodenDoor($w, $h);
    }
}


$door = WoodenFactory::makeDoor(45,66);
echo "Width: ".$door->getWidth();
echo "\n";
echo "Height: ".$door->getHeight();






?>