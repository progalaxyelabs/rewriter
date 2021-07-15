<?= $this->extend('home_index') ?>

<?= $this->section('content') ?>

<h3 id="template-screen">Template name:<?= $screen->template_name ?></h3>
<h4 id="template-screen">Screen:<?= $screen->screen_name ?></h4>
<a id="back_to_template" class="btn btn-primary" href="/home/template?template_id=<?= $screen->template_id ?>">Back to Template</a>

<?= $this->endSection() ?>