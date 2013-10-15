<?php /* Smarty version Smarty-3.1.1, created on 2012-11-27 14:29:18
         compiled from "modules/Doc/tpl/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6283247550b47fe939b673-12904216%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22b93c7e3b9efcc9d365cb2a5f91b8177155ac96' => 
    array (
      0 => 'modules/Doc/tpl/index.tpl',
      1 => 1354022957,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6283247550b47fe939b673-12904216',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50b47fe94b690',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b47fe94b690')) {function content_50b47fe94b690($_smarty_tpl) {?><ol>
<li><a href="#fct">Fonctionnement</a></li>
<li><a href="#cls">Classes outils</a></li>
<li><a href="#mdl">Module</a></li>
<li><a href="#tpl">Template</a></li>
</ol>
<h3 id='fct'>Fonctionnement</h3>
<p>
Mini-FWK est un mini framework à usage pédagogique, ayant pour objectif 
d'introduire les concepts de programmation MVC
</p>
<p>
Il est constitué de quelques classes : 
</p>
<ul>

	<li><b>DB</b> : wrapper PDO</li>
	<li><b>Form</b> : formulaire HTML en objet, facilite l'écriture, la génération et le remplissage de formulaires</li>
	<li><b>FrontController</b> : chargeur de modules</li>
	<li><b>Module</b> : classe de base des modules à implémenter par les étudiants. Un <a href="#mdl">module</a> représente un "sous-programme" du site</li>
	<li><b>Request</b> : wrapper des tableaux <tt>$_GET</tt>, <tt>$_POST</tt> et <tt>$_REQUEST</tt></li>
	<li><b>Session</b> : wrapper du tableau <tt>$_SESSION</tt> de php</li>
	<li><b>Site</b> : boîte à outils</li>
</ul>

<p>Toutes les requêtes sur le site aboutissent vers le fichier index.php, <b>bootstrap</b> du framework. Le bootstrap s'occupe d'initialiser :
</p>
<ul>
<li>La session</li>
<li>La connexion à la base de données</li>
<li>Le moteur de template (SMARTY)</li>
<li>La redirection d'affichage</li>
<li>Le FrontController</li>
</ul>
<p>
Par défaut, c'est le Module index est chargé si rien n'est précisé dans l'URL.
</p>


<h3 id='cls'>Classes outils</h3>
<h4>DB : wrapper PDO</h4>
<p>
Objet initialisé par le Bootstrap, avec les paramètres définis dans le fichier <tt>conf/Params.ini.php</tt>.
Disponible dans l'ensemble du code via <tt>DB::get_instance()</tt>
</p>
<code>
Exemple
<pre>
$statement = DB::get_instance()->prepare("SELECT * FROM table WHERE id=?");
$statement->execute(array(5));
$ligne = $statement -> fetch();
</pre>
</code>
<h4>Form</h4>
<h5>Constructeur</h5>
<ul>
<li><tt>__construct( $url_action, $id_form )</tt> : contruit un formulaire dont l'action est <tt>$url_action</tt>
<code>
Exemple
<pre>
$f = new Form("?module=MonModule&action=traiter","idForm1");
</pre>
</code>
</li>
</ul>
<h5>Champs</h5>
<p>Chacune des méthodes <tt>add*</tt> ajoute un élément et renvoie un objet <tt>HTMLInput</tt><br />
Les objets HTMLInput peuvent définir </p>
<ul>
<li>une valeur par défaut : méthode <tt>set_value()</tt>,</li>
<li>le fait d'être requis : méthode <tt>set_required(true)</tt></li>
<li>un état d'erreur : méthode <tt>set_error()</tt></li>
<li>un message d'erreur associé: méthode <tt>set_error_message($message)</tt></li>
</ul>
<h5>Méthodes</h5>
<ul>
<li><tt>add_select($name,$id,$label,$options)</tt> : ajoute un champ SELECT dont les options sont passées via le tableau associatif <tt>$options</tt>
<code>
Exemple
<pre>
$f->add_select("liste","sel1","Choisissez",
				array("1"=>"Un","2"=>"Deux","3"=>"Trois")
			   )->set_value("Deux");
</pre>
</code>
</li>
<li><tt>add_text($name,$id,$label)</tt> : ajoute un champ de type TEXT</li>
<li><tt>add_hidden($name,$id)</tt> : ajoute un champ de type HIDDEN</li>
<li><tt>add_textarea($name,$id,$label)</tt> : ajoute un champ de type TEXTAREA</li>
<li><tt>add_password($name,$id,$label)</tt> : ajoute un champ de type PASSWORD</li>
<li><tt>add_submit($name,$id,$label)</tt> : ajoute un bouton SUBMIT</li>
<li><tt>add_checkbox($name,$id,$label,$checked=FALSE)</tt> : ajoute une case à cocher</li>
<li><tt>add_radio($name,$id,$label,$checked=FALSE)</tt> : ajoute un bouton radio
	<code>Exemple<pre>
	$f->add_radio("rep","r1","Choix",true)->set_value("A");
	$f->add_radio("rep","r2","",true)->set_value("B");
	$f->add_radio("rep","r3","",true)->set_value("C");	
	</pre></code>
</li>
<li><tt>__get()</tt> : récupère un champ selon son attribut <tt>name</tt></li>
<li><tt>populate($array)</tt> : remplit les champs du formulaire avec les paramètres passés dans la requête HTTP ou bien dans le tableau associatif passé en paramètre. Les clés du tableau associatif correspondent aux attributs <tt>name</tt> des champs</li>
<li><tt>reset_errors()</tt> : efface les messages d'erreurs associés aux champs de formulaire</li>
</ul>
<h5>Remarque</h5>
<p>
Ne sont pas implémentés les contrôles de données, les champs HTML5, les envois de fichiers.
</p>
<h4>Module</h4>
<p>Classe chargée par le FrontController selon le paramètre <tt>module</tt> défini dans l'url</p>
<ul>
<li><tt>set_variables($config)</tt> : initialise les variables systèmes <tt>site</tt>,<tt>session</tt>,<tt>req</tt> et <tt>tpl</tt> </li>
<li><tt>set_title($title)</tt> : définit le titre du module, et de la page</li>
<li><tt>set_tpl_name($tpl)</tt> : indique le nom du <tt>.tpl</tt> à charger</li>
<li><tt>get_tpl_name()</tt> : récupère le nom du <tt>.tpl</tt> associé au module</li>
</ul>


<h4>Request</h4>
<p>wrapper des tableaux <tt>$_GET</tt>, <tt>$_POST</tt> et <tt>$_REQUEST</tt>. Implémente la méthode magique <tt>__get()</tt> pour récupérer les paramètres passés dans l'URL en get ou post de manière unique.</p>
<code>Exemple<pre>
$this->req = Request::get_instance();
$nom  = $this->req->nom;  //équivaut à $nom = isset($_GET['nom']) ? $_GET['nom'] : "";
$pnom = $this->req->pnom;  //équivaut à $pnom = isset($_GET['pnom']) ? $_GET['pnom'] : "";
</pre>
</code>
<h4>Session</h4>
<p>wrapper du tableau $_SESSION de php. Implémente les méthodes <tt>__get()</tt> et <tt>__set()</tt> pour stocker et récupérer de manière transparente les valeurs du tableaux <tt>$_SESSION</tt></p>
<code>
Exemple
<pre>
$this->session = Session::get_instance();
$this->session->utilisateur = $user // équivaut à $_SESSION['utilisateur']=$user
$panier = $this->session->panier; 
//équivaut à $panier = isset($_SESSION['panier']) ? $_SESSION['panier'] : "";
</pre>
</code>
<h4>Site</h4>
<p>Propose quelques fonctions outils relatives à l'affichage ou à la redirection</p> 
<ul>
<li><tt>redirect($module='index',$action='index')</tt> : redirige vers le module et l'action spécifiés</li>
<li><tt>ajouter_message($message,$type=INFO)</tt> : ajoute un message dans la file</li>
<li><tt>liste_messages()</tt> : liste les messages dans la file</li>
<li><tt>effacer_messages()</tt> : supprime les messages de la file</li>
<li><tt>debug($données)</tt> : affiche le détail des données passées en paramètres</li>
</ul>
<h5>Remarque</h5>
La liste des messages permet de transmettre une information à destination de l'utilisateur d'une page à l'autre, notamment lors d'une redirection de page.

<h3 id='mdl'>Modules</h3>
<p>
	Un <b>module</b> est un ensemble d'actions groupées au sein d'une même <b>classe</b><br />
	Par exemple, une <b>insciption</b> est composée des étapes : 
</p>
<ul>
	<li>Affichage d'un formulaire</li>
	<li>Vérification des données du formulaire</li>
	<li>Enregistrement des données et redirection ou réaffichage du formulaire si erreurs</li>
</ul>
<p>
	Un module d'inscription sera donc implémenté sous la forme d'une classe contenant 3 méthodes :
</p>
<ul>
	<li><tt>action_index()</tt> : action par défaut</li>
	<li><tt>action_valider()</tt> : vérification des données</code></li>
	<li>éventuellement <tt>action_confirmer()</tt> : page de confirmation</li>
</ul>

<p>
L'appel vers le module se fera en passant son nom en paramètre, suivi éventuellement d'une action (par défaut : index)
</p>
<code>http://localhost/mini-fwk/index.php?module=Inscription&action=valider</code>
<p>
Ce qui donne : 
</p>
<code>
Exemple
<pre>

&lt;php
class Inscription extends Module{
	function action_index(){
		//affichage d'un formulaire
	}
	function action_valider(){
		//vérifications et enregistrement
	}
	function action_confirmer(){
		//page finale
	}
}
?<?php ?>>

</pre>
</code>
<h4>Remarques</h4>
<p>
<ul>
	<li>Chaque action est indépendante l'une de l'autre, au moment de leur exécution</li>
	<li>Une requête HTTP correspond à un appel d'une fonction</li>
	<li>Pour passer d'une action à une autre, c'est-à-dire d'une page à une autre, il faut utliser une nouvelle requête (lien, redirection)</li>
</ul>
</p>
<h4>Conventions de nommage</h4>
Un module Inscription = 
<ul>
	<li>Un dossier Inscription dans le dossier modules</li>
	<li>Une classe <b>Inscription.module.php</b>
</ul>
<h4>Variables disponibles dans les modules</h4>
<ul>
	<li><tt>$this->site</tt> : objet outil Site</li>
	<li><tt>$this->session</tt> : objet outil Session</li>	
	<li><tt>$this->request</tt> : objet outil Request</li>
	<li><tt>$this->tpl</tt> : moteur de template</li>	
</ul>

<h3 id='tpl'>Template</h3>
<p>
L'affichage des modules s'effectue également <b>en dehors</b> du code à travers des templates.
A chaque action du module correspond un fichier <tt>.tpl</tt> dans le dossier tpl du module.
</p>
<ul>
<li><tt>action_index</tt> &rarr; index.tpl</li>
<li><tt>action_valider</tt> &rarr; valider.tpl</li>
<li><tt>action_confirmer</tt> &rarr; confirmer.tpl</li>
</ul>
<p><i>Remarque</i> : les actions qui ne génèrent pas d'affichage (redirection, envoi de fichiers) n'ont pas nécessairement besoin d'un fichier <tt>.tpl</tt> associé.
</p>
<p>
Le passage de variables du module vers le template s'effectuent via la fonction <tt>assign</tt> du moteur de template smarty :
</p>
<code>
Exemple
<pre>
function action_index(){
	$this->tpl->assign("mavariable",5);	
}
</pre>
</code>
Dans le fichier <tt>.tpl</tt> :
<code>
Exemple
<pre>
&lt;h1>Exemple&lt;/h1>
&lt;b>{$mavariable}&lt;/b>
</pre>
</code>
<p>
Le template principal de la page est situé dans le dossier <tt>template/main.tpl</tt>
</p>
<?php }} ?>