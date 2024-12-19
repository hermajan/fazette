<?php
namespace Fazette\Forms;

require __DIR__."/../bootstrap.php";

use Tester\{Assert, TestCase};

/**
 * Tests class Values.
 * @testCase
 */
class ValuesTest extends TestCase {
	public function testNullifyString(): void {
		$value = "";
		Values::nullifyString($value);
		Assert::null($value);
	}
	
	public function testNullifyStrings(): void {
		$array = ["", "hello"];
		Values::nullifyStrings($array);
		$expected = [null, "hello"];
		Assert::same($expected, $array);
		
		$object = (object)["empty" => "", "text" => "hello"];
		Values::nullifyStrings($object);
		Assert::same(null, $object->empty);
		Assert::same("hello", $object->text);
		
		$object = (object)["array" => ["", "hi"], "text" => "hello"];
		Values::nullifyStrings($object);
		Assert::same([null, "hi"], $object->array);
		Assert::same("hello", $object->text);
	}
}

$testCase = new ValuesTest;
$testCase->run();
