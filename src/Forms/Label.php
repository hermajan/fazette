<?php
namespace Fazette\Forms;

use Fazette\Latte\Fa;
use Nette\Utils\Html;

/**
 * Methods for forms labels.
 */
class Label {
	/**
	 * Returns element for form label with Font Awesome icon.
	 * @param string $text Text of the label.
	 * @param string|null $icon Name of the Font Awesome icon.
	 * @param array $iconArguments Arguments for icon.
	 * @return Html HTML element for label.
	 */
	public static function withFa(string $text, string $icon = null, array $iconArguments = []): Html {
		$content = "";
		if(isset($icon)) {
			$iconString = (string)Fa::createIcon($icon, $iconArguments);
			$content .= $iconString." ";
		}
		$content .= $text;
		return Html::el()->setHtml($content);
	}
}
