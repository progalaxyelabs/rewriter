<?= $this->extend('template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col col-md-3 offset-md-5">
            <div id="preview" class="embed-responsive embed-responsive-16by9">Preview Screen</div>
            <iframe id="frame" class="embed-responsive-item" src=""></iframe>
            
            <div class="buttons">
                <button type="button" id="create-textbox" class="btn btn-primary" >Create Textbox</button>
                
                <button type="button" class="btn btn-primary">Create Password</button>
                
                <button type="button" class="btn btn-primary">Create Button</button>
                
                <button type="button" class="btn btn-primary">Create Checkbox</button>
                
                <button type="button" class="btn btn-primary">Create Link</button>
            </div>
                          
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div id="modal-dialog" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enter text</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" placeholder="Textarea">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Ok</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>