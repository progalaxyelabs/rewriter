<?= $this->extend('templates') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 text-center">
            <h1>Welcome to ProGalaxy eLabs</h1>
            <h3>For All Templates</h3>
            <a href="/home/all_templates" class="btn btn-primary" style="background-color: #FF6C2F; border: none; color: white;">Click Here</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-4 text-center">
            <h3 style="margin-top: 20px; color:#2C639B;">For new Customer Registration</h3>
            <a href="/home/new_customer" class="btn btn-primary" style="background-color: #59B71F; border: none;">Click Here</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>



