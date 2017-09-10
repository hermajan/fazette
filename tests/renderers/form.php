<?php
function setFormForRenderers(\Nette\Forms\Form $form) {
	$form->addGroup("Personal data");
	$form->addText("name", "Name:");
	$form->addEmail("email", "Email:");
	$form->addPassword("password", "Password:");
	$form->addInteger("age", "Your age:");
	$form->addTextArea("about", "About:");
	
	
	$form->addGroup("Files");
	$form->addUpload("file", "File:");
	$form->addMultiUpload("files", "Files:");
	
	
	$form->addGroup("Selects");
	$sex = ["m" => "male", "f" => "female"];
	$form->addRadioList("gender", "Gender:", $sex);
	
	$colors = ["r" => "red", "g" => "green", "b" => "blue"];
	$form->addCheckboxList("colors", "Colors:", $colors);
	
	$countries = [
		"Europe" => ["cz" => "Czech republic", "sk" => "Slovakia", "uk" => "United Kingdom"],
		"ca" => "Canada", "us" => "USA", "?"  => "Other"
	];
	$form->addSelect("country", "Country:", $countries)->setPrompt("Pick a country");
	$form->addMultiSelect("options", "Pick many:", $countries);
	
	
	$form->addGroup("Other");
	$form->addButton("someButton", "Some button");
	$form->addImage("imageButton", "image-button.png");
	
	
	$form->addGroup("Containers");
	$sub1 = $form->addContainer("first");
	$sub1->addText("name", "Your name:");
	$sub1->addEmail("email", "Email:");
	
	$sub2 = $form->addContainer("second");
	$sub2->addText("name", "Your name:");
	$sub2->addEmail("email", "Email:");
	
	$form->addGroup("Submit");
	$form->addCheckbox("agree", "I agree with terms")->setRequired("You must agree with our terms.");
	$form->addHidden("user_id", 8);
	$form->addSubmit("send", "Submit");
	
	if($form->isSuccess()) {
		$values = $form->getValues();
		\Fazette\forms\Controls::fixValues($values);
		\Tracy\Debugger::dump($values);
	}
	
	return $form;
}
