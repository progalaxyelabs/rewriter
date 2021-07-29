<?= $this->extend('templates') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form action="">
                <label style="margin-top:30px;" for="customer_search-input">Search Customer</label>
                <div class="input-group mb-3">
                    <input id="customer_search-input" name="customer_id" type="text" class="form-control"
                        placeholder="Search Here..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <button id="search-icon" class="input-group-text" id="basic-addon2" type="submit"><i
                            class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php if ($customer) : ?>
        <div class="col-md-4 offset-md-4 text-center">
            <a class="template-preview-link" href="/home/customer?customer_id=<?= $customer->customer_id ?>">
                <div class="btn btn-secondary" id="temporary-customer-names">
                    <?= $customer->customer_full_name ?>
                </div>
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>