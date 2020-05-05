<?php
class AuthController
{
  public function login() {
    $admin = new Admin('login', $_POST['login'], $_POST['password']);
    if (!$admin->check_auth()) return back();
    alert('Вы успешно вошли в систему!', 'success');
    return redirect('/');
  }

  public function show() {
    return view('auth/login', ['title' => 'Авторизация']);
  }
  public function logout() {
    $admin = new Admin('auto');
    $admin->logout();
    alert('Вы успешно покинули систему', 'success');
    return redirect('/');
  }
}
