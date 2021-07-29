<?= $this->extend('templates') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 text-center">
            <h1 style="font-family: Lucida Handwriting; text-shadow: 1px 1px 3px; margin-bottom:50px;">Welcome to ProGalaxy eLabs</h1>
            <h3 style="color: #6001D2; text-shadow: 1px 1px 2px;">For All Templates</h3>
            <a href="/home/all_templates" class="btn btn-primary" style="background-color: #F8A82D; border: none; color: white;">Click Here</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-4 text-center">
            <h3 style="margin-top: 20px; color:#2C639B; text-shadow: 1px 1px 2px;">For new Customer Registration</h3>
            <a href="/home/new_customer" class="btn btn-primary" style="background-color: #6CD5F7;">Click Here</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>



