<?= $this->extend('templates') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 text-center">

            <h3 id="template-name">Template name:<?= $screen->template_name ?></h3>
            <h4 id="screen-name">Screen:<?= $screen->screen_name ?></h4>

            <div class="row screen-buttons">
                <div class="col">
                    <a id="back_to_template" class="btn btn-primary" href="/home/template?template_id=<?= $screen->template_id ?>">Back to Template</a>
                </div>
                <div class="col">
                    <a id="create-form-link" class="btn btn-primary" role="button" data-bs-toggle="modal" data-bs-target="#ModalForNewForm">Create Form</a>
                </div>
                <div class="col">
                    <a id="create-report-link" class="btn btn-primary">Create Report</a>
                </div>
            </div>

            <h3 id="form_and_report">Form and Reports</h3>

        </div>
    </div>
</div>

<div class="modal fade" id="ModalForNewForm" tabindex="-1" aria-labelledby="screenModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="screenModalLabel">Form Name:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="/home/new_form_submit">
                <div class="modal-body">
                    <label for="modal">Name:</label>
                    <input class="form-control" id="formNameInput" type="text" name="form_name">
                    <input type="hidden" name="screen_id" value="<?= $screen->screen_id ?>">
                </div>
                <div class="modal-footer">
                    <button id="submit" type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php foreach ($screen_forms as $form) : ?>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 screen-link-wrap">
                    <a class="btn btn-warning" href="/home/form?form_id=<?= $form->id ?>">
                        <?= $form->name ?>
                    </a>
                </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>