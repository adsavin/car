<?php

use yii\widgets\Pjax;

Pjax::begin([
    'timeout' => 10000
]);
?>
<?=

\yii\grid\GridView::widget([
    'id' => 'list-modal-gridview',
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
                    return \yii\bootstrap\Html::a('<span class="glyphicon glyphicon-ok"></span> ' . Yii::t('app', "Select"), "#", [
                                'class' => 'btn btn-primary btn-select',
                                'data-id' => $model->id,
                                'data-code' => $model->code,
                                'data-name' => $model->name
                    ]);
                },
                    ],
                ]
//            'detail:ntext',
//            ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>
        <?php

        Pjax::end();

        $this->registerJs('
    $("body").on("keyup.yiiGridView", "#list-modal-gridview .filters input", function(){
        $("#list-modal-gridview").yiiGridView("applyFilter");
    });
    $(".btn-select").click(function() {
        btnSelectClick($(this), "product-product_group_id", "txtProductGroupId", "txtProductGroupName");
    });
', \yii\web\View::POS_READY);
        