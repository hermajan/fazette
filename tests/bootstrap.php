<?php
require_once __DIR__."/../vendor/autoload.php";

$temp = __DIR__."/../.temp";
if(!is_dir($temp)) {
	mkdir($temp, 0777, true);
}

\Tester\Environment::setup();
\Tester\Dumper::$dumpDir = $temp."/output";
date_default_timezone_set("Europe/Prague");
