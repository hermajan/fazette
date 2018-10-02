<?php require_once __DIR__."/../bootstrap.php"; require_once "form.php"; ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Bootstrap 4 renderer for Nette Forms</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
	<body>
		<main class="container-fluid">
			<section class="row">
				<article class="col-md-8">
					<?php $form = new \Nette\Forms\Form;;
					$form->setRenderer(new \Fazette\Renderers\Bootstrap4);
					echo setFormForRenderers($form); ?>
				</article>
			</section>
		</main>
	</body>
</html>
