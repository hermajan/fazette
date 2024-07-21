<?php
namespace Fazette\Forms;

/**
 * Handling values of Nette Forms.
 */
class Values {
	/**
	 * Changes value from empty string to null.
	 * @param array|string $value String value.
	 */
	public static function nullifyString(&$value): void {
		if($value === "") {
			$value = null;
		}
	}
	
	/**
	 * Changes form values from empty strings to null.
	 * @param array|object $values Submitted values from form.
	 */
	public static function nullifyStrings(&$values): void {
		if(is_object($values)) {
			$items = get_object_vars($values);
		} else {
			$items = $values;
		}
		
		foreach($items as $key => $value) {
			if(is_array($values)) {
				$item = &$values[$key];
			} else {
				if(is_object($values)) {
					$item = &$values->{$key};
				}
			}
			
			if(isset($item)) {
				if(is_array($item) or is_object($item)) {
					Values::nullifyStrings($item);
				}
				
				Values::nullifyString($item);
			}
		}
	}
}
