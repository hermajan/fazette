<?php
namespace Fazette\Forms;

/**
 * Handling values of Nette Forms.
 */
class Values {
	/**
	 * Changes value from empty string to null.
	 * @param string $value String value.
	 */
	public static function nullifyString(&$value) {
		if($value === "") {
			$value = null;
		}
	}
	
	/**
	 * Changes form values from empty strings to null.
	 * @param array|object $values Submitted values from form.
	 */
	public static function nullifyStrings(&$values) {
		foreach($values as $key => $value) {
			if(is_array($values)) {
				$item = &$values[$key];
			} elseif(is_object($values)) {
				$item = &$values->{$key};
			} else { $item = null; }
			
			if(is_array($item) or is_object($item)) {
				Values::nullifyStrings($item);
			}
			
			Values::nullifyString($item);
		}
	}
}
