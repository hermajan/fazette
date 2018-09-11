<?php
namespace Fazette\Tests\Forms;

require __DIR__."/../_setup.php";

use Fazette\Forms\Controls as ControlsClass;
use Tester\{Assert, TestCase};

/**
 * Tests class Controls.
 * @testCase
 */
class Controls extends TestCase {
	public function testLabel() {
		$html = 'hello';
		Assert::match($html, (string)ControlsClass::label("hello"));
	}
	
	public function testLabelWithIcon() {
		$html = '<i class="fa fa-car" aria-hidden="true"></i> hi';
		Assert::match($html, (string)ControlsClass::label("hi", "car"));
		
		$html = '<i class="fas fa-car" aria-hidden="true"></i> hi';
		Assert::match($html, (string)ControlsClass::label("hi", "s", ["car"]));
	}
}

$testCase = new Controls;
$testCase->run();
