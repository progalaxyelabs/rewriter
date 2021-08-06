<?= $this->extend('templates') ?>

<?= $this->section('content') ?>

<div id="template-page" class="container-fluid">
    <div class="nav justify-content-end">
        <button class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#exampleModalForAdd"
            type="button">ADD
        </button>
    </div>
</div>

<div class="container">
    <div style="padding: 100px;" class="container">
        <?php foreach ($biz as $bizs) : ?>
        <div class="list-group">
            <a class="list-group-item list-group-item-action text-center" href="/home/customer_biz?customer_biz_id=<?= $bizs->customer_biz_id ?>"
                role="button"><?= $bizs->customer_biz_name ?></a>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="modal fade" id="exampleModalForAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">New Business Name</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form method="post" action="/home/new_customer_biz_submit">
						<div class="modal-body">
							<label for="modal">Name:</label>
							<input class="form-control" id="modalinput" type="text" name="customer_biz_name">
                            <input type="hidden" name="customer_id" value="<?= $biz[0]-> customer_id ?>">
						</div>
						<div class="modal-footer">
							<button id="ok" type="submit" class="btn btn-primary">Ok</button>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>

<?= $this->endSection() ?>