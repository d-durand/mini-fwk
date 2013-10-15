<?php
/*
* Chargeur de classes
*/
function __autoload_my_classes($name) {
    if(file_exists(CLASSES . "/$name.class.php"))
    	require_once( CLASSES . "/$name.class.php");
    else if(file_exists("lib/$name.class.php"))
    	require_once("lib/$name.class.php");
    else if(file_exists("blocs/$name.bloc.php"))
    	require_once("blocs/$name.bloc.php");
}

spl_autoload_register('__autoload_my_classes');

?>