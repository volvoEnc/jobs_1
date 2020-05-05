<div class="card">
  <div class="card-header">
    <div class="row justify-content-between align-items-center px-3">
      <span>Новая задача</span>
      <a href="/" class="btn btn-secondary">Назад</a>
    </div>
  </div>
  <div class="card-body">
    <form action="/new" method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Имя пользователя:</label>
        <input name="name" type="text" class="form-control <?php echo has_error('name') ? 'is-invalid' : ''?> ">
        <?php if(has_error('name')): ?>
          <div class="invalid-feedback"> <?php echo error('name'); ?> </div>
        <?php endif; ?>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email:</label>
        <input name="email" type="text" class="form-control <?php echo has_error('email') ? 'is-invalid' : ''?>">
        <?php if(has_error('email')): ?>
          <div class="invalid-feedback"> <?php echo error('email'); ?> </div>
        <?php endif; ?>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Текст задачи:</label>
        <textarea name="text" class="form-control <?php echo has_error('text') ? 'is-invalid' : ''?>" rows="3"></textarea>
        <?php if(has_error('text')): ?>
          <div class="invalid-feedback"> <?php echo error('text'); ?> </div>
        <?php endif; ?>
      </div>
      <button type="submit" class="btn btn-primary ml-auto">Создать</button>
    </form>
  </div>
</div>
