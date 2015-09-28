<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductGroup */

$this->title = Yii::t('app', 'Create Product Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="product-group-create">-->
<div class="row">
    <div class="col-lg-4 col-md-4">
        <h1><?= Html::encode($this->title) ?></h1>
        <?=
        $this->render('_form', [
            'model' => $model
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
