<?php


class Ajax extends Module{

	public function	action_index(){
		$this->set_title("Exemple JQuery");				
	}
	
	public function action_ajax(){
	
		$nombres = ["un","deux","trois","quatre","cinq","six","sept","huit","neuf","dix"];
	
	
	
		$item = $this->req->term;
		//error_log("item : ".$item);
		echo json_encode( preg_grep("/^$item/i",$nombres) );
		exit;
	}
	
}
?>
