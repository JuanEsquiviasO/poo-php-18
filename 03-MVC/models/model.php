<?php 

class LinksPages {
	public function linksPagesModel($linksModel) {
		
		if ($linksModel === "intro" || $linksModel === "about" || $linksModel === "services" || $linksModel === "contact") {
			$module = "views/modules/".$linksModel.".php";
		}

		return $module;
	}
}

?>