<?php
class MainController extends Controller
{
	
	public function action_run() {
		$UrlModel = new UrlModel();
		$current_url = $UrlModel->getUrl();
		
		$widget = new TestWidget("mash");
		
		return array('url'=> $current_url,'noo'=>'yes', 'widget'=>$widget);
	}
	
	public function action_ajax(){
		$UrlModel = new UrlModel();
		$current_url = $UrlModel->getUrl();
		exit(json_encode(array("Алкоголь", "Азартные игры", "Развратные женщины")));
	}
}

?>