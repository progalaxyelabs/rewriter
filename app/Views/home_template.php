<?= $this->extend('templates') ?>

<?= $this->section('content') ?>


<div class="container">
    <div class="row">
        <div class="col col-md-4 offset-md-4">

            <h3 id="template-screen">Template name:<?= $template_screens[0]->generic_template_name ?></h3>

            <div class="buttons">
                <a id="new_screen_anchor" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalForNewScreen" role="button">
                    New Screen</a>
            </div>
        </div>
    </div>

    <div class="row">
        <?php foreach ($template_screens as $screen) : ?>
            <?php if (!empty($screen->generic_screen_id)) : ?>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 screen-link-wrap">
                    <a class="btn btn-primary" href="/home/screen?generic_screen_id=<?= $screen->generic_screen_id ?>">
                        <?= $screen->generic_screen_name ?>
                    </a>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>



<div class="modal fade" id="ModalForNewScreen" tabindex="-1" aria-labelledby="homeTemplateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="homeTemplateModalLabel">New Screen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="/home/new_screen_submit">
                <div class="modal-body">
                    <label for="modal">Name:</label>
                    <input class="form-control" id="newScreenInput" type="text" name="generic_screen_name">
                    <input type="hidden" name="generic_template_id" value="<?= $template_screens[0]->generic_template_id ?>">
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