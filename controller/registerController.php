<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of eventController
 *
 * @author andrewmartinez
 */
class registerController Extends baseController {
	//put your code here
	public function index(){
		$socialLinks = array('Facebook'=> 'www.facebook.com',
							'Twitter' => 'www.twitter.com',
							'Google+' => 'www.googleplus.com',
							'LinkedIn' => 'www.linkedin.com');
		
		$_socialLinks = serialize($socialLinks);
		
		echo $_socialLinks;
		$socialLinks = unserialize($_socialLinks);
		
		
		$this->registry->template->registration_heading = 'This is the Event Registration Index';
		
		$this->registry->template->registration_heading = 'This is the Event / Register page';
		$this->registry->template->email = "amartinez@broadnet.us";
		$this->registry->template->fname = "Andrew";
		$this->registry->template->lname = "Martinez";
		
		$this->registry->template->txtFBLink	= $socialLinks['Facebook'];
		$this->registry->template->txtTwtrLink	= $socialLinks['Twitter'];
		$this->registry->template->txtLnkdIn	= $socialLinks['LinkedIn'];
		$this->registry->template->txtGglPlus	= $socialLinks['Google+'];
		
		$this->registry->template->show('registration_index');
		
	}
	/**
	 * 
	 */
	public function register(){
		$socialLinks = array('Facebook', 'Twitter', 'LinkedIn', 'Google+');
		$_socialLinks = array();
		
		if ( isset($_POST) ){
			//if ( isset($_POST['SocialLinks']))
				//print_r($_POST['SocialLinks']);
			//var_dump($_POST);
			foreach ($_POST as $name=>$value){
				
				echo "<br />{$name} = {$value}<br />";
				if (in_array($name, $socialLinks)){
					$_socialLinks[$name] = $value;
				}
				if (is_array($value)){
					$_value = serialize($value);
					echo "<br /><br />";
					echo($_value."<br />");
					echo "===========unserialized=============<br />";
					print_r(unserialize($_value));
				}
			}
			
			echo "=================== SERIALIZED =====================<br />";
			$_serialized = serialize($_socialLinks);
			echo("$_serialized<br /><br />");
			echo "=================== UNSERIALIZED ===================<br />";
			print_r(unserialize($_serialized));
		}
		$this->registry->template->registration_heading = 'This is the Event / Register page';
		$this->registry->template->email = "amartinez@broadnet.us";
		$this->registry->template->fname = "Andrew";
		$this->registry->template->lname = "Martinez";
		
		$this->registry->template->txtFBLink	= 'http://www.facebook.com';
		$this->registry->template->txtTwtrLink	= 'http://www.twitter.com';
		$this->registry->template->txtLnkdIn	= "http://www.linkedin.com";
		$this->registry->template->txtGglPlus	= 'http://www.googleplus.com';
		
		$this->registry->template->show('registration_index');
	}
}

?>