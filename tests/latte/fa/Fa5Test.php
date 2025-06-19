<?php
namespace Fazette\Latte;

require __DIR__."/../../bootstrap.php";

use Latte\Engine;
use Tester\{Assert, TestCase};

/**
 * Tests class Fa as Font Awesome 5.
 * @testCase
 */
class Fa5Test extends TestCase {
	protected function render($file) {
		$latte = new Engine();
		$latte->setTempDirectory(__DIR__."/../../../.temp/");
		$latte->addExtension(new FaExtension);
		
		$result = $latte->renderToString(__DIR__."/5/".$file.".latte");
		return trim($result);
	}
	
	public function testBasic() {
		$html = '<i class="fas fa-camera-retro" aria-hidden="true"></i><i class="far fa-camera-retro" aria-hidden="true"></i><i class="fal fa-camera-retro" aria-hidden="true"></i><i class="fab fa-font-awesome" aria-hidden="true"></i>';
		Assert::match($html, $this->render("basic"));
	}
	
	public function testSize() {
		$html = '<i class="fas fa-camera-retro fa-xs" aria-hidden="true"></i><i class="fas fa-camera-retro fa-sm" aria-hidden="true"></i><i class="fas fa-camera-retro fa-lg" aria-hidden="true"></i><i class="fas fa-camera-retro fa-2x" aria-hidden="true"></i><i class="fas fa-camera-retro fa-10x" aria-hidden="true"></i>';
		Assert::match($html, $this->render("size"));
	}
	
	public function testFixed() {
		$html = '<i class="fas fa-home fa-fw" aria-hidden="true"></i>';
		Assert::match($html, $this->render("fixed"));
	}
	
	public function testList() {
		$html = '<ul class="fa-ul">
	<li><span class="fa-li"><i class="fas fa-check-square" aria-hidden="true"></i></span>List icons can</li>
	<li><span class="fa-li"><i class="fas fa-check-square" aria-hidden="true"></i></span>be used to</li>
	<li><span class="fa-li"><i class="fas fa-spinner fa-pulse" aria-hidden="true"></i></span>replace bullets</li>
	<li><span class="fa-li"><i class="fas fa-square" aria-hidden="true"></i></span>in lists</li>
</ul>';
		Assert::match($html, $this->render("list"));
	}
	
	public function testBordered() {
		$html = '<i class="fas fa-quote-left fa-2x fa-pull-left fa-border" aria-hidden="true"></i>';
		Assert::match($html, $this->render("bordered"));
	}
	
	public function testAnimated() {
		$html = '<i class="fas fa-sync fa-spin" aria-hidden="true"></i><i class="fas fa-spinner fa-pulse" aria-hidden="true"></i>';
		Assert::match($html, $this->render("animated"));
	}
}

$testCase = new Fa5Test;
$testCase->run();
