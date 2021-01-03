<?php
use Fazette\Renderers\Bootstrap3;
use Nette\Forms\Form;

require_once __DIR__."/../../vendor/autoload.php";
require_once "form.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bootstrap 3 renderer for Nette Forms</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<main class="container-fluid">
	<section class="row">
		<article class="col-12 col-sm-offset-1 col-sm-10">
			<?php $form = new Form;
			$form->setRenderer(new Bootstrap3);
			echo setFormForRenderers($form); ?>
		</article>
	</section>
</main>
</body>
</html>
