<?php
namespace Fazette\renderers;
use Nette;
use Nette\Forms\Controls;
use Nette\Forms\Rendering\DefaultFormRenderer;

/**
 * Bootstrap 3 renderer for Nette Forms.
 */
class Bootstrap3 extends DefaultFormRenderer {
	public $wrappers = [
		"form" => ["container" => null],
		"error" => ["container" => "div class='alert alert-error'", "item" => "p"],
		"group" => ["container" => "fieldset", "label" => "legend", "description" => "p"],
		"controls" => ["container" => null],
		"pair" => ["container" => "div class=form-group", ".required" => "required", ".optional" => null,
			".odd" => null, ".error" => "has-error"],
		"control" => ["container" => "span class=col-sm-10", ".odd" => null, "description" => "span class=help-block",
			"requiredsuffix" => "", "errorcontainer" => "span class=help-block", "erroritem" => "",
			".required" => "required", ".text" => "text", ".password" => "text", ".file" => "text",
			".submit" => "btn btn-primary", ".image" => "btn", ".button" => "btn btn-default"],
		"label" => ["container" => "span class='col-sm-2 control-label'", "suffix" => null, "requiredsuffix" => ""],
		"hidden" => ["container" => null]
	];
	
	/**
	 * Provides complete form rendering.
	 * @param  Nette\Forms\Form $form Nette form.
	 * @param  string "begin", "errors", "ownerrors", "body", "end" or empty to render all
	 * @return string
	 */
	public function render(Nette\Forms\Form $form, $mode = null) {
		$form->getElementPrototype()->addClass("form-horizontal");
		
		foreach($form->getControls() as $control) {
			if($control instanceof Controls\Checkbox || $control instanceof Controls\CheckboxList || $control instanceof Controls\RadioList) {
				$control->getSeparatorPrototype()->setName(null);
			}
			if($control instanceof Controls\Checkbox) {
				$control->getLabelPrototype()->addClass("checkbox-inline");
			}
			if($control instanceof Controls\CheckboxList) {
				$control->getItemLabelPrototype()->addClass("checkbox-inline");
			}
			if($control instanceof Controls\RadioList) {
				$control->getItemLabelPrototype()->addClass("radio-inline");
			}
			if($control instanceof Controls\TextBase || $control instanceof Controls\SelectBox || $control instanceof Controls\MultiSelectBox) {
				$control->getControlPrototype()->addClass("form-control");
			}
			if($control instanceof Controls\TextArea) {
				$control->getControlPrototype()->setAttribute("rows", 4);
			}
		}
		
		return parent::render($form, $mode);
	}
}
