<?= $this->extend('templates') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col col-md-4 offset-md-4 text-center">

        <h3>Add Customers Business</h3>

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
        <div class="col-md-4 offset-md-4 text-center">
        <a class="btn btn-outline-secondary" href="" id="temporary-customer-names" role="button">Navodaya Book Store</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-4 text-center">
        <a class="btn btn-outline-secondary" href="" id="temporary-customer-names" role="button">ABC Fast Foods</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-4 text-center">
        <a class="btn btn-outline-secondary" href="" id="temporary-customer-names" role="button">Success Computers</a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 text-center">
            <form action="">
                <div style="margin-top: 20px;" class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Here..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>