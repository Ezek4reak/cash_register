<?php
    date_default_timezone_set('Africa/Lagos');

    require_once('libs'.DIRECTORY_SEPARATOR.'config.php');
    //TODO
    $router = new Router($_SERVER['REQUEST_URI']);
    $controller = $router->createController();
    if($controller){
        $controller->executeAction();
        $data = $controller->getData();
        $data2 = $controller->getData2();
        $data3 = $controller->getData3();
        $title = $controller->getTitle();
        $view = $controller->getView();
    }
    include(VIEW_PATH.'defaultView.php');

