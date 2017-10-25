<?php


$obj1 = new StdClass();
$obj2 = new StdClass();

$obj1->value = 1;
$obj2->value = 1;

function f1($o) {
  $o = 100;
  echo $o;
}

function f2($o) {
  $o->value = 100;
  echo $o->value;
}

f1($obj1);
f2($obj2);

var_dump($obj1);
var_dump($obj2);
