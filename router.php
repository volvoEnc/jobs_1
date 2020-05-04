<?php
/**
 * Router
 */
class Router
{

  protected $routes = [
    ['path' => "/", "method" => "GET", "controller" => "JobController@index"]
  ];

  public $http_method;
  public $uri;
  public $controller = "ErrorController";
  public $method = "NotFound";

  public function __construct(Type $foo = null)
  {
    $this->http_method = $_SERVER['REQUEST_METHOD'];
    $this->uri = $_SERVER['REDIRECT_URL'];
  }

  public function find() {
    foreach ($this->routes as $route) {
      if ($route['path'] == $this->uri && $route['method'] == $this->http_method) {
        $full_name = $route['controller'];
        $full_name_array = explode("@", $full_name);
        $this->controller = $full_name_array[0];
        $this->method = $full_name_array[1];


        break;
        return [$this->controller, $this->method];
      }
    }
    return [$this->controller, $this->method];
  }

}



 ?>
