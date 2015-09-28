<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SourceMessage */
/* @var $form yii\widgets\ActiveForm */
?>

<!--<div class="source-message-form">-->
<?php $form = ActiveForm::begin(); ?>
<div class="row">

    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
        <?= $form->field($model, 'category')->textInput(['maxlength' => true, 'readonly' => true]) ?>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
        <?= $form->field($model, 'message')->textarea(['rows' => 3, 'readonly' => true]) ?>
    </div>       
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
        <?php echo $form->field($message, 'language')->textInput(['value' => Yii::$app->language,'readonly' => true]) ?>
        <?php // echo $form->field($message, 'language')->dropDownList(app\components\Util::$LANGUAGES, ["selected" => Yii::$app->language]) ?>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
        <?php // echo $form->field($message, 'translation')->textarea(['rows' => 3]) ?>
        <?= $form->field($message, 'translation')->textInput() ?>
        <?= $form->field($message, 'id')->textInput(["readonly" => 'true', 'value' => $model->id, 'class' => 'hidden'])->label(false) ?>       
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>    
</div>
<?php ActiveForm::end(); ?>
<?php  
$this->registerJs("$('#message-translation').focus()");
?>