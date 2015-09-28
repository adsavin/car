<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductCategory */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
            'modelClass' => 'Product Category',
        ]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<!--<div class="product-category-update">-->
<div class="row">
    <div class="col-lg-4 col-md-4">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
    <div class="col-lg-8 col-md-8">
        <?=
        $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        ?>
    </div>
</div>
