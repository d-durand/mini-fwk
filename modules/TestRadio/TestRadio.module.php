<?php


class TestRadio extends Module{

	public function	action_index(){

		$f=new Form('?module=TestRadio&action=valide','fid');
		$f->add_radiogroup("radio","rad1", "RadioGroup",array("o1"=>"Un","o2"=>"Deux","o3"=>"Trois"))->set_value("Deux");		
		
		$f->build_from_array(array(
			array(
					'type'=>'radiogroup',
					'name'=>'champ2',
					'id'=>'champ2',
					'label'=>'Champ 2',
					'required'=>true,
					'options'=>array("One"=>1,"Two"=>2,"Three"=>3), 
					'validation'=>'equal:2|required'
				)				
		));

		
		
		$f->add_submit("Envoyer","Bouton")->set_value("bouton");
		$this->tpl->assign("form",$f);
		$this->session->f=$f;
		
	}
	
	public function action_valide(){
		$f=$this->session->f;
		$f->populate();
		$f->valid();
		$this->tpl->assign("form",$f);
		print_r($this->req->radio);
		print_r($_REQUEST);
	}
	
	
	
}


?>
