<?php

/**
 * Handling Errors
 */
class ErrorController
{
  public function NotFound() {
    return view('NotFound', 'Страница не найдена!');
  }
}



 ?>
