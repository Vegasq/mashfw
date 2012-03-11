<?php
#####################################################################
# MashFW <mash framework>
# ============================================
# Copyright (c) 2011-2012 by Nikolay Yakovlev
# E-Mail vegasq@gmail.com
# WEB http://code.google.com/p/mashfw
#####################################################################

class View
{
	public static function render($controller,$action,$_data){
        # Render template and send $data in it
        # !!! TODO $embeded = массив содержащий список 
        # CSS && JS для включения в страницу. По умолчанию - все.
		require "../".Config::$path_template . "layout.php";
		require "../".Config::$path_template . $controller . "/"."t_".$action.".php";
		require "../".Config::$path_template . "footer.php";
	}

    public static function autoload($controller, $action){
        # Autoload static page class
		$action_name = $action;

        $action = "action_".$action;
		$controller_name = $controller."Controller";

        if( method_exists($controller_name, $action) ){
        	$app = new $controller_name();
			$app_data = $app->$action();
			View::render(
                $controller, $action_name, $app_data 
            );
			return True;
            //$name::$action($name); 
        } else { 
            View::render(
                "error",array( "name"=>"page_error", "info"=>$action  ) 
            ); 
        }
    }
    
    public static function getCss($name = "null"){
        # Return html code for include in head
        $url = Config::$url_css;
        
        if($name != "null")
        {
            return "<LINK href=\"{$url}{$name}.css\" type=text/css rel=stylesheet> \n";
        }
        else if(count(Config::$css))
        {
            $css_list = '';
            foreach(Config::$css as $css_file){
                $css_list .= "<LINK href=\"{$url}{$css_file}.css\" type=text/css rel=stylesheet> \n";
            }
            return $css_list;
        }
        return False;
    }

    public static function getJs($name = "null"){
        # Return html code for include in head
        $url = Config::$url_js;
        
        if($name != "null")
        {
            return "<script type=\"text/javascript\"  src=\"{$url}{$name}.js\"> </script>\n";
        }
        else if(count(Config::$js))
        {
            $js_list = "";
            foreach(Config::$js as $js_file){
                $js_list .= "<script type=\"text/javascript\"  src=\"{$url}{$js_file}.js\"> </script>\n";
            }
            return $js_list;
        }
        return False;
    }
}
?>
