<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SourceMessage */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Source Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="source-message-view">-->
<div class="row">
    <div class="col-lg-6 col-md-6">
        <h1><?= Html::encode($this->title) ?></h1>
        <?=
        yii\grid\GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'category',
                'message:ntext',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>
    </div>
    <div class="col-lg-6 col-md-6">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </p>

        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
//                'id',
                'category',
                'message:ntext',
            ],
        ])
        ?>
        <?=
        DetailView::widget([
            'model' => $model->getMessages()->one(),
            'attributes' => [
//                'id',
                'language',
                'translation:ntext',
            ],
        ])
        ?>
    </div>
</div>
