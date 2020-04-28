<?php
abstract class User {
    public $name = "username";
    public $surname = "user_surname";
    abstract public function getStatus();
}

class Admin extends User {
    public function getStatus() {
        echo "$this->name $this->surname ";
        echo "admin"."<br>";
    }
}
//$user = new User();
$admin = new Admin();
$admin->getStatus();
