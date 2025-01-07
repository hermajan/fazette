<?php
namespace Fazette\Forms\Controls;

use Nette\Forms\Controls\TextInput;
use Nette\InvalidArgumentException;
use Nette\Utils\Html;

class DateTimeInput extends TextInput {
	/** @var string */
	protected $datetimeFormat = "Y-m-d H:i:s";
	
	/** @var string */
	protected $type = "datetime-local";
	
	public function setValue($value) {
		if($value instanceof \DateTimeInterface) {
			$this->value = $value->format($this->datetimeFormat);
		} else {
			if(is_null($value)) {
				$this->value = $value;
			} else {
				throw new InvalidArgumentException(sprintf("Value must be instance of \DateTimeInterface or null, %s given in field '%s'.", gettype($value), $this->name));
			}
		}
		
		$this->rawValue = $value;
		return $this;
	}
	
	public function getControl(): Html {
		$control = parent::getControl();
		$control->type = $this->type;
		
		return $control;
	}
	
	protected function getRenderedValue(): ?string {
		return $this->rawValue instanceof \DateTimeInterface ? $this->rawValue->format($this->datetimeFormat) : $this->emptyValue;
	}
}
