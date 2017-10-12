<pre>
<?php

final class Singleton{
    private static $instance;
    private function __construct() {
        
    }
    public static function createInstance(){
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __clone(){}
    private function __wakeup(){}
    
}


$db1 = Singleton::createInstance();
$db2 = Singleton::createInstance();
var_dump($db1);
var_dump($db2);