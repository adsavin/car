<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\ProductUnit;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<!--<div class="product-form">-->
<div class="row">

    <div class="col-lg-4 col-md-5">
        <?php $form = ActiveForm::begin(); ?>

        <div class="col-lg-12">
            <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-12">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-12">
            <?php // echo $form->field($model, 'product_unit_id')->textInput() ?>
            <?php
            echo $form->field($model, 'product_unit_id', [])->dropDownList(ArrayHelper::map(ProductUnit::find()->all(), "id", "name"), ['class' => 'form-control', 'prompt' => Yii::t('app', 'Select')]);
            ?>
        </div>
        <div class="col-lg-12">
            <?php echo $form->field($model, 'product_group_id')->textInput(['class' => 'form-control hidden'])->label(false) ?>
            <label class="control-label" for="txtProductGroupId"><?= Yii::t('app', 'Product Group') ?></label>            
            <div class="input-group">
                <a href="#" 
                   onclick="selectItem('product/list-group-modal', '<?php echo Yii::t('app', 'Select Group', "product-product_group_id", "txtProductGroupName") ?>')"
                   class="btn btn-primary input-group-addon" data-toggle="modal" data-pjax="#modalbox .modal-body" data-target="#modalbox">
                    <i class="glyphicon glyphicon-search"></i>
                </a>
                <input type="text" id="txtProductGroupId" class="form-control" value="<?= @$model->productGroup->code ?>" />            
                <input type="text" id="txtProductGroupName" class="form-control input-group-addon readonly" value="<?= @$model->productGroup->name ?>" />            
            </div>        
            <div class="help-block"></div>
        </div>
        <div class="col-lg-12">
            <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>
        </div>

        <!--<div class="form-group">-->
        <div class="col-lg-12">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-lg-8 col-md-7">
        <?php Pjax::begin(["timeout" => 10000]) ?>
        <?php
        echo $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
//        echo 
//        GridView::widget([
//            'dataProvider' => $dataProvider,
//            'filterModel' => $searchModel,
//            'columns' => [
//                ['class' => 'yii\grid\SerialColumn'],
////            'id',
//                'name',
//                'product_group_id',
//                'code',
//                'detail:ntext',
//                // 'created_time',
//                // 'last_update',
//                // 'user_id',
//                // 'product_unit_id',
//                ['class' => 'yii\grid\ActionColumn'],
//            ],
//        ]);
        ?>
        <?php Pjax::end() ?>
    </div>
</div>
<?php
$this->registerJs('
    $("#txtProductGroupId").on("input", function() {
        var id = $(this).val().trim();        
        queryItem(id, "product-category/search", "productgroup-product_category_id", "txtProductGroupName");
    });
    ');
