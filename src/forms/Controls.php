<?php
namespace Fazette\forms;

use Fazette\latte\Fa;
use Nette\Utils\Html;

/**
 * Methods for Nette Forms.
 */
class Controls {
	/**
	 * Returns element for form label with Font Awesome icon.
	 * @param string $text Text of the label.
	 * @param string $icon Name of the Font Awesome icon.
	 * @param array $iconArguments Arguments for icon.
	 * @return Html HTML element for label.
	 */
	public static function label(string $text, string $icon=null, array $iconArguments=null) {
		$content = "";
		if(isset($icon)) {
			$iconString = (string)Fa::createIcon($icon, $iconArguments);
			$content .= $iconString." ";
		}
		$content .= $text;
		return Html::el()->setHtml($content);
	}
}
