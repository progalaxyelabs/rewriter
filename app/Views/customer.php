<?= $this->extend('templates') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col col-md-4 offset-md-4 text-center">

            <h3>Chillies and Fires</h3>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col col-md-4 offset-md-4 text-center">

            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importFromTemplate" role="button"
                style="width: 200px; margin-top: 15px;">Import from Templates</a>
            <a class="btn btn-primary" role="button" style="width: 200px; margin-top: 15px;">New Screen</a>

        </div>
    </div>
</div>

<div class="modal fade" id="importFromTemplate" tabindex="-1" aria-labelledby="customer" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customer">Select a Template</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <select class="form-select">
                    <option value="Select From Below">Select From Below</option>
                    <option>Grocery Stores</option>
                    <option>Restaurant</option>
                    <option>Function hall</option>
                    <option>Computer Shop</option>
                </select>
                <input type="hidden" id="opened-by">
            </div>
            <div class="modal-footer">
                <button id="ok" type="button" class="btn btn-primary">Ok</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-4 offset-md-4 text-center">
            <a id="temporary-customer-names" class="btn btn-outline-secondary" href="" role="button">Dashboard</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-4 text-center">
            <a id="temporary-customer-names" class="btn btn-outline-secondary" href="/home/customer_screen" role="button">Add items to menucard</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-4 text-center">
            <a id="temporary-customer-names" class="btn btn-outline-secondary" href="" role="button">Billing</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-4 text-center">
            <a id="temporary-customer-names" class="btn btn-outline-secondary" href="" role="button">Daily Report</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>