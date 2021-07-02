<?= $this->extend('template') ?>

<?= $this->section('content') ?>

<div class="container">
       <div class="row">
           <div class="col col-md-3 offset-md-5">
           <div id="preview" class="embed-responsive embed-responsive-16by9">Preview Screen</div>
            <iframe id="frame" class="embed-responsive-item" src=""></iframe>
            
            <p></p>
               <a href="" id="a" class="btn btn-primary">
                   <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        
                        
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Some text in the modal.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
               <p></p>
               <a href="" class="btn btn-primary">Create Password</a>
               <p></p>
               <a href="" class="btn btn-primary">Create Button</a>
               <p></p>
               <a href="" class="btn btn-primary">Create Checkbox</a>
               <p></p>
               <a href="" class="btn btn-primary">Create Link</a>

           </div>
       </div>
   </div>
   
<?= $this->endSection() ?>