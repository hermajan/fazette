<?php
namespace Fazette\Forms\Rendering;

use Nette\Forms\Controls\{Checkbox, CheckboxList, MultiSelectBox, RadioList, SelectBox, TextArea, TextBase};
use Nette\Forms\Form;
use Nette\Forms\Rendering\DefaultFormRenderer;

/**
 * Bootstrap 5 renderer for Nette Forms.
 * @see https://getbootstrap.com/docs/5.3/forms/overview/
 */
class Bootstrap5 extends DefaultFormRenderer {
	/** @var array */
	public $wrappers = [
		"form" => ["container" => null],
		"error" => ["container" => "div class='alert alert-danger'", "item" => "p"],
		"group" => ["container" => "fieldset class='mb-3'", "label" => "legend", "description" => "p"],
		"controls" => ["container" => null],
		"pair" => [
			"container" => "div class='form-group row'", ".odd" => null,
			".required" => "required", ".optional" => null,
			".error" => "has-error"
		],
		"control" => [
			"container" => "span class='col-12 col-sm-9 col-md-10'", ".odd" => null,
			"description" => "span class='help-block'", "requiredsuffix" => "",
			"errorcontainer" => "span class='form-text'", "erroritem" => "",
			".required" => "required", ".text" => "text", ".password" => "text", ".file" => "text",
			".submit" => "btn btn-primary", ".image" => "btn", ".button" => "btn btn-secondary"
		],
		"label" => ["container" => "span class='col-12 col-sm-3 col-md-2'", "suffix" => null, "requiredsuffix" => ""],
		"hidden" => ["container" => null]
	];
	
	/**
	 * Provides complete form rendering.
	 * @param Form $form Nette form.
	 * @param string|null $mode "begin", "errors", "ownerrors", "body", "end" or empty to render all
	 * @return string
	 */
	public function render(Form $form, ?string $mode = null): string {
		$form->getElementPrototype()->appendAttribute("class", "");
		
		foreach($form->getControls() as $control) {
			if(($control instanceof Checkbox) or ($control instanceof CheckboxList) or ($control instanceof RadioList)) {
				$control->getSeparatorPrototype()->setName("div class='form-check form-check-inline'");
				$control->getControlPrototype()->appendAttribute("class", "form-check-input");
			}
			if($control instanceof Checkbox) {
				$control->getLabelPrototype()->appendAttribute("class", "form-check-label");
			}
			if(($control instanceof CheckboxList) or ($control instanceof RadioList)) {
				$control->getItemLabelPrototype()->appendAttribute("class", "form-check-label");
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
