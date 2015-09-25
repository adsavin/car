<?php $this->beginContent('@app/views/layouts/main.php'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?=
                $this->title
                ?>
            </div>
            <div class="panel-body">
                <?= $content ?>
            </div>
        </div>
    </div>
</div>
<?php
$this->endContent();
