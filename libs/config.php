<?php
/**
 * Created by PhpStorm.
 * User: Ezekiel
 * Date: 02-May-18
 * Time: 10:18 AM
 */
session_start();

    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT_PATH', DS);
    define('ROOT_URL', 'http://localhost'.DS);
    define('CNTRL_PATH','controllers'.DS);
    define('MODEL_PATH', 'models'.DS);
    define('LIBS_PATH', 'libs'.DS);
    define('CLASS_PATH', 'libs'.DS.'base_classes'.DS);
    define('VIEW_PATH', 'views'.DS);
    define('UPLOAD_PATH', ROOT_PATH.'assets'.DS.'uploads'.DS);
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'accounting');
    /*
     * The following paths will be shown in the browser that doesn't understand system's directory separator
     */
    define('CSS_PATH', 'http://localhost/assets/css/');
    define('JS_PATH', 'http://localhost/assets/js/');
    define('IMG_PATH', 'http://localhost/assets/img/');


    spl_autoload_register(function ($class){
        $control_class = CNTRL_PATH.str_ireplace('Controller','', $class).'.php';
        $model_class = MODEL_PATH.str_ireplace('Model','', $class).'.php';
        $base_class = CLASS_PATH.$class.'.php';
        if(file_exists($control_class)){
            require_once ($control_class);
        }elseif (file_exists($model_class)){
            require_once ($model_class);
        }elseif (file_exists($base_class)){
            require_once ($base_class);
        }else{
            App::setMsg('Requested "'.$class.'" Class Not Found!','error');
        }
    });