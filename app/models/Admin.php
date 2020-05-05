<?php
class Admin
{

  private $login = "admin";
  private $password = '123';
  private $token = 'Iduh762hd22';
  private $auth = false;

  function __construct($type = 'login', ...$arg)
  {
    if ($type == 'login') {
      if(empty($arg[0]))
        error('login', 'Введите логин');
      if(empty($arg[1]))
        error('password', 'Введите пароль');

      if(check_errors()) return;

      if($arg[0] != $this->login || $arg[1] != $this->password)
        error('auth', 'Неправильные реквизиты доступа');
      else {
        $this->auth = true;
        $_SESSION['auth'] = $this->token;
      }
    }
    elseif($type == 'auto') {
      if (!empty($_SESSION['auth']) && $_SESSION['auth'] == $this->token)
        $this->auth = true;
    }
  }

  public function check_auth() {
    return $this->auth;
  }
  public function logout() {
    unset($_SESSION['auth']);
    $this->auth = false;
  }
}
