<?php
#####################################################################
# MashFW <mash framework>
# ============================================
# Copyright (c) 2011 by Nikolay Yakovlev
# E-Mail vegasq@gmail.com
# WEB http://code.google.com/p/mashfw
#####################################################################
class Controller{
	public static function run(){
		View::render("error",array("name"=>"Ошибка в реализации конструктора.","info"=>"Переопределите метод run"));
	}
	public static function documentation(){
		View::render("error",array("name"=>"Информация о странице не создана.","info"=>"Переопределите метод documentation"));
	}
}
?>
