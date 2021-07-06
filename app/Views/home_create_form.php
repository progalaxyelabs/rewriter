<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="screen-js-module" data-module="HomeCreateForm">
    <div class="container">
        <div class="row">
            <div class="col col-md-4 offset-md-4">
                
                <div id="preview" >Preview Screen</div>
                
                <form id="frame"></form>
                
                <div class="buttons">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" id="create-textbox" class="btn btn-primary" >Create Textbox</button>
                    
                    <button id="create-password" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Create Password</button>
                    
                    <button id="create-button" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Create Button</button>
                    
                    <button id="create-checkbox" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Create Checkbox</button>
                    
                    <button id="create-link" data-bs-toggle="modal" data-bs-target="#exampleModal1" type="button" class="btn btn-primary">Create Link</button>
                </div>
                            
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">TextBox Name</h5>
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

    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Link:</h5>
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

</div>

<?= $this->endSection() ?>