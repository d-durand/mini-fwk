<?php

class Router {

  private static $routes = array();
  private static $inst;
  const NO_ROUTE = 1;

  public static function get_instance(){
      if (self::$inst==NULL)
        self::$inst=new Router;
      return self::$inst;
  }

  static public function addRoute(Route $route) {
    if (!in_array($route, self::$routes)) {
      self::$routes[] = $route;
    }
  }

  static public function getRoute($url) {
    /* @var $route Route */
    foreach (self::$routes as $route) {
      if(($varsValues = $route->match($url)) !== false) {
        $route->setVars($varsValues);
        return $route;
      }
    }
    throw new \RuntimeException('Aucune route ne correspond à l\'URL', self::NO_ROUTE);
  }

  static public function generate($name, $params = []) {
    /* @var $route Route */
    foreach (self::$routes as $route) {
      if($name == $route->getName()) {
        return $route->generateUrl($params);
      }
    }
    echo "poney<br>";
    throw new \RuntimeException('Aucune route ne correspond à l\'URL ' . $name, self::NO_ROUTE);
  }


}
