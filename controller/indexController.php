<?php

Class indexController Extends baseController {

public function index() {
	/*** set a template variable ***/
        $this->registry->template->welcome = 'Welcome to my plain ol\' testing sandbox...';
		$this->registry->template->user = array('first_name'=>'Andrew', 'mid_init'=>'R', 'last_name'=>'Martinez');
		
	/*** load the index template ***/
        $this->registry->template->show('index');
}

}

?>
