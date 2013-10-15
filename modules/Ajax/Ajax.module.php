<?php


class Ajax extends Module{

	public function	action_index(){
		$this->set_title("Exemple JQuery");				
	}
	
	public function action_ajax(){
		echo json_encode(array("un","deux","trois"));
		exit;
	}
	
}
?>
