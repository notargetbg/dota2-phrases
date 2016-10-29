<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Phrases */

$this->title = Yii::t('app', 'Create Phrases');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Phrases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phrases-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
