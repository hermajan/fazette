<?php
namespace Fazette\Forms\Rendering;

use Nette\Forms\Controls\{Checkbox, CheckboxList, MultiSelectBox, RadioList, SelectBox, TextArea, TextBase};
use Nette\Forms\Form;
use Nette\Forms\Rendering\DefaultFormRenderer;

/**
 * Bootstrap 3 renderer for Nette Forms.
 * @see https://getbootstrap.com/docs/3.4/css/#forms-example
 */
class Bootstrap3 extends DefaultFormRenderer {
	/** @var array */
	public $wrappers = [
		"form" => ["container" => null],
		"error" => ["container" => "div class='alert alert-error'", "item" => "p"],
		"group" => ["container" => "fieldset", "label" => "legend", "description" => "p"],
		"controls" => ["container" => null],
		"pair" => [
			"container" => "div class=form-group", ".required" => "required", ".optional" => null,
			".odd" => null, ".error" => "has-error"
		],
		"control" => [
			"container" => null, ".odd" => null,
			"description" => "span class='help-block'", "requiredsuffix" => "",
			"errorcontainer" => "span class='help-block'", "erroritem" => "",
			".required" => "required", ".text" => "text", ".password" => "text", ".file" => "text",
			".submit" => "btn btn-primary", ".image" => "btn", ".button" => "btn btn-default"
		],
		"label" => ["container" => "div class='control-label'", "suffix" => null, "requiredsuffix" => ""],
		"hidden" => ["container" => null]
	];
	
	/**
	 * Provides complete form rendering.
	 * @param Form $form Nette form.
	 * @param string|null $mode "begin", "errors", "ownerrors", "body", "end" or empty to render all
	 * @return string
	 */
	public function render(Form $form, ?string $mode = null): string {
		$form->getElementPrototype()->appendAttribute("class", "form-basic");
		
		foreach($form->getControls() as $control) {
			if($control instanceof Checkbox || $control instanceof CheckboxList || $control instanceof RadioList) {
				$control->getSeparatorPrototype()->setName("div")->appendAttribute("class", $control->getControlPrototype()->type);
			}
			if($control instanceof TextBase || $control instanceof SelectBox || $control instanceof MultiSelectBox) {
				$control->getControlPrototype()->appendAttribute("class", "form-control");
			}
			if($control instanceof TextArea) {
				$control->getControlPrototype()->setAttribute("rows", 4);
			}
		}
		
		return parent::render($form, $mode);
	}
}
