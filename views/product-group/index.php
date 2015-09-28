<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ProductGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Product Groups');
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="product-group-index">-->
<div class="row">
    <div class="col-lg-12">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?php app\components\Util::createButton() ?>

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
//            'id',
                'code',
                'name',
//                'detail:ntext',
//                'created_time',
                // 'last_update',
//                 'product_category_id',
                [
                    'attribute' => 'product_category_id',
                    'header' => Yii::t('app', 'Product Category'),
                    'filter' => \yii\bootstrap\Html::dropDownList("filter-category", null, \yii\helpers\ArrayHelper::map(\app\models\ProductCategory::find()->all(), "id", "name"), ['class' => 'form-control']),
                    'value' => function ($data) {
                        return $data->productCategory->name;
                    }
                ],
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>
    </div>    
</div>
