<?php

trait SayHello {
    public static function sayHello() {
            echo "Hello ";
    }
}

trait SayWorld {
    public static function sayWorld() {
        echo "world!";
    }
}

class HelloWorld  {
    use SayHello, SayWorld;
    public static $myFirstClass = false;
    public static function changeMyFirstClass() {
        self::$myFirstClass = !self::$myFirstClass;
    }
}

HelloWorld::sayHello();
HelloWorld::sayWorld();
echo "<br>";
echo HelloWorld::$myFirstClass."<br>";
HelloWorld::changeMyFirstClass();
echo HelloWorld::$myFirstClass."<br>";
