<!DOCTYPE HTML>
<html><head>
<meta charset="utf-8" />
<link rel="shortcut icon" href="/favicon.ico">
<?php
echo View::getCss();
echo View::getJs();
?>
<title><?php echo Config::$title; ?></title>
</head><body>
<div id="content">
<h1><?php echo Config::$title; ?></h1>

<?php
$menu = new TestWidget();
echo $menu->draw();
?>