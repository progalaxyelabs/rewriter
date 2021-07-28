<?= $this->extend('templates') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col col-md-4 offset-md-4 text-center">

        <h3>New Customers</h3>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">

        <form action="">
            <div>
                <label>Full name</label>
                <input type="text" class="form-control">
            </div>
            <div>
                <label>Bussiness name</label>
                <input type="text" class="form-control">
            </div>
            <div>
                <label>Signin name</label>
                <input type="text" class="form-control">
            </div>
            <div>
                <label>Create Password</label>
                <input type="password" class="form-control">
            </div>
            <div class="text-center" style="margin-top: 15px;">
                <a href="/home/new_customer_submit" class="btn btn-primary" role="button">Save</a>
            </div>
            <div style="margin-top:20px;" class="text-center">
                <span>Existing customer? <a href="" style="text-decoration: none;">Click Here...</a></span>

            </div>
        </form>

        </div>
    </div>
</div>


<?= $this->endSection() ?>