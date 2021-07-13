<?= $this->extend('home_index') ?>

<?= $this->section('content') ?>

<h3 id="template-screen">Template name:<?= $form->template_name ?></h3>
<h4 id="template-screen">Screen:<?= $form->screen_name ?></h4>
<h4 id="template-screen">Form:<?= $form->form_name ?></h4>

<a id="back_to_template" class="btn btn-primary" href="/home/template?template_id=<?= $form->template_id ?>">Back to Template</a>

<?= $this->endSection() ?>