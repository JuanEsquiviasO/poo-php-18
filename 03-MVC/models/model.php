<?php 

class LinksPages {
	public function linksPagesModel($linksModel) {
		
		if ($linksModel === "about" || $linksModel === "services" || $linksModel === "contact") {
			$module = "views/modules/".$linksModel.".php";
		}

		else if($linksModel === "index") {
			$module = "views/modules/intro.php";
		}

		else {
			$module = "views/modules/intro.php";
		}

		return $module;
	}
}

?>