<?php

function view($path, $data = ['title' => 'JOBS']) {
  include __DIR__."/app/views/header.php";
  include __DIR__."/app/views/$path.php";
  include __DIR__."/app/views/footer.php";
  return;
}

function redirect($path = "/") {
  return header("Location: $path");
}
function back() {
  $_SESSION['back'] = 'back';
  return header("Location: " . $_SERVER['HTTP_REFERER']);
}

function page($act = null) {
  $p = (int) empty($_GET['page']) ? 1 : $_GET['page'];
  if ($act == null)
    return $p;
  else {
    if ($act == 'add')
      return $p + 1 > Job::pages() ? Job::pages() : $p + 1;
    elseif ($act == 'sub')
      return $p - 1 <= 0 ? 1 : $p - 1;
  }
}
function get_sort($name = null) {
  if ($name == null)
    return empty($_GET['sort']) ? '' : $_GET['sort'];
  else {
    if (empty($_GET['sort']))
      return $name.'_down';
    if (strpos($_GET['sort'], 'up'))
      return $name.'_down';
    if (strpos($_GET['sort'], 'down'))
      return $name.'_up';
  }
}

function get_link_sort() {
  return get_sort() == null ? '' : "&sort=" . get_sort();
}

function alert($message, $type = 'secondary') {
  return $_SESSION['alert'] = ['message' => $message, 'type' => $type];
}

function get_alert() {
  $p = empty($_SESSION['alert']) ? null : $_SESSION['alert'];
  unset($_SESSION['alert']);
  return $p;
}

function error($name, $text = null) {
  if (empty($text))
    if (!empty($_SESSION['errors'][$name]))
      return $_SESSION['errors'][$name];
    else
    return false;
  else
    return $_SESSION['errors'][$name] = $text;
}
function has_error($name) {
  return empty($_SESSION['errors'][$name]) ? false : true;
}
function check_errors() {
  return empty($_SESSION['errors']) ? false : true;
}

function auth() {
  $admin = new Admin('auto');
  if($admin->check_auth()) return true;
  return false;
}


function unset_h() {
  unset($_SESSION['back']);
}
function unset_f() {
  if (empty($_SESSION['back']))
    unset($_SESSION['errors']);
}
 ?>
