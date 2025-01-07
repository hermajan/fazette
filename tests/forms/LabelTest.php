<?php
namespace Fazette\Forms;

require __DIR__."/../bootstrap.php";

use Tester\{Assert, TestCase};

/**
 * Tests class Label.
 * @testCase
 */
class LabelTest extends TestCase {
	public function testLabel(): void {
		$html = "hello";
		Assert::match($html, (string)Label::withFa("hello"));
	}
	
	public function testLabelWithIcon(): void {
		$html = '<i class="fa fa-car" aria-hidden="true"></i> hi';
		Assert::match($html, (string)Label::withFa("hi", "car"));
		
		$html = '<i class="fas fa-car" aria-hidden="true"></i> hi';
		Assert::match($html, (string)Label::withFa("hi", "s", ["car"]));
	}
}

$testCase = new LabelTest;
$testCase->run();
