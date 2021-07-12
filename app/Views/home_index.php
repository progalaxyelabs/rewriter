<?= $this->extend('templates') ?>

<?= $this->section('content') ?>
<?= $this->renderSection('content') ?>
    <div class="container">
       <div class="row">
           <div class="col col-md-4 offset-md-4">
               <div class="buttons">
					<a href="/home/create_form" id="a" role="button" onclick="create()" class="btn btn-primary">Create Form</a>
					<p></p>
					<a id="anchor" href="" class="btn btn-primary">Create Report</a>
               </div>
           </div>
       </div>
   </div>
   
    
<?= $this->endSection() ?>



