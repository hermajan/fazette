<?php

use Fazette\Forms\Rendering\Bootstrap5;
use Nette\Forms\Form;

require_once __DIR__."/../../../vendor/autoload.php";
require_once "form.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bootstrap 4 renderer for Nette Forms</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<main class="container-fluid">
	<section class="row justify-content-center">
		<article class="col-12 col-sm-10">
			<?php $form = new Form;;
			$form->setRenderer(new Bootstrap5);
			echo setFormForRenderers($form); ?>
		</article>
	</section>
</main>
</body>
</html>
