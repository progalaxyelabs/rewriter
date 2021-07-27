<?= $this->extend('templates') ?>

<?= $this->section('content') ?>

<div class="screen-js-module" data-module="HomeCreateForm">

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 text-center">

                <h3 id="template-name">Name:<?= $form->generic_template_name ?></h3>
                <h4 id="screen-name">Screen:<?= $form->generic_screen_name ?></h4>
                <h4 id="screen-name">Form:<?= $form->generic_form_name ?></h4>


                <div class="row screen-buttons">
                    <div class="col">
                        <a id="back_to_template" class="btn btn-primary" href="/home/screen?generic_screen_id=<?= $form->generic_screen_id ?>">Back to screen</a>
                    </div>
                    <div class="col"></div>
                    <div class="col">
                        <a id="save-form" class="btn btn-primary" role="button">Save Form</a>
                        <input type="hidden" id="form-id" value="<?= $form->generic_form_id ?>" />
                    </div>
                </div>
            </div>

            <div id="formButtonBorder" class="col-md-8 offset-md-2 text-center">
                <div id="create_buttons" class="screen-buttons">

                    <button id="date" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Date</button>

                    <button id="name" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Simple Text</button>

                    <button id="number-input" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Number</button>

                    <button id="email" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Email</button>

                    <button id="go_to_screen" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" type="button">Go to link</button>

                    <button id="options" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2" type="button">Options</button>

                    <button id="create-password" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Password</button>

                    <button id="create-checkbox" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Tick Box</button>

                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" id="longtextarea" class="btn btn-primary">Paragraph</button>

                    <button id="create-button" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Button</button>

                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="homeFormModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="homeFormModalLabel">Label Name</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input id="modal-input" type="text" class="form-control">
                        <input type="hidden" id="opened-by">
                    </div>
                    <div class="modal-footer">
                        <button id="ok" type="button" class="btn btn-primary">Ok</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="homeFormModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="homeFormModalLabel1">Link:</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Link Text:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group"><br>
                            <label for="select" class="col-form-label">Select screen to link to</label><br>
                            <select id="select">
                                <option value="0">Select:</option>
                                <option value="Forget password?">Forget password?</option>
                                <option value="Home">Home</option>
                                <option value="Sign Up">Sign Up</option>
                                <option value="Settings">Settings</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button id="ok1" type="button" class="btn btn-primary">Ok</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="homeFormModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="homeFormModalLabel1">Options:</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="optionLabel">Enter Options Label:</label>
                            <input id="optionLabel" class="form-control" type="text">
                        </div>
                        <div id="optionModalBody">
                            <label for="optionIput">Enter Option Name:</label><br>
                            <div class="input-group mb-3">
                                <input id="optionInput" type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button id="optionAddButton" class="btn btn-outline-primary" type="button">Add</button>
                                </div>
                            </div>
                        </div>
                        <div id="optionModalBody1"></div>

                    </div>
                    <div class="modal-footer">
                        <button id="ok2" type="button" class="btn btn-primary">Ok</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="wrap row justify-content-center">
            <form id="frame" class="form col col-sm-10 col-md-8 my-3"></form>
        </div>
    </div>


</div>

<?= $this->endSection() ?>