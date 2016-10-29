<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Phrases */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phrases-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'phrase')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'likes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dislikes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
