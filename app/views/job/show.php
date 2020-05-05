<div class="card">
  <div class="card-header">
    <div class="row justify-content-between align-items-center px-3">
      <span>Редактирование задачи</span>
      <a href="/" class="btn btn-secondary">Назад</a>
    </div>
  </div>
  <div class="card-body">
    <form action="/edit?id=<?php echo $data['job']->id ?>" method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Имя пользователя:</label>
        <input name="name" type="text" class="form-control <?php echo has_error('name') ? 'is-invalid' : ''?> " value="<?php echo $data['job']->name ?>">
        <?php if(has_error('name')): ?>
          <div class="invalid-feedback"> <?php echo error('name'); ?> </div>
        <?php endif; ?>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email:</label>
        <input name="email" type="text" class="form-control <?php echo has_error('email') ? 'is-invalid' : ''?>" value="<?php echo $data['job']->email ?>">
        <?php if(has_error('email')): ?>
          <div class="invalid-feedback"> <?php echo error('email'); ?> </div>
        <?php endif; ?>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Текст задачи:</label>
        <textarea name="text" class="form-control <?php echo has_error('text') ? 'is-invalid' : ''?>" rows="3" ><?php echo $data['job']->text ?></textarea>
        <?php if(has_error('text')): ?>
          <div class="invalid-feedback"> <?php echo error('text'); ?> </div>
        <?php endif; ?>
      </div>
      <div class="custom-control custom-checkbox mb-3">
        <input type="checkbox" name="success" class="custom-control-input" id="customControlValidation1" <?php echo $data['job']->status == 'Выполнено' ? 'checked' : '' ?>>
        <label class="custom-control-label" for="customControlValidation1">Задача выполненена</label>
      </div>
      <button type="submit" class="btn btn-primary ml-auto">Сохранить</button>
    </form>
  </div>
</div>
