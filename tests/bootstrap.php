<?php
use Tester\Dumper;
use Tester\Environment;

require_once __DIR__."/../vendor/autoload.php";

$temp = __DIR__."/../.temp";
if(!is_dir($temp)) {
	mkdir($temp, 0777, true);
}

Environment::setup();
Dumper::$dumpDir = $temp."/tester";
date_default_timezone_set("Europe/Prague");
