<?php

/**
 * Job
 */
class Job
{
  static public function create() {
    $q = $GLOBALS['db']->prepare("INSERT INTO `jobs` (`name`, `email`, `text`, `status`, `edited`) VALUES (:name, :email, :text, 'Активно', 0)");

    $q->bindValue(":name", htmlspecialchars($_POST['name']), PDO::PARAM_STR);
    $q->bindValue(":email", htmlspecialchars($_POST['email']), PDO::PARAM_STR);
    $q->bindValue(":text", htmlspecialchars($_POST['text']), PDO::PARAM_STR);

    $q->execute();
  }

  static public function all() {
    $s = 'id';
    $t = 'DESC';

    if (strpos(get_sort(), 'name') === 0) $s = 'name';
    if (strpos(get_sort(), 'email') === 0) $s = 'email';
    if (strpos(get_sort(), 'text') === 0) $s = 'text';

    if (strpos(get_sort(), 'up')) $t = 'ASC';
    if (strpos(get_sort(), 'down')) $t = 'DESC';

    $page = page();
    $offset = 3 * ($page - 1);
    $sth = $GLOBALS['db']->prepare("SELECT * FROM `jobs` ORDER BY `$s` $t LIMIT $offset,3");
    $sth->execute();
    $jobs = $sth->fetchAll(PDO::FETCH_CLASS);
    return $jobs;
  }

  static public function find() {
    $id = (int) $_GET['id'];
    $q = $GLOBALS['db']->prepare("SELECT * FROM `jobs` WHERE `id`=:id");
    $q->bindValue(":id", $id, PDO::PARAM_INT);
    $q->execute();
    return $q->fetchObject();
  }

  static public function edit() {
    $job = Job::find();
    $edited;
    $status = empty($_POST['success']) ? 'Активно' : 'Выполнено';
    if ($job->text != $_POST['text']) $edited = ", `edited`= 1";
    $id = (int) $_GET['id'];
    $q = $GLOBALS['db']->prepare("UPDATE `jobs` SET `name`= :name, `email`= :email, `text`= :text $edited, `status`= '$status' WHERE `id`= $id");
    $q->bindValue(":name", htmlspecialchars($_POST['name']), PDO::PARAM_STR);
    $q->bindValue(":email", htmlspecialchars($_POST['email']), PDO::PARAM_STR);
    $q->bindValue(":text", htmlspecialchars($_POST['text']), PDO::PARAM_STR);
    $q->execute();
    return Job::find();
  }



  static public function count() {
    $sth = $GLOBALS['db']->prepare("SELECT COUNT(*) as count FROM `jobs`");
    $sth->execute();
    return $sth->fetchObject();
  }
  static public function pages() {
    return ceil(self::count()->count / 3);
  }

}
