<?php


class Router {

    private $routeList;

    //put your code here
    public function __construct() {
        $this->routes = include "./Config/routes.php";
    }

    public function run() {
        $curRoute = trim($_SERVER["REQUEST_URI"], "/");
        foreach ($this->routes as $routerContent => $value) {


            if (preg_match("~$routerContent~", $curRoute)) {
                $value=preg_replace("~$routerContent~", $value, $curRoute);
                $uriParts = explode("/", $value);
                $controllerName=ucfirst(array_shift($uriParts)."Controller");
                $actionName="action".ucfirst(array_shift($uriParts));
             
                include_once("./Controllers/".$controllerName.".php");
               
                $controllerName::$actionName(array_shift($uriParts));
                break;
            }
        }
    }

}
