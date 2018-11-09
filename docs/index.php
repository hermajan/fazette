<?php
require_once __DIR__."/../vendor/autoload.php";

use Fazette\Latte\Fa;
use Latte\Engine;

$latte = new Engine;

$temp = __DIR__."/.temp";
if(!is_dir($temp)) {
	mkdir($temp, 0777, true);
}
$latte->setTempDirectory($temp);

$latte->onCompile[] = function(Engine $engine) {
	Fa::install($engine->getCompiler());
};

$parameters = [
	"layoutFile" => "../@layout.latte",
	"menuExists" => true, "menuFile" => "#menu.latte",
	"src" => "../src",
	"github" => "https://github.com/hermajan/fazette"
];

if(isset($_GET["t"])) {
	$file = __DIR__."/templates/".$_GET["t"].".latte";
	if(file_exists($file)) {
		$latte->render($file, $parameters);
	}
} else {
	$latte->render("templates/default.latte", $parameters);
}
