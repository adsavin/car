<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Message */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
            'modelClass' => 'Message',
        ]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'language' => $model->language]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<!--<div class="message-update">-->
<div class="row">
    <div class="col-lg-6 col-md-6">
        <?php
        $searchModel = new \app\models\MessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        echo $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        ?>
    </div>
    <div class="col-lg-6 col-md-6">
        <h1><?= Html::encode($this->title) ?></h1>
        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>
