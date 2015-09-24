<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Messages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-index">
    <!--<div class="row">
        <div class="col-lg-6 col-md-6">-->
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>
    <?= Html::a(Yii::t('app', 'Create Message'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'language',
            'translation:ntext',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <!--</div>-->
</div>
