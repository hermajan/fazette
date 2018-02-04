<?php
namespace Fazette\renderers;

use Nette\Forms\Controls\{
	Checkbox, CheckboxList, MultiSelectBox, RadioList, SelectBox, TextArea, TextBase
};
use Nette\Forms\Form;
use Nette\Forms\Rendering\DefaultFormRenderer;

/**
 * Bootstrap 4 renderer for Nette Forms.
 */
class Bootstrap4 extends DefaultFormRenderer {
	public $wrappers = [
		"form" => ["container" => null],
		"error" => ["container" => "div class='alert alert-error'", "item" => "p"],
		"group" => ["container" => "fieldset", "label" => "legend", "description" => "p"],
		"controls" => ["container" => null],
		"pair" => ["container" => "div class='form-group row'", ".required" => "required", ".optional" => null,
			".odd" => null, ".error" => "has-error"],
		"control" => ["container" => "span class=col-sm-10", ".odd" => null, "description" => "span class=help-block",
			"requiredsuffix" => "", "errorcontainer" => "span class=form-text", "erroritem" => "",
			".required" => "required", ".text" => "text", ".password" => "text", ".file" => "text",
			".submit" => "btn btn-primary", ".image" => "btn", ".button" => "btn btn-secondary"],
		"label" => ["container" => "span class='col-sm-2'", "suffix" => null, "requiredsuffix" => ""],
		"hidden" => ["container" => null]
	];
	
	/**
	 * Provides complete form rendering.
	 * @param  Form $form Nette form.
	 * @param  string "begin", "errors", "ownerrors", "body", "end" or empty to render all
	 * @return string
	 */
	public function render(Form $form, $mode = null) {
		$form->getElementPrototype()->addClass("");
		
		foreach($form->getControls() as $control) {
			if(($control instanceof Checkbox) or ($control instanceof CheckboxList) or ($control instanceof RadioList)) {
				$control->getSeparatorPrototype()->setName("div class='form-check form-check-inline'");
				$control->getControlPrototype()->addClass('form-check-input');
			}
			if($control instanceof Checkbox) {
				$control->getLabelPrototype()->addClass("form-check-label");
			}
			if(($control instanceof CheckboxList) or ($control instanceof RadioList)) {
				$control->getItemLabelPrototype()->addClass("form-check-label");
			}
			if($control instanceof TextBase || $control instanceof SelectBox || $control instanceof MultiSelectBox) {
				$control->getControlPrototype()->addClass("form-control");
			}
			if($control instanceof TextArea) {
				$control->getControlPrototype()->setAttribute("rows", 4);
			}
		}
		
		return parent::render($form, $mode);
	}
}
