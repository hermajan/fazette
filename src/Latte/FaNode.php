<?php
namespace Fazette\Latte;

use Latte\Compiler\Nodes\Php\{Expression\ArrayNode, ExpressionNode};
use Latte\Compiler\Nodes\StatementNode;
use Latte\Compiler\PrintContext;
use Latte\Compiler\Tag;
use Nette\Utils\Html;

/**
 * Latte tag for Font Awesome.
 */
final class FaNode extends StatementNode {
	public ExpressionNode $subject;
	public ArrayNode $args;
	
	/**
	 * Installs tag between Latte tags.
	 */
	public static function create(Tag $tag): self {
		$node = new self;
		$node->subject = $tag->parser->parseUnquotedStringOrExpression();
		$tag->parser->stream->tryConsume(',');
		$node->args = $tag->parser->parseArguments();
		return $node;
	}
	
	/**
	 * Prints Font Awesome icon tag.
	 */
	public function print(PrintContext $context): string {
		return $context->format('echo \Fazette\Latte\FaNode::createIcon(%node, %node);', $this->subject, $this->args);
	}
	
	/**
	 * Renders Font Awesome icon.
	 * @param string $icon Name of the Font Awesome icon.
	 * @param array $arguments Optional arguments for the icon (see https://fontawesome.com/how-to-use/on-the-web/styling).
	 * @return Html HTML element with icon and its arguments.
	 */
	public static function createIcon(string $icon, array $arguments = []): Html {
		$element = Html::el("i");
		
		if($icon == "b" or $icon == "l" or $icon == "s" or $icon == "r") {
			// Markup of icon which use Font Awesome 5.
			$class = ["fa".$icon];
		} else {
			// Markup of icon which use Font Awesome 4.
			$class = ["fa fa-".$icon];
		}
		
		if(!empty($arguments)) {
			/** @var string $argument */
			foreach($arguments as $argument) {
				$class[] = "fa-".$argument;
			}
		}
		
		$element->addAttributes(["class" => $class, "aria-hidden" => "true"]);
		return $element;
	}
	
	public function &getIterator(): \Generator {
		yield $this->subject;
		yield $this->args;
	}
}
