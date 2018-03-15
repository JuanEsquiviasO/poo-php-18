<?php 

class MvcController {

	#call to template
	#---------------------------------------------------------
	public function template() {
		include "views/template.php";
	}

	#interaction of user
	#---------------------------------------------------------
	public function linksPagesController() {
		$linksController = $_GET["action"];

		$answer = LinksPages::linksPagesModel($linksController);

		include $answer;
	}
}

?>