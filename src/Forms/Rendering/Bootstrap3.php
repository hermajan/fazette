<?php
namespace Fazette\Forms\Rendering;

use Nette\Forms\Controls\{Checkbox, CheckboxList, MultiSelectBox, RadioList, SelectBox, TextArea, TextBase};
use Nette\Forms\Form;
use Nette\Forms\Rendering\DefaultFormRenderer;

/**
 * Bootstrap 3 renderer for Nette Forms.
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
			"container" => "span class='col-xs-12 col-sm-10'", ".odd" => null,
			"description" => "span class='help-block'", "requiredsuffix" => "",
			"errorcontainer" => "span class='help-block'", "erroritem" => "",
			".required" => "required", ".text" => "text", ".password" => "text", ".file" => "text",
			".submit" => "btn btn-primary", ".image" => "btn", ".button" => "btn btn-default"
		],
		"label" => ["container" => "span class='col-xs-12 col-sm-2 control-label'", "suffix" => null, "requiredsuffix" => ""],
		"hidden" => ["container" => null]
	];
	
	/**
	 * Provides complete form rendering.
	 * @param Form $form Nette form.
	 * @param string|null $mode "begin", "errors", "ownerrors", "body", "end" or empty to render all
	 * @return string
	 */
	public function render(Form $form, ?string $mode = null): string {
		$form->getElementPrototype()->appendAttribute("class", "form-horizontal");
		
		foreach($form->getControls() as $control) {
			if($control instanceof Checkbox || $control instanceof CheckboxList || $control instanceof RadioList) {
				$control->getSeparatorPrototype()->setName("");
			}
			if($control instanceof Checkbox) {
				$control->getLabelPrototype()->appendAttribute("class", "checkbox-inline");
			}
			if($control instanceof CheckboxList) {
				$control->getItemLabelPrototype()->appendAttribute("class", "checkbox-inline");
			}
			if($control instanceof RadioList) {
				$control->getItemLabelPrototype()->appendAttribute("class", "radio-inline");
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
