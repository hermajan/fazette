<?php
namespace Fazette\Latte;

use Latte\{CompileException, Compiler, MacroNode, Macros\MacroSet, PhpWriter};
use Nette\Utils\Html;

/**
 * Latte macro for Font Awesome.
 */
final class Fa extends MacroSet {
	/**
	 * Installs macro between Latte macros.
	 * @param Compiler $compiler
	 * @return static
	 */
	public static function install(Compiler $compiler): Fa {
		$lc = new static($compiler);
		$lc->addMacro("fa", [$lc, "macroFa"]);
		return $lc;
	}
	
	/**
	 * Font Awesome icon macro.
	 * @param MacroNode $node
	 * @param PhpWriter $writer
	 * @return string
	 * @throws CompileException
	 */
	public function macroFa(MacroNode $node, PhpWriter $writer): string {
		return $writer->write("echo \Fazette\Latte\Fa::createIcon(%node.word, %node.array)");
	}
	
	/**
	 * Renders Font Awesome icon.
	 * @param string $icon Name of the Font Awesome icon.
	 * @param array|null $arguments Optional arguments for the icon (see https://fontawesome.com/how-to-use/on-the-web/styling).
	 * @return Html HTML element with icon and its arguments.
	 */
	public static function createIcon(string $icon, array $arguments = null): Html {
		$element = Html::el("i");
		
		if($icon == "b" or $icon == "l" or $icon == "s" or $icon == "r") {
			// Markup of icon which use Font Awesome 5.
			$class = ["fa".$icon];
		} else {
			// Markup of icon which use Font Awesome 4.
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
