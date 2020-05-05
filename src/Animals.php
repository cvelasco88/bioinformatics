<?php
namespace HelloWorld;

use HelloWorld\Sample\Dog;
use HelloWorld\Sample\Cat;

class Animals {
  public static function sayHelloWorld() {
    $str = "";
    $str .= "animal says: " . Dog::sayHelloWorld();
    $str .= "animal says: " . Cat::sayHelloWorld();
    return $str . "\n";
  }
}
