<?php
namespace Fazette\Latte;

require __DIR__."/../../bootstrap.php";

use Latte\Engine;
use Tester\{Assert, TestCase};

/**
 * Tests class Fa as Font Awesome 4.
 * @testCase
 */
class Fa4Test extends TestCase {
	protected function render($file) {
		$latte = new Engine();
		$latte->setTempDirectory(__DIR__."/../../../.temp/");
		$latte->addExtension(new FaExtension);
		
		$result = $latte->renderToString(__DIR__."/4/".$file.".latte");
		return trim($result);
	}
	
	public function testBasic() {
		$html = '<i class="fa fa-camera-retro" aria-hidden="true"></i>';
		Assert::match($html, $this->render("basic"));
	}
	
	public function testSize() {
		$html = '<i class="fa fa-camera-retro fa-lg" aria-hidden="true"></i><i class="fa fa-camera-retro fa-2x" aria-hidden="true"></i><i class="fa fa-camera-retro fa-3x" aria-hidden="true"></i><i class="fa fa-camera-retro fa-4x" aria-hidden="true"></i><i class="fa fa-camera-retro fa-5x" aria-hidden="true"></i>';
		Assert::match($html, $this->render("size"));
	}
	
	public function testFixed() {
		$html = '<i class="fa fa-home fa-fw" aria-hidden="true"></i>';
		Assert::match($html, $this->render("fixed"));
	}
	
	public function testList() {
		$html = '<ul class="fa-ul">
	<li><i class="fa fa-check-square fa-li" aria-hidden="true"></i>List icons</li>
	<li><i class="fa fa-check-square fa-li" aria-hidden="true"></i>can be used</li>
	<li><i class="fa fa-spinner fa-spin fa-li" aria-hidden="true"></i>as bullets</li>
	<li><i class="fa fa-square fa-li" aria-hidden="true"></i>in lists</li>
</ul>';
		Assert::match($html, $this->render("list"));
	}
	
	public function testBordered() {
		$html = '<i class="fa fa-quote-left fa-3x fa-pull-left fa-border" aria-hidden="true"></i>';
		Assert::match($html, $this->render("bordered"));
	}
	
	public function testAnimated() {
		$html = '<i class="fa fa-refresh fa-spin fa-3x fa-fw" aria-hidden="true"></i><i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i>';
		Assert::match($html, $this->render("animated"));
	}
	
	public function testRotated() {
		$html = '<i class="fa fa-quote-left fa-3x fa-pull-left fa-border" aria-hidden="true"></i>';
		Assert::match($html, $this->render("rotated"));
	}
	
	public function testStacked() {
		$html = '<span class="fa-stack fa-lg">
<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i><i class="fa fa-twitter fa-stack-1x" aria-hidden="true"></i></span>
<span class="fa-stack fa-lg">
<i class="fa fa-square fa-stack-2x" aria-hidden="true"></i><i class="fa fa-terminal fa-stack-1x fa-inverse" aria-hidden="true"></i></span>
<span class="fa-stack fa-lg">
<i class="fa fa-camera fa-stack-1x" aria-hidden="true"></i><i class="fa fa-ban fa-stack-2x text-danger" aria-hidden="true"></i></span>';
		Assert::match($html, $this->render("stacked"));
	}
}

$testCase = new Fa4Test;
$testCase->run();
