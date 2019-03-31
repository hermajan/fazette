# Bootstrap renderer

This is an implementation of [form renderer](https://doc.nette.org/en/2.4/form-rendering#toc-default-renderer) in [Nette Forms](https://doc.nette.org/en/2.4/forms) for framework [Bootstrap](https://getbootstrap.com). It is available for version 3 and 4.

## Usage
When you creating new form set it like this:

```php
<?php
$form = new \Nette\Forms\Form;

// for actual stable version of Bootstrap (currently Bootstrap 4)
$form->setRenderer(new \Fazette\Renderers\Bootstrap);

// for Bootstrap 3
$form->setRenderer(new \Fazette\Renderers\Bootstrap3);

// for Bootstrap 4
$form->setRenderer(new \Fazette\Renderers\Bootstrap4);
```

## Examples

??? example "Example of form with Bootstrap renderer"
	<iframe src="https://hermajan.net/vendor/hermajan/fazette/tests/renderers/BootstrapTest.php" frameborder="0" style="width:100%;height:1000px;"></iframe>
	
??? example "Example of form with Bootstrap 3 renderer"
	<iframe src="https://hermajan.net/vendor/hermajan/fazette/tests/renderers/Bootstrap3Test.php" frameborder="0" style="width:100%;height:1000px;"></iframe>

??? example "Example of form with Bootstrap 4 renderer"
	<iframe src="https://hermajan.net/vendor/hermajan/fazette/tests/renderers/Bootstrap4Test.php" frameborder="0" style="width:100%;height:1000px;"></iframe>
