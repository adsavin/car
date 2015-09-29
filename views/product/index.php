<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\ProductGroup;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php app\components\Util::createButton(); ?>
    
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'code',
            'name',
            [
                'attribute' => 'product_group_id',
                'value' => function($data) {
                    return $data->getProductGroup()->one()->name;
                },
                'filter' => Html::activeDropDownList($searchModel, 'product_group_id', ArrayHelper::map(ProductGroup::find()->asArray()->all(), 'id', 'name'), ['class' => 'form-control', 'prompt' => Yii::t('app', 'All')]),
            ],            
            'detail:ntext',
            // 'created_time',
            // 'last_update',
            // 'user_id',
            // 'product_unit_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>
