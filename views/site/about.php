<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Мисия';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        Тук събираме най-забавните реплики, казани някога в Дота2 преди смърт. : )

        <?php echo Html::img('img/troll-dota.jpg', ['class' => 'img-responsive logo','style' => 'margin: 50px auto;']) ?>
    </p>
</div>
