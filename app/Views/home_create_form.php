<?= $this->extend('template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col col-md-4 offset-md-4">
            
            <div id="preview" class="embed-responsive embed-responsive-16by9">Preview Screen</div>
            
            <iframe id="frame" class="embed-responsive-item" src="form"><div id="display"></div></iframe>
            
            <div class="buttons">
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" id="create-textbox" class="btn btn-primary" >Create Textbox</button>
                
                <button id="create-password" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Create Password</button>
                
                <button id="create-button" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Create Button</button>
                
                <button id="create-checkbox" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Create Checkbox</button>
                
                <button id="create-link" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Create Link</button>
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
                <input id="modal-input" type="text">
            </div>
            <div class="modal-footer">
                <button id="ok" type="button" class="btn btn-primary">Ok</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>