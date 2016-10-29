<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php if (!empty(Yii::$app->view->params['body_class'])) {
    $body_class = Yii::$app->view->params['body_class'];
} else {
    $body_class = 'default';
} ?>


<div class="wrap <?php echo $body_class; ?>">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('img/logo-dotagag.png', ['class' => 'img-responsive logo','style' => 'max-width: 75px; position: relative; top: -3px;']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Фрази', 'url' => ['/site/index']],
            ['label' => 'За каузата', 'url' => ['/site/about']],
            Yii::$app->user->isGuest ? '' :
              [
                  'label' => 'Редактор', 'url' => ['/phrases',],
                  'options' => ['class'=>'primary'],
                  'linkOptions' => [
                      'class' => '',

                  ]
              ],
            Yii::$app->user->isGuest ?
                ['label' => 'Вход', 'url' => ['/site/login']] :
                [
                    'label' => 'Изход (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => [
                        'data-method' => 'post'
                    ]
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'homeLink' => [
                'label' => 'Начало',
                'url' => Yii::$app->homeUrl,
            ],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Dota2 Phrases Leading 2 Death <?= date('Y') ?></p>

        <p class="pull-right">
        <?= Html::a('Вход', ['site/login']) ?> в системата.  |
        <a href="http://designscaster.com">by DC</a></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
