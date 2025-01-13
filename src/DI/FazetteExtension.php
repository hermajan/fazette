<?php
namespace Fazette\DI;

use Nette\DI\CompilerExtension;

class FazetteExtension extends CompilerExtension {
	/** @return void */
	public function loadConfiguration() {
		$builder = $this->getContainerBuilder();
	}
}
