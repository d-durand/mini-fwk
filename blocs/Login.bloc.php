<?php
class Login extends Bloc{

	public function display(){
		if($this->session->ouverte())
			$this->tpl->assign('login',$this->session->user->login);
	}
}
?>
