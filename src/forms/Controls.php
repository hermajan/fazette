<?php
namespace Fazette\forms;

/**
 * Methods for Nette Forms.
 */
class Controls {
	/**
	 * Fixes form values from empty string to null.
	 * @param array $values Submitted values from form.
	 */
	public static function fixValues(&$values) {
		foreach($values as $key => $value) {
			if(is_array($values)) {
				$item = &$values[$key];
			} elseif(is_object($values)) {
				$item = &$values->{$key};
			} else { $item = null; }
			
			if(is_array($item) or is_object($item)) {
				Controls::fixValues($item);
			}
			if($item === "") {
				$item = null;
			}
		}
	}

	/**
	 * Returns element for form label with Font Awesome icon.
	 * @param string $text Text of the label.
	 * @param string $icon Name of the Font Awesome icon.
	 * @return \Nette\Utils\Html HTML element for label.
	 */
	public static function label($text, $icon=null) {
		$content = "";
		if(isset($icon)) {
			$content .= '<i class="fa fa-'.$icon.'" aria-hidden="true"></i> ';
		}
		$content .= $text;
		return \Nette\Utils\Html::el()->setHtml($content);
	}
}
