<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductSerial */

$this->title = Yii::t('app', 'Create Product Serial');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Serials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-serial-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
