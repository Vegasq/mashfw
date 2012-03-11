
<style>

.menu_div{
	float: left;
	padding: 10px;
	margin: 5px;
	border: 1px dotted gray;
}
.menu_div:hover{
	background-color: #B5CDFF;
}

.menu_a{
	text-decoration: none;
	color: black;
}
.menu_row{
	width: 100%;
	height: 55px;
}
</style>

<?php
$menu_item = '';
foreach($_data['menu'] as $name=>$url){
	$menu_item .= "<div class=\"menu_div\"><a class=\"menu_a\" href=\"{$url}\">{$name}</a></div>";
}
$menu_item = "<div class=\"menu_row\">{$menu_item}</div>";

echo $menu_item;
?>