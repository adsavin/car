<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SourceMessage */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
            'modelClass' => 'Source Message',
        ]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Source Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<!--<div class="source-message-update">-->
<div class="row">
    <div class="col-lg-6 col-md-6">
        <h1><?= Html::encode($this->title) ?></h1>
        <?=
        $this->render('_form', [
            'model' => $model,
            'message' => $message,
        ])
        ?>
    </div>
</div>
