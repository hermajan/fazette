<?php
namespace Fazette\Forms;

require __DIR__."/../bootstrap.php";

use Tester\{Assert, TestCase};

/**
 * Tests class Controls.
 * @testCase
 */
class ControlsTest extends TestCase {
	public function testLabel() {
		$html = "hello";
		Assert::match($html, (string)Controls::label("hello"));
	}
	
	public function testLabelWithIcon() {
		$html = '<i class="fa fa-car" aria-hidden="true"></i> hi';
		Assert::match($html, (string)Controls::label("hi", "car"));
		
		$html = '<i class="fas fa-car" aria-hidden="true"></i> hi';
		Assert::match($html, (string)Controls::label("hi", "s", ["car"]));
	}
}

$testCase = new ControlsTest;
$testCase->run();
