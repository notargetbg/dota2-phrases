<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Phrases */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Phrases',
]) . $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Фрази'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="phrases-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
