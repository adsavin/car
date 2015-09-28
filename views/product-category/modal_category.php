<?php

use yii\widgets\Pjax;

Pjax::begin();
echo
\yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'filterUrl' => array("list-modal"),
    'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
        'name',
        'code',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{select}',
            'buttons' => [
                'select' => function ($url, $model) {
                    return \yii\bootstrap\Html::a('<span class="glyphicon glyphicon-ok"></span> '. Yii::t('app', "Select"), "#",[
                        'class' => 'btn btn-primary'
                    ]);
                },
            ],
        ]
//            'detail:ntext',
//            ['class' => 'yii\grid\ActionColumn'],
    ],
]);
Pjax::end();
