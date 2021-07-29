<?= $this->extend('templates') ?>

<?= $this->section('content') ?>



<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 text-center">
        <a class="btn btn-primary" href="new_customer" id="temporary-customer-names" role="button">Add Customer</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-4 text-center">
        <a class="btn btn-primary" href="search" id="temporary-customer-names" role="button">Add Business to Customer</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>