<pre>
<?php

interface Door{
    public function getDescription();
}

class WoodDoor implements Door{
    public function getDescription(){
        echo "I am wood door\n";
    }
}

class IronDoor implements Door{
    public function getDescription(){
        echo "I am iron door\n";
    }
}

interface DoorCreator{
    public function getDescription();
}

class WoodCreator implements DoorCreator{
    public function getDescription(){
        echo "I can create only wood doors\n";
    }
}
class IronCreator implements DoorCreator{
    public function getDescription(){
        echo "I can create only iron doors\n";
    }
}



interface DoorFactory{
    public function makeDoor();
    public function makeCreatorOfDoor();
}

class WoodenFactory implements DoorFactory{
    public function makeDoor(){
        return new WoodDoor();
    }
    public function makeCreatorOfDoor(){
        return new WoodCreator();
    }    
}

class IronFactory implements DoorFactory{
    public function makeDoor(){
        return new IronDoor();
    }
    public function makeCreatorOfDoor(){
        return new IronCreator();
    }    
}

//execute
$woodenFactory = new WoodenFactory();
$door = $woodenFactory->makeDoor();
$expert = $woodenFactory->makeCreatorOfDoor();
$door->getDescription();
$expert->getDescription();

$ironFactory = new IronFactory();
$door = $ironFactory->makeDoor();
$expert = $ironFactory->makeCreatorOfDoor();
$door->getDescription();
$expert->getDescription();



var_dump($woodenFactory);
var_dump($ironFactory);



