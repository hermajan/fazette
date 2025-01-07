<?php
namespace Fazette\Forms\Controls;

class DateInput extends DateTimeInput {
	protected $datetimeFormat = "Y-m-d";
	
	protected $type = "date";
}
