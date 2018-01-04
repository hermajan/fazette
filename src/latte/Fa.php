<?php
namespace Fazette\latte;

/**
 * Latte macro for Font Awesome.
 */
class Fa extends \Latte\Macros\MacroSet {
	/**
	 * Installs macro between Latte macros.
	 * @param \Latte\Compiler $compiler
	 * @return static
	 */
	public static function install(\Latte\Compiler $compiler) {
		$lc = new static($compiler);
		$lc->addMacro("fa", [$lc, "macroFa"]);
		return $lc;
	}

	/**
	 * Font Awesome icon macro.
	 * @param \Latte\MacroNode $node
	 * @param \Latte\PhpWriter $writer
	 * @return string
	 */
	public function macroFa(\Latte\MacroNode $node, \Latte\PhpWriter $writer) {
		return $writer->write('echo \Fazette\latte\Fa::renderFa(%node.word, %node.array)');
	}

	/**
	 * Renders Font Awesome icon.
	 * @param string $icon Name of the Font Awesome icon.
	 * @param array $arguments Optional arguments for the icon (see http://fontawesome.io/examples).
	 * @return \Nette\Utils\Html HTML element with icon and its arguments.
	 */
	public static function renderFa($icon, array $arguments=null) {
		$element = \Nette\Utils\Html::el("i");
		
		if($icon == "b" or $icon == "l" or $icon == "s" or $icon == "r") {
			// Markup of icon use Font Awesome 5.
			$class = ["fa".$icon];
		} else {
			// Markup of icon use Font Awesome 4.
			$class = ["fa fa-".$icon];
		}
		
		if(isset($arguments)) {
			foreach($arguments as $argument) {
				$class[] = "fa-".$argument;	
			}
		}
		
		$element->addAttributes(["class" => $class, "aria-hidden" => "true"]);
		return $element;
	}
}
