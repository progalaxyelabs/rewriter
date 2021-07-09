<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Navbar</title>
		<link rel="stylesheet" href="/style.2.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	</head>

	<body>

		<nav class="navbar navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">Rewriter</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="#">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/home/templates" role="button">Templates</a>
						</li>
					</ul>

				</div>
			</div>
		</nav>


		<div id="template-page" class="container-fluid">
			<div class="nav justify-content-end">
				<button class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#exampleModalForAdd" type="button">ADD
				</button>
			</div>
		</div>
		
		<div class="modal fade" id="exampleModalForAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">New Template</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form method="post" action="new_template_submit">
						<div class="modal-body">
							<label for="modal">Name:</label>
							<input class="form-control" id="modalinput" type="text" name="fname">
						</div>
						<div class="modal-footer">
							<button id="ok" type="submit" class="btn btn-primary">Ok</button>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
			<?php foreach ($templates as $template) : ?>
				<div class="col-6 col-sm-4 col-md-3 col-lg-2">
					<a class="template-preview-link" href="/home/templates?id=<?= $template->id ?>">
						<div class="template-preview"></div>
						<div class="template-preview-name">
							<?= $template->name ?>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
			</div>
		</div>




		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	</body>

</html>