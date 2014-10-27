<?php
header('Content-type:text/html; charset=utf-8');
ini_set('display_errors',1);
//--------------------------------------------------------------------------
//gestionnaire d'exception
//--------------------------------------------------------------------------
set_exception_handler('exc');
set_error_handler('erreur');
$debugs = array();

//--------------------------------------------------------------------------
// empêcher les affichages dans les modules (echo, print, etc)
//--------------------------------------------------------------------------
ob_start();

//--------------------------------------------------------------------------
//paramètres et chargeur de classes
//--------------------------------------------------------------------------
require_once("conf/Params.ini.php");
require_once("conf/Functions.ini.php");
require_once("lib/Autoload.php");

//--------------------------------------------------------------------------
//classes outils
//--------------------------------------------------------------------------

//moteur de template
require_once('lib/Smarty-3.1.1/libs/Smarty.class.php');
$tpl = new Smarty();
$tpl->template_dir = 'templates/';
$tpl->compile_dir = 'lib/tpl/templates_c/';
$tpl->config_dir = 'lib/tpl/configs/';
$tpl->cache_dir = 'lib/tpl/cache/';


//Objet Session
$session=Session::get_instance();

//Objet Site
$site=Site::get_instance($session);

//Objet Base de données (PDO)
try{
	$db=DB::get_instance();
}catch(Exception $e){
	$site->ajouter_message("Impossible de se connecter sur la base de données ".DB_HOST."/".BASE,ALERTE);
	$site->ajouter_message("Editer les paramètres du fichier <b>conf/Params.ini.php</b>",ALERTE);
	$db=null;
}

//Objet Requete
$request=Request::get_instance();

// Objet Router
$router = Router::get_instance();

$xml = new \DOMDocument;
$xml->load(__DIR__ . '/conf/routes.xml');

$routes = $xml->getElementsByTagName('route');

// On parcourt les routes du fichier XML.
foreach ($routes as $route) {
  $vars = array();

  // On regarde si des variables sont présentes dans l'URL.
  if ($route->hasAttribute('vars')) {
    $vars = explode(',', $route->getAttribute('vars'));
  }

  // On ajoute la route au routeur.
  $router::addRoute(new Route($route->getAttribute('name'), $route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
}

// On récupère la route correspondante à l'URL.
$matchedRoute = $router::getRoute($_SERVER['REQUEST_URI']);

// On ajoute les variables de l'URL au tableau $_GET.
$_REQUEST = array_merge($_REQUEST, $matchedRoute->getVars());

//Stocke ces objets dans un tableau
$config=array('db'=>$db,'tpl'=>$tpl,'session'=>$session,'req'=>$request,'requete'=>$request,'site'=>$site,'router'=>$router);


//--------------------------------------------------------------------------
//Chargement du menu
//--------------------------------------------------------------------------
include ("conf/Menus.ini.php");
$tpl->assign("menus",$menus);


//--------------------------------------------------------------------------
//Chargement du module
//--------------------------------------------------------------------------
$moteur=new FrontController($config);
$moteur->load_content($tpl);

//--------------------------------------------------------------------------
//Chargement de blocs d'affichage
//--------------------------------------------------------------------------

include ("conf/Blocs.ini.php");
foreach ($blocs as $b){
	$bl = new $b();
	$bl->set_variables($config);
	$bl->display();
	$res=$tpl->fetch("file:blocs/$b.bloc.tpl");
	$tpl->assign("Bloc_$b",$res);
}


//récupère les affichages "parasites" (echo, print, var_dump...)
$echx = ob_get_clean();

//--------------------------------------------------------------------------
//Gestion d'erreurs
//--------------------------------------------------------------------------

//affichage des erreurs résiduelles
$aff_errs="";
foreach($debugs as $d)
	$aff_errs .=  "<div>$d</div>";
$tpl->assign("erreurs",$aff_errs);

//affichages parasites
$tpl->assign("affichages",$echx);

//--------------------------------------------------------------------------
//affiche le template principal, le module seul ou le module dans une boite de dialogue
// paramètre GET : displayModuleOnly=1
//--------------------------------------------------------------------------
if($request->displayModuleOnly)
	$tpl->display('module.tpl');
elseif($request->displayModuleInDialog){
	$tpl->display('modal.tpl');

	}
else
	$tpl->display('main.tpl');

//--------------------------------------------------------------------------
//gestionnaire d'exceptions
//--------------------------------------------------------------------------
function exc($exc){
	global $tpl;
	global $err;
	$err=true;
	ob_end_flush();
	$tpl->assign('message',$exc->getFile()." : ".$exc->getLine()."<br>".$exc->getMessage());
	$tpl->display('erreur.tpl');
}
//--------------------------------------------------------------------------
//gestionnaire d'erreurs
//--------------------------------------------------------------------------
function erreur($errno, $errstr, $errfile, $errline){
	global $debugs;
	$debugs[]= "<b>$errfile</b>:$errline $errstr";
}
?>
