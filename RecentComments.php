<?php

class RecentComments extends Widget{

	static $title = "Recent Comments";
	static $cmsTitle = "Recent Page Comments";
	static $description = "Lists links to recent page comments.";

	static $db = array(
		"PageClass" => "Varchar"
	);

	function getCMSFields(){
		$fields = new FieldSet();
		$classes = ClassInfo::subclassesFor("Page");
		$fields->push($ddf = new DropdownField("PageClass","Page Type",$classes));
		$ddf->setHasEmptyDefault(true);
		return $fields;
	}

	function Comments(){
		$filter = array(
			"\"NeedsModeration\" = 0",
			"\"IsSpam\" = 0"
		);
		$join = "";
		if($this->PageClass){
			$filter[]  = "\"SiteTree_Live\".\"ClassName\" = '".$this->PageClass."'";
			$join = "INNER JOIN \"SiteTree_Live\" ON \"SiteTree_Live\".\"ID\" = \"PageComment\".\"ParentID\"";
		}
		return DataObject::get('PageComment',$filter,"Created DESC",$join,5);
	}

}