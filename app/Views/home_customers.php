<?= $this->extend('templates') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col col-md-4 offset-md-4 text-center">

        <h3>Customers</h3>

        </div>
    </div>
</div>

<div id="customer-page" class="container-fluid">
	<div class="nav justify-content-end">
		<a href="/home/new_customer" class="btn btn-primary my-2" type="button">ADD
        </a>
	</div>
</div>

<div class="container">
    <div class="row">
        <div id="temporary-customer-names" class="col-md-4 offset-md-4 text-center">
        <a href="" id="temporary-link" role="button">Navodaya Book Store</a>
        </div>
    </div>
    <div class="row">
        <div id="temporary-customer-names" class="col-md-4 offset-md-4 text-center">
        <a href="" id="temporary-link" role="button">ABC Fast Foods</a>
        </div>
    </div>
    <div class="row">
        <div id="temporary-customer-names" class="col-md-4 offset-md-4 text-center">
        <a href="" id="temporary-link" role="button">Success Computers</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>