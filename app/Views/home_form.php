<?= $this->extend('templates') ?>

<?= $this->section('content') ?>

<div class="screen-js-module" data-module="HomeCreateForm">

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 text-center">

                <h3 id="template-name">Template name:<?= $form->template_name ?></h3>
                <h4 id="screen-name">Screen:<?= $form->screen_name ?></h4>
                <h4 id="screen-name">Form:<?= $form->form_name ?></h4>


                <div class="row screen-buttons">
                    <div class="col">
                        <a id="back_to_template" class="btn btn-primary"
                            href="/home/screen?screen_id=<?= $form->screen_id ?>">Back to screen</a>
                    </div>
                    <div class="col"></div>
                    <div class="col">
                        <a id="save-form" class="btn btn-primary" role="button">Save Form</a>
                        <input type="hidden" id="form-id" value="<?= $form->form_id ?>" />
                    </div>
                </div>
            </div>

            <div id="formButtonBorder" class="col-md-8 offset-md-2 text-center">
                <div id="create_buttons" class="row screen-buttons">

                    <div id="form_buttons" class="col">
                        <button id="date" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Date</button>
                    </div>
                    <div id="form_buttons" class="col">
                        <button id="name" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Name</button>
                    </div>
                    <div id="form_buttons" class="col">
                        <button id="email" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Email</button>
                    </div>
                    <div id="form_buttons" class="col">
                        <button id="go_to_screen" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" type="button">Go to screen</button>
                    </div>
                    <div id="form_buttons" class="col">
                        <button id="options" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2" type="button">Options</button>
                    </div>
                    <div id="form_buttons" class="col">
                        <button id="create-password" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button"
                            class="btn btn-primary">Password</button>
                    </div>
                    <div id="form_buttons" class="col">
                        <button id="create-checkbox" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button"
                            class="btn btn-primary">Tick Box</button>
                    </div>
                    <div id="form_buttons" class="col">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" id="longtextarea"
                            class="btn btn-primary">Long Textbox</button>
                    </div>
                    <div id="form_buttons" class="col">
                        <button id="create-button" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button"
                            class="btn btn-primary">Button</button>
                    </div>

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

        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="homeFormModalLabel1"
            aria-hidden="true">
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
                                <option value="Forget password">Forget password</option>
                                <option value="Home">Home</option>
                                <option value="SignIn">SignIn</option>
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

        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="homeFormModalLabel1"
            aria-hidden="true">
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
                        <div class="form-group">
                            <label for="select-number">Select number of options</label>
                            <input id="select-number" class="form-control" type="number">
                            <input type="hidden" id="opened-by">
                        </div>
                        <div id="optionModalBody"></div>

                    </div>
                    <div class="modal-footer">
                        <button id="ok2" type="button" class="btn btn-primary">Ok</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                    </div>
                </div>
            </div>
        </div>

        <form id="frame"></form>
    </div>


</div>

<?= $this->endSection() ?>