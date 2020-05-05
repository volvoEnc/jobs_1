<?php
class JobController
{
  public function index() {
    return view('job/list', [
      'title' => 'Список задач',
      'jobs' => Job::all(),
      'count' => Job::count()
    ]);
  }

  public function create() {
    return view('job/create', [ 'title' => 'Новая задача' ]);
  }

  public function store() {
    if (empty($_POST['name']))
      error('name', 'Введите имя');
    if (empty($_POST['email']))
      error('email', 'Введите email');
    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
      error('email', 'Введите корректный email');
    if (empty($_POST['text']))
      error('text', 'Введите текст');
    if (check_errors())
        return back();
    Job::create();
    alert('Новая задача успешно создана!', 'success');
    return redirect('/');
  }

  public function show() {
    if(!auth()) {
      alert('Для выполнения данного действия необходима авторизация!', 'danger');
      return redirect("/");
    }
    if (empty($_GET['id']))
      return back();

    $job = Job::find();
    return view('job/show', [
      'title' => "Задача ".$job->id,
      'job' => $job
    ]);
  }


  public function edit() {
    if(!auth()) {
      alert('Для выполнения данного действия необходима авторизация!', 'danger');
      return redirect("/");
    }
    if (empty($_GET['id']))
      return back();

    $job = Job::edit();
    alert('Задача успешно отредактирована!', 'success');
    return redirect("/");
  }


}



 ?>
