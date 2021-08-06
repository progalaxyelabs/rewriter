<?= $this->extend('templates') ?>

<?= $this->section('content') ?>

<div id="template-page" class="container-fluid">
    <div class="nav justify-content-end">
        <button class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#exampleModalForAdd"
            type="button">ADD
        </button>
    </div>
</div>

<div class="container">
    <div style="padding: 100px;" class="container">
        <?php foreach ($biz as $bizs) : ?>
        <div class="list-group">
            <a class="list-group-item list-group-item-action text-center" href="/home/customer_biz?customer_biz_id=<?= $bizs->customer_biz_id ?>"
                role="button"><?= $bizs->customer_biz_name ?></a>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>