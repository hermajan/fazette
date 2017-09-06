<?php
require __DIR__."/../_testSetup.php";
use Tester\Assert;

/**
 * Tests class Fa.
 * @testCase
 */
class FaTest extends \Tester\TestCase {
	protected function render($file) {
		$latte = new Latte\Engine();
		$folder = __DIR__."/../../.temp";
		if(!is_dir($folder)) {
			mkdir($folder, 0777, true);
		}
		$latte->setTempDirectory(__DIR__."/../../.temp/");
		$latte->onCompile[] = function(\Latte\Engine $engine) {
			\Fazette\latte\Fa::install($engine->getCompiler());
		};
		
		$result = $latte->renderToString(__DIR__."/templates/".$file);
		return trim($result);
	}
	
	public function testBasic() {
		$html = '<i class="fa fa-camera-retro" aria-hidden="true"></i>';
		Assert::same($html, $this->render("basic.latte"));
	}
	
	public function testSize() {
		$html = '<i class="fa fa-camera-retro fa-lg" aria-hidden="true"></i>
<i class="fa fa-camera-retro fa-2x" aria-hidden="true"></i>
<i class="fa fa-camera-retro fa-3x" aria-hidden="true"></i>
<i class="fa fa-camera-retro fa-4x" aria-hidden="true"></i>
<i class="fa fa-camera-retro fa-5x" aria-hidden="true"></i>';
		Assert::same($html, $this->render("size.latte"));
	}
	
	public function testFixed() {
		$html = '<i class="fa fa-home fa-fw" aria-hidden="true"></i>';
		Assert::same($html, $this->render("fixed.latte"));
	}
	
	public function testList() {
		$html = '<ul class="fa-ul">
	<li><i class="fa fa-check-square fa-li" aria-hidden="true"></i>List icons</li>
	<li><i class="fa fa-check-square fa-li" aria-hidden="true"></i>can be used</li>
	<li><i class="fa fa-spinner fa-spin fa-li" aria-hidden="true"></i>as bullets</li>
	<li><i class="fa fa-square fa-li" aria-hidden="true"></i>in lists</li>
</ul>';
		Assert::same($html, $this->render("list.latte"));
	}
	
	public function testBordered() {
		$html = '<i class="fa fa-quote-left fa-3x fa-pull-left fa-border" aria-hidden="true"></i>';
		Assert::same($html, $this->render("bordered.latte"));
	}
	
	public function testAnimated() {
		$html = '<i class="fa fa-refresh fa-spin fa-3x fa-fw" aria-hidden="true"></i>
<i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i>';
		Assert::same($html, $this->render("animated.latte"));
	}
	
	public function testRotated() {
		$html = '<i class="fa fa-quote-left fa-3x fa-pull-left fa-border" aria-hidden="true"></i>';
		Assert::same($html, $this->render("rotated.latte"));
	}
	
	public function testStacked() {
		$html = '<span class="fa-stack fa-lg">
	<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
	<i class="fa fa-twitter fa-stack-1x" aria-hidden="true"></i>
</span>
<span class="fa-stack fa-lg">
	<i class="fa fa-square fa-stack-2x" aria-hidden="true"></i>
	<i class="fa fa-terminal fa-stack-1x fa-inverse" aria-hidden="true"></i>
</span>
<span class="fa-stack fa-lg">
	<i class="fa fa-camera fa-stack-1x" aria-hidden="true"></i>
	<i class="fa fa-ban fa-stack-2x text-danger" aria-hidden="true"></i>
</span>';
		Assert::same($html, $this->render("stacked.latte"));
	}
}

$testCase = new FaTest;
$testCase->run();
