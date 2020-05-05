<div class="card col-6 offset-3 p-0">
  <div class="card-header">
    <div class="row justify-content-between align-items-center px-3">
      <span>Вход</span>
      <a href="/" class="btn btn-secondary btn-sm">Назад</a>
    </div>
  </div>
  <div class="card-body">
    <form action="/login" method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Логин:</label>
        <input name="login" type="text" class="form-control <?php echo has_error('login') ? 'is-invalid' : ''?> ">
        <?php if(has_error('login')): ?>
          <div class="invalid-feedback"> <?php echo error('login'); ?> </div>
        <?php endif; ?>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Пароль:</label>
        <input name="password" type="password" class="form-control <?php echo has_error('password') ? 'is-invalid' : ''?>">
        <?php if(has_error('password')): ?>
          <div class="invalid-feedback"> <?php echo error('password'); ?> </div>
        <?php endif; ?>
        <?php if(has_error('auth')): ?>
          <small class="text-danger"> <?php echo error('auth'); ?> </small>
        <?php endif; ?>
      </div>
      <button type="submit" class="btn btn-primary ml-auto">Войти</button>
    </form>
  </div>
</div>
