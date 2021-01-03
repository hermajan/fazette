<?php
use Fazette\Renderers\Bootstrap;
use Nette\Forms\Form;

require_once __DIR__."/../../vendor/autoload.php";
require_once "form.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bootstrap renderer for Nette Forms</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<main class="container-fluid">
	<section class="row justify-content-center">
		<article class="col-12 col-sm-10">
			<?php $form = new Form;
			$form->setRenderer(new Bootstrap);
			echo setFormForRenderers($form); ?>
		</article>
	</section>
</main>
</body>
</html>
