<?php

// Autoload files using the Composer autoloader.
require_once __DIR__ . '/../vendor/autoload.php';

use HelloWorld\Greetings;
use HelloWorld\Animals;
use HelloWorld\Sample\Dog;
use HelloWorld\Sample\Cat;

echo Greetings::sayHelloWorld();
echo Dog::sayHelloWorld();
echo Cat::sayHelloWorld();
echo "---" . "\n";
echo Animals::sayHelloWorld();
