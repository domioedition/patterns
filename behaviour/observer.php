<?php


interface Observable{
  function attach(Observer $observer);
  function detach(Observer $observer);
  function notify();
}

interface Observer{
  function update(Observable $observer);
}

class Login implements Observable
{

  private $observers = array();
  private $storage;

  const LOGIN_USER_UNKNOWN = 1;
  const LOGIN_WRONG_PASS = 2;
  const LOGIN_ACCESS = 3;

  function __construct(){
    $this->observers = array();
  }

  function attach(Observer $observer){
    $this->observers[] = $observer;
  }

  function detach(Observer $observer){
    $this->observers = array_filter($this->observers, function($a) use ($observer){
      return(!($a === $observer));
    });
  }

  function notify(){
    foreach($this->observers as $obs){
      $obs->update($this);
    }
  }

  function handleLogin($user, $pass, $ip){
    $isvalid = false;
    switch(rand(1,3)){
      case 1:
          $this->setStatus(self::LOGIN_ACCESS,  $user, $ip);
          $isvalid = true;
        break;
      case 2:
          $this->setStatus(self::LOGIN_WRONG_PASS,  $user, $ip);
          $isvalid = false;
        break;
      case 3:
          $this->setStatus(self::LOGIN_USER_UNKNOWN,  $user, $ip);
          $isvalid = false;
        break;
    }
    $this->notify();
    return $isvalid();
  }
}


class SecurityMonitor implements Observer
{

  function update(Observable $observable){
    $status = $observable->getStatus();
    if($status[0] == Login::LOGIN_WRONG_PASS){
      print __CLASS__ . "\t message send to sysadmin";
    }
  }
}
$login  = new Login();
var_dump($login->attach(new SecurityMonitor));
