<?= $this->extend('templates') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">

            <h3 id="template-name">Template name:<?= $screen->template_name ?></h3>
            <h4 id="screen-name">Screen:<?= $screen->screen_name ?></h4>

            <a id="back_to_template" class="btn btn-primary" href="/home/template?template_id=<?= $screen->template_id ?>">Back to Template</a>
            <a id="create-form-link" class="btn btn-primary" role="button" data-bs-toggle="modal" data-bs-target="#ModalForNewForm">Create Form</a>
            <a id="create-report-link" class="btn btn-primary">Create Report</a>

        </div>
    </div>
</div>

<div class="modal fade" id="ModalForNewForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Name:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="/home/new_form_submit">
                <div class="modal-body">
                    <label for="modal">Name:</label>
                    <input class="form-control" id="formNameInput" type="text" name="form_name">
                    <input type="hidden" name="screen_id" value="<?= $form->screen_id ?>">
                </div>
                <div class="modal-footer">
                    <button id="submit" type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>