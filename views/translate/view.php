<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Message */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="message-view">-->
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
        DetailView::widget([
            'model' => $model,
            'attributes' => [
//            'id',
                'language',
                'translation:ntext',
            ],
        ])
        ?>

    </div>
</div>
