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
		
		if (isset($_GET["action"])) {
			$linksController = $_GET["action"];
		}
		else {
			$linksController = "index";
		}

		$answer = LinksPages::linksPagesModel($linksController);

		include $answer;
	}
}

?>