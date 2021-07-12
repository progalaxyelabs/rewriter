<?= $this->extend('templates') ?>

<?= $this->section('content') ?>
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
							<input class="form-control" id="modalinput" type="text" name="template_name">
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
					<a class="template-preview-link" href="/home/template?template_id=<?= $template->id ?>">
						<div class="template-preview"></div>
						<div class="template-preview-name">
							<?= $template->name ?>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
			</div>
		</div>


<?= $this->endSection() ?>
