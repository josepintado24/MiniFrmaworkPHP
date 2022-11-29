<?php
$ruta = !empty($_GET['_url']) ? $_GET['_url'] : "Home/index";
$array = explode("/", $ruta);
array_shift($array);
$controller = $array[0];
$method = $array[1];
$parametro = "";
if (!empty($array[1])) {
    if (!empty($array[1] != '')) {
        $method = $array[1];
    }
}
if (!empty($array[2])) {
    if (!empty($array[2] != '')) {
        for ($i = 2; $i < count($array); $i++) {
            $parametro .= $array[$i] . ",";
        }
        $parametro = trim($parametro,',');
    }
}

require_once 'Config/App/autoload.php';
$dicontroller = "controlller/$controller.php";
if (file_exists($dicontroller)) {
    require_once $dicontroller;
    $controller = new $controller();
    if (method_exists($dicontroller, $method)) {
        $controller->$method($parametro);
    }
    else{
        echo 'No existe el metodo';
    }
}else{
    echo 'No existe el controladorsssssss';
}

// echo $dicontroller;
