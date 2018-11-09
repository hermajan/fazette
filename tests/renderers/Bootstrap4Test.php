<?php require_once __DIR__."/../bootstrap.php"; require_once "form.php"; ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Bootstrap 4 renderer for Nette Forms</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	</head>
	<body>
		<main class="container-fluid">
			<section class="row justify-content-center">
				<article class="col-12 col-sm-10">
					<?php $form = new \Nette\Forms\Form;;
					$form->setRenderer(new \Fazette\Renderers\Bootstrap4);
					echo setFormForRenderers($form); ?>
				</article>
			</section>
		</main>
	</body>
</html>
