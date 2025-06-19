<?php
namespace Fazette\Latte;

use Latte\Extension;

class FaExtension extends Extension {
	public function getTags(): array {
		return ["fa" => [FaNode::class, "create"]];
	}
}

//$this->latte->addExtension(new FaExtension);
