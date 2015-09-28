<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<!--<div class="product-group-form">-->
<div class="row">

    <?php
    $form = ActiveForm::begin([
                'type' => ActiveForm::TYPE_VERTICAL,
//                'type' => ActiveForm::TYPE_HORIZONTAL,
//        'formConfig' => ['labelSpan' => 4, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]);
    ?>    
    <?php // echo $form->field($model, 'product_category_id')->textInput()  ?>
    <?php // echo $form->field($model, 'product_category_id')->dropDownList(yii\helpers\ArrayHelper::map(\app\models\ProductCategory::find()->all(), "id", "name"), [])  ?>

    <div class="col-lg-12">
        <?php
        echo $form->field($model, "product_category_id", [
//            'addon' => [
//                'prepend' => [
////                    'content' => '<a class="btn btn-primary"><b class="glyphicon glyphicon-search"></b></a>'
////                    'content' => Html::button('Go', ['class'=>'btn btn-primary'])
//                ],
//                'append' => [
//                    'content' => '<a class="btn btn-primary"><b class="glyphicon glyphicon-search"></b></a>
//                        <input type="text" id="product_category_name" class="form-control" readonly />'
//                ]
////                'asButton' => true
//            ]
        ])->textInput(["class" => "form-control hidden"])->label(FALSE);
        ?>        
        <label class="control-label" for="txtProductCategoryId"><?= Yii::t('app', 'Product Category') ?></label>            
        <div class="input-group">
            <a href="#" 
               onclick="selectItem('product-category/list-modal', '<?php echo Yii::t('app', 'Select Category', "productgroup-product_category_id", "txtProductCategoryName") ?>')"
               class="btn btn-primary input-group-addon" data-toggle="modal" data-pjax="#modalbox .modal-body" data-target="#modalbox">
                <i class="glyphicon glyphicon-search"></i>
            </a>
            <input type="text" id="txtProductCategoryId" class="form-control" />            
            <input type="text" id="txtProductCategoryName" class="form-control input-group-addon readonly" />            
        </div>        
        <div class="help-block"></div>
    </div>
    <div class="col-lg-12">
        <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-12">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-12">
        <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>        
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <script>
    
    </script>
</div>
<?php
//$this->registerJs("$.pjax.reload({container: '#pjax-product-category-gridview', timeout: 2000});");
$this->registerJs('
    $("#txtProductCategoryId").on("input", function() {
        if ($(this).val().length === 3) {
            $.post("index.php?r=product-category/search", {id:$(this).val().trim()}, function (result) {            
                $("#txtProductCategoryName").val(result["name"]);
                $("#productgroup-product_category_id").val(parseInt(result["id"]));                
                alert($("#productgroup-product_category_id").val());
            }, "json"); 
        }
    });
    ');
