<?php
namespace Fazette\forms;

/**
 * Methods for Nette Forms.
 */
class Controls {
	/**
	 * Returns element for form label with Font Awesome icon.
	 * @param string $text Text of the label.
	 * @param string $icon Name of the Font Awesome icon.
	 * @param array $iconArguments Arguments for icon.
	 * @return \Nette\Utils\Html HTML element for label.
	 */
	public static function label(string $text, string $icon=null, array $iconArguments=null) {
		$content = "";
		if(isset($icon)) {
			$iconString = (string)\Fazette\latte\Fa::createIcon($icon, $iconArguments);
			$content .= $iconString." ";
		}
		$content .= $text;
		return \Nette\Utils\Html::el()->setHtml($content);
	}
}
