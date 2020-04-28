<?php

interface UserLogic {
    public function show_user_info();
}

class User implements UserLogic {
    protected $name;
    protected $surname;
    protected $password;

    public function __construct($name, $surname, $password) {
        $this->name = $name;
        $this->surname = $surname;
        $this->password = $password;
    }

    public function __clone() {
        echo "__Clone has been created!" . "<br>";
    }

    public function __get($name) {
        echo "__You get $name" . "<br>";
    }

    public function __set($name, $value) {
        echo "__You set $name to $value" . "<br>";
    }

    public function show_user_info() {
        echo "Name: $this->name Surname: $this->surname";
    }
}

class Moder extends User {
    private $mode;
    private $rights;

    public function __construct($name, $surname, $password, $mode, $rights) {
        parent::__construct($name, $surname, $password);
        $this->mode = $mode;
        $this->rights = $rights;
    }

    public function show_user_info() {
        parent::show_user_info();
        echo "$this->mode mode is used. Rights: $this->rights";
    }
}

$user1 = new User("Artem", "Lebedev", "1234");
var_dump($user1);
echo "<br>";
$moder1 = new Moder("Artem123", "Lebedev123", "123", "admin", "true");
var_dump($moder1);
echo "<br>";
$moder2 = clone $moder1;
$moder2->name = "Ivan";
$moder2->login;
$moder2->login = "Ivan132";

