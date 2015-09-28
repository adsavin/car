<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductCategory */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="product-category-view">-->
<div class="row">
    <div class="col-lg-8 col-md-8">
        <?=
        $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        ?>
    </div>
    <div class="col-lg-4 col-md-4">
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
                'name',
                'code',
                'detail:ntext',
                'created_time',
                'last_update',
            ],
        ])
        ?>
    </div>
</div>
