<div class="card">
  <div class="card-header">
    <div class="row justify-content-between align-items-center px-3">
      <span>Список задач</span>
      <?php $admin = new Admin('auto'); ?>
      <?php if(!$admin->check_auth()): ?>
        <a href="/login" class="btn btn-secondary">Вход</a>
      <?php else: ?>
        <a href="/logout" class="btn btn-secondary">Выход</a>
      <?php endif; ?>
    </div>
  </div>
  <div class="card-body">

    <?php
    $alert = get_alert();
    if($alert != null): ?>
      <div class="alert alert-<?php echo $alert['type']; ?>" role="alert">
        <?php echo $alert['message']; ?>
      </div>
    <?php endif; ?>

    <a class="btn btn-primary mb-3" href="/new">Новая задача</a>
    <?php if(!empty($data['jobs'])): ?>
      <div class="row justify-content-end px-3 mb-1">
        <a href="?page=<?php echo page()."&sort=".get_sort('name') ?>" class="btn btn-secondary btn-sm mx-1">По имени пользователя
          <?php
            if (get_sort() == 'name_up') echo "🠕";
            if (get_sort() == 'name_down') echo "🠓";
          ?>
        </a>
        <a href="?page=<?php echo page()."&sort=".get_sort('email') ?>" class="btn btn-secondary btn-sm mx-1">По email
          <?php
            if (get_sort() == 'email_up') echo "🠕";
            if (get_sort() == 'email_down') echo "🠓";
          ?>
        </a>
        <a href="?page=<?php echo page()."&sort=".get_sort('text') ?>" class="btn btn-secondary btn-sm mx-1">По содержанию
          <?php
            if (get_sort() == 'text_up') echo "🠕";
            if (get_sort() == 'text_down') echo "🠓";
          ?>
        </a>
      </div>
    <?php endif; ?>
    <div class="list-group">
      <?php if(empty($data['jobs'])): ?>
        <a href="#" class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <h5>Список задач пуст</h5>
          </div>
        </a>
      <?php else: ?>
        <?php foreach ($data['jobs'] as $job): ?>
          <a href="/view?id=<?php echo $job->id ?>" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1"><?php echo $job->name ?></h5>
              <small>Статус: <?php echo $job->status ?></small>
            </div>
            <p class="mb-1"><?php echo $job->text ?></p>
            <div class="d-flex w-100 justify-content-between">
              <small>Email: <?php echo $job->email ?></small>
              <?php if($job->edited == 1): ?>
                <small>Отредактировано администратором</small>
              <?php endif; ?>
            </div>
          </a>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
  <?php if(!empty($data['jobs']) && Job::pages() > 1): ?>
  <div class="card-footer flex justify-content-between align-items-center">
    <nav aria-label="Page navigation example" class="">
      <ul class="pagination m-0 justify-content-center">
        <li class="page-item">
          <a class="page-link" href="?page=<?php echo page('sub').get_link_sort() ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <?php for($i = 1; $i <= Job::pages(); $i++): ?>
          <li class="page-item <?php echo page() == $i ? 'active' : '' ?>"><a class="page-link" href="?page=<?php echo $i.get_link_sort() ?>"><?php echo $i; ?></a></li>
        <?php endfor; ?>
          <a class="page-link" href="?page=<?php echo page('add').get_link_sort() ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
<?php endif; ?>
</div>
