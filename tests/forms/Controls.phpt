<?php
namespace Fazette\tests;
require __DIR__."/../_setup.php";
use Tester\Assert;

/**
 * Tests class Controls.
 * @testCase
 */
class Controls extends \Tester\TestCase {
	public function testLabel() {
		$html = 'hello';
		Assert::match($html, (string) \Fazette\forms\Controls::label("hello"));
	}
	
	public function testLabelWithIcon() {
		$html = '<i class="fa fa-car" aria-hidden="true"></i> hi';
		Assert::match($html, (string) \Fazette\forms\Controls::label("hi", "car"));
	}
}

$testCase = new Controls;
$testCase->run();