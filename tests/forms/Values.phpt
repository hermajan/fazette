<?php
namespace Fazette\tests\forms;
require __DIR__."/../_setup.php";
use Tester\Assert;

/**
 * Tests class Values.
 * @testCase
 */
class Values extends \Tester\TestCase {
	public function testNullifyString() {
		$value = "";
		\Fazette\forms\Values::nullifyString($value);
		Assert::null($value);
	}
	
	public function testNullifyStrings() {
		$array = ["", "hello"];
		\Fazette\forms\Values::nullifyStrings($array);
		$expected = [null, "hello"];
		Assert::same($expected, $array);
		
		$object = (object)["empty" => "", "text" => "hello"];
		\Fazette\forms\Values::nullifyStrings($object);
		Assert::same(null, $object->empty);
		Assert::same("hello", $object->text);
		
		$object = (object)["array" => ["", "hi"], "text" => "hello"];
		\Fazette\forms\Values::nullifyStrings($object);
		Assert::same([null, "hi"], $object->array);
		Assert::same("hello", $object->text);
	}
}

$testCase = new Values;
$testCase->run();
