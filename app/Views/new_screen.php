<?= $this->extend('templates') ?>

<?= $this->section('content') ?>

<?php $data = $_POST["fname"];?>

<div class="container">
    <div class="row">
        <div class="col col-md-4 offset-md-4">

            <h3 id="template-screen">Template name:<?php echo $data ?></h3>
            <div class="buttons">
                <a href="home_index" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalForNewScreen" role="button">New Screen</a>

                <div class="modal fade" id="ModalForNewScreen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New Screen</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="home_index">
                                <div class="modal-body">
                                    <label for="modal">Name:</label>
                                    <input class="form-control" id="newScreenInput" type="text" name="name">
                                </div>
                                <div class="modal-footer">
                                    <button id="ok" type="submit" class="btn btn-primary">Ok</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
		</div>
    </div>
</div>
<?= $this->renderSection('content') ?>
   
<?= $this->endSection() ?>